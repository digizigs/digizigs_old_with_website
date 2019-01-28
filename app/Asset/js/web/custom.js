
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
//App
//require('../includes/bootstrap');
//require('../includes/vue');

//Vendor
require('../../vendor/lightbox/js/lightbox');
require('../../vendor/smoothscroll/js/smoothscroll');


$(document).ready(function(){

  preloader();
  home_menu();
  carousel_parallex();
  carousal_timer();
  typing_effect();
  window_smooth_scroll();
  smoothscroll();
  move_to_top();


	//1)=======================Preloader========================
	function preloader(){
	  jQuery(function($) {
	    var preloader = $('.preloader');
	    $(window).on('load', function(){
	        preloader.remove();
	    });

	  });
	}

	//2)=======================Slider parralex==================
	function carousel_parallex(){
	    var initScrollTop = $(window).scrollTop();

	    var $win = $(window);
	    $('div.fill').each(function(){
	    var scroll_speed = 5;
	    var $this = $(this);

	    $(window).scroll(function() {
	        var bgScroll = -(($win.scrollTop() - $this.offset().top)/ scroll_speed);
	        var bgPosition = 'center '+ bgScroll + 'px';
	        $this.css({ backgroundPosition: bgPosition });
	      });
	    });
	};

	//3)======================Carousel Timer====================
	function carousal_timer(){
	  var slideHeight = $(window).height();
	  //carousel
	  $('.carousel').carousel({
	        interval: 7000
	  });
	}

	//4)======================Menu Open and close===============
	function home_menu(){
	  flag=0;
	  $('.menuicon').click(function(e){

	    e.stopPropagation();

	      if(flag==0){
	        $('.open').hide();
	        $('.close').show();
	        $('.main').fadeIn(1000);
	        flag=1;
	      }else{
	        $('.open').show();
	        $('.close').hide();
	        $('.main').fadeOut(1000);
	        flag=0;
	      }

	  });

	  $('body').click( function() {
	       
	        $('.open').show();
	        $('.close').hide();
	        $('.main').fadeOut(1000);
	        flag=0;
	        
	  });
	};

	//5)======================Typing Effecct===================
	function typing_effect(){

	  var TxtRotate = function(el, toRotate, period) {
	    this.toRotate = toRotate;
	    this.el = el;
	    this.loopNum = 0;
	    this.period = parseInt(period, 10) || 2000;
	    this.txt = '';
	    this.tick();
	    this.isDeleting = false;
	  };

	  TxtRotate.prototype.tick = function() {
	    var i = this.loopNum % this.toRotate.length;
	    var fullTxt = this.toRotate[i];

	    if (this.isDeleting) {
	      this.txt = fullTxt.substring(0, this.txt.length - 1);
	    } else {
	      this.txt = fullTxt.substring(0, this.txt.length + 1);
	    }

	    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

	    var that = this;
	    var delta = 300 - Math.random() * 100;

	    if (this.isDeleting) { delta /= 2; }

	    if (!this.isDeleting && this.txt === fullTxt) {
	      delta = this.period;
	      this.isDeleting = true;
	    } else if (this.isDeleting && this.txt === '') {
	      this.isDeleting = false;
	      this.loopNum++;
	      delta = 500;
	    }

	    setTimeout(function() {
	      that.tick();
	    }, delta);
	  };

	  window.onload = function() {
	    var elements = document.getElementsByClassName('txt-rotate');
	    for (var i=0; i<elements.length; i++) {
	      var toRotate = elements[i].getAttribute('data-rotate');
	      var period = elements[i].getAttribute('data-period');
	      if (toRotate) {
	        new TxtRotate(elements[i], JSON.parse(toRotate), period);
	      }
	    }
	    // INJECT CSS
	    var css = document.createElement("style");
	    css.type = "text/css";
	    css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
	    document.body.appendChild(css);
	  };
	};

	//6)======================Window smooth scroll=============
	function window_smooth_scroll(){

	  var $window = $(window);    //Window object
	  var scrollTime = 1;     //Scroll time
	  var scrollDistance = 200;   //Distance. Use smaller value for shorter scroll and greater value for longer scroll

	  $window.on("mousewheel DOMMouseScroll", function(event){
	      
	    event.preventDefault(); 
	                      
	    var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
	    var scrollTop = $window.scrollTop();
	    var finalScroll = scrollTop - parseInt(delta*scrollDistance);
	        
	    TweenMax.to($window, scrollTime, {
	      scrollTo : { y: finalScroll, autoKill:true },
	      ease: Expo.easeOut, //For more easing functions see https://api.greensock.com/js/com/greensock/easing/package-detail.html
	      autoKill: true,
	      overwrite: 5              
	    });
	            
	  });
	};

	//7)======================Smooth Scroll====================
	function smoothscroll(){

	   $('.sscroll').click(function() {
	      var target = $(this.hash);
	      var hash = this.hash;
	      if (target.length == 0) target = $('a[name="' + this.hash.substr(1) + '"]');
	      if (target.length == 0) target = $('html');
	      $('html, body').animate({ scrollTop: target.offset().top }, 500, function (){
	          location.hash = hash;
	      });
	      return false;

	   })

	  //$('.sscroll').on('click', function (e) {

	      //var target = this.hash;
	      //var $target = $(target);

	      //$('html, body').animate({
	            //'scrollTop': $target.offset().top
	        //}, 1000, 'swing');
	      //alert($target);

	  //});
	};

	//8)======================Move to top======================
	function move_to_top(){

	  var scrolltoTop = $(".top-move");


	  $(window).scroll(function(){
	    var topPos = $(this).scrollTop();

	    if($(this).scrollTop() > 100){
	      $('.top-move').fadeIn(500);
	    }else{
	      $('.top-move').fadeOut(500);
	    }
	  });

	  $(scrolltoTop).click(function() {
	      $('html, body').animate({
	        scrollTop: 0
	      }, 800);
	      return false;
	  }); 
	};



});//Document ready

