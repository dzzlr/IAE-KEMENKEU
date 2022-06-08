// $(function () {
//     $(document).scroll(function () {
//       var $nav = $(".navbar-fixed-top");
//       $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
//     });
//   });

$(document).ready(function(){
    $(window).scroll(function(){
        if($(window).scrollTop() > $(window).height()){
            $(".navbar-fixed-top").css({"background":"linear-gradient(180deg, rgba(0,0,0,0.5046612394957983) 0%, rgba(0,0,0,0) 100%)"});   
        }
        else{
            $(".navbar-fixed-top").css({"background-color":"#4285F4"});
        }

    })
})

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "30px 10px";
    document.getElementById("logo").style.fontSize = "25px";
  } else {
    document.getElementById("navbar").style.padding = "80px 10px";
    document.getElementById("logo").style.fontSize = "35px";
  }
}