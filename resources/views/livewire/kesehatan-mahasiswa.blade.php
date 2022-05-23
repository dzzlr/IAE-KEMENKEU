<div class="chart-container">
    <div class="pie-chart-container">
        <canvas id="pie-chart" width="500" height="200"></canvas>
    </div>
</div>

<script>
    $(function () {
        //get the pie chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        var ctx = $("#pie-chart");

        //pie chart data
        var data = {
            labels: cData.label,
            datasets: [{
                label: "Users Count",
                data: cData.data,
                backgroundColor: [
                    "#4BC0C0",
                    "#FF6384",
                    "#333538",
                    "#F4A460",
                ],
                hoverOffset: 2,
            }]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Statistik Kesehatan Mahasiswa Selama Masa Pandemi",
                fontSize: 14,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    fontColor: "#333",
                    fontSize: 12
                }
            }
        };

        //create Pie Chart class object
        var chart1 = new Chart(ctx, {
            type: "pie",
            data: data,
            options: options
        });

    });
</script>