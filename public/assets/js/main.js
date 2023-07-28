/** Left SideNav **/
$(function () {
  $('.nav-toggle').on('click', function (e) {
    $('.sideNav').toggleClass('open');
    
    e.stopPropagation();
    return false;
  });
  
  $('*:not(.nav-toggle)').on('click', function () {
    $('.sideNav').removeClass('open');
  });
  
});

/** Right SideNav **/
$(function () {
  $('.nav-toggleR').on('click', function (e) {
    $('.sideNavR').toggleClass('open');
    
    e.stopPropagation();
    return false;
  });
  
  $('*:not(.nav-toggleR)').on('click', function () {
    $('.sideNavR').removeClass('open');
  });
  
});


/** Initialize Swiper **/

var swiper = new Swiper('.swiper-container', {
	autoHeight: true,
  	spaceBetween: 20,
	pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
	navigation: {
	nextEl: '.swiper-button-next',
	prevEl: '.swiper-button-prev',
  },
}); 
var swiper2 = new Swiper('.swiper-container2', {
	slidesPerView: 2,
    spaceBetween: 20,
	freeMode: true,
}); 

/** $('.swiper-container').each(function(){
   var mySwiper = new Swiper(this, {      
	  autoHeight: true,
      spaceBetween: 20,
	  pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      nextButton: $(this).find('.swiper-button-next')[0],
      prevButton: $(this).find('.swiper-button-next')[0],
	   slidesPerView: 3,
   });
}); **/

