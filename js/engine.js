jQuery(document).ready(function() {

// BEGIN script for slider on landing page
	var _minSlides,
		_width = $(window).width();

	if (_width <= 767) {
		_minSlides = 1;
	} else {
		_minSlides = 4;
	}
	_sliderCourses = $('.popular-courses-slider').bxSlider({
		speed: 1500,
		nextSelector: '#slider-next',
		prevSelector: '#slider-prev',
		pager: false,
		minSlides: _minSlides,
		maxSlides: _minSlides,
		slideWidth: 5000,
		adaptiveHeight: true,
		auto: false,
		pause: 7000,
	});
// END script for slider on landing page

// BEGIN script for grid or list courses list view
	$('.btn-view-list').click(function(){
		$('.course-items').addClass('course-items-list-view');
		$('.course-items').removeClass('course-items-grid-view');
		$('.view-toggle a').removeClass('active');
		$(this).addClass('active');
	});
	$('.btn-view-grid').click(function(){
		$('.course-items').removeClass('course-items-list-view');
		$('.course-items').addClass('course-items-grid-view');
		$('.view-toggle a').removeClass('active');
		$(this).addClass('active');
	});
	$('.btn-togle-details').click(function(){
		$(this).toggleClass('active');
		$(this).parents('.course-item-cont').find('.for-list-view-wr').slideToggle('active');
	});
// END script for grid or list courses list view

// BEGIN script for basic .adminsearchform validation
	$(".adminsearchform").submit(function(){
		if ($('.adminsearchform input[type="text"]').val().length < 1 ) {
			return false;
		};
	});
// END script for basic .adminsearchform validation


/*tooltip for column3home.php*/
$('[data-toggle="tooltip"]').tooltip();  

$("li.dropdown").on("click",function() {
   $(this).toggleClass('open');
});


$('#block-region-side-pre').addClass('left-menu-close');
$(".side-pre-menu").on("click",function() {   
   $(this).toggleClass('is-active'); 
   $('#block-region-side-pre').toggleClass('left-menu-open');
   $('.nav-collapse').toggleClass('zindexclass');
});

$('.menulist').css('display', 'none');
$('.menubars').on("click",function() {
	$('.menulist').toggleClass('usermenu-show active-drop-user-menuinner');
	$('.nav-collapse').removeClass('in').removeAttr('style');
	$('.btn-navbar').addClass('collapsed');
});

$(".btn-navbar").on("click",function() {
	if ($('#custommenu').val() == "nologinselfreg"){ 
		$('.nav-collapse').toggleClass('in').removeAttr('style').addClass("inner-active-drop-nologin-selfreg");
	} else {
		$('.nav-collapse').toggleClass('in').removeAttr('style');
	}

	$('.usermenu-show').removeClass('usermenu-show');
});


$( window ).load(function() {
  var outerHeight = $('#region-main').outerHeight();
	$('#block-region-side-post').css('min-height', outerHeight+'px');
	$('#block-region-side-pre').css('min-height', outerHeight+'px');
	});

});


