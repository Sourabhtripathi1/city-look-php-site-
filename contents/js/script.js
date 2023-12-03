
$('.owl-carousel').owlCarousel({
  loop: false,
  margin: 10,
  responsiveClass: true,
  responsive: {
      0: {
          items: 3,
          nav: true
      },
      600: {
          items: 3,
          nav: false
      },
      1000: {
          items: 5,
          nav: true,
          loop: false
      }
  }
})


function openNav(){
    document.getElementById('mnubtn').style.visibility="hidden";
    document.getElementById('nav').classList.add('active');
    document.getElementById('close').style.visibility="visible";
    document.getElementById('close').style.zIndex="15";
}

function closeNav(){
    document.getElementById('close').style.zIndex="5";
    document.getElementById('close').style.visibility="hidden";
    document.getElementById('nav').classList.remove('active');
    document.getElementById('mnubtn').style.visibility="visible";
}







