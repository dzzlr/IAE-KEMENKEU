<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class KesehatanMahasiswa extends Component
{
    public function render()
    {
        $record = DB::table('kemahasiswaan')
        ->select('zona_tinggal', DB::raw("COUNT(DISTINCT nim) as total"))
        ->groupBy('zona_tinggal')
        ->orderBy('total','desc')
        ->get();     
        
        $data = [];

        foreach($record as $row) {
            $data['label'][] = $row->zona_tinggal;
            $data['data'][] = (int) $row->total;
        }
    
        $data['chart_data'] = json_encode($data);

        return view('livewire.kesehatan-mahasiswa', $data);
    }
}
