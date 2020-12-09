@extends('layouts.master')

@section('title')
    Library Management | Home
@endsection


@section('links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
<link rel="stylesheet" href="js/masterslider/style/masterslider.css" />
<link href="js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="js/cubeportfolio/cubeportfolio.min.css">
<link rel="stylesheet" type="text/css" href="css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
<link rel="stylesheet" href="js/ytplayer/ytplayer.css" />
@endsection


@section('content')
<div class="master-slider ms-skin-default" id="masterslider"> 
    
    <!-- slide 1 -->
    <div class="ms-slide slide-1" data-delay="9">
      <div class="slide-pattern"></div>
      
      <img src="js/masterslider/blank.gif" data-src="http://placehold.it/1920x650" alt=""/>
      
      <h3 class="ms-layer text1 dark"
			style="left: 230px;top: 200px;"
			data-type="text"
			data-delay="500"
			data-ease="easeOutExpo"
			data-duration="1230"
			data-effect="scale(1.5,1.6)"> Get Excellent Features </h3>
            
      <h3 class="ms-layer text2 dark"
			style="left: 230px;top: 245px;"
			data-type="text"
			data-delay="1000"
			data-ease="easeOutExpo"
			data-duration="1230"
			data-effect="scale(1.5,1.6)"> With Our Hasta </h3>
            
      <h3 class="ms-layer text3 dark"
        	style="left: 230px; top: 313px;"
            data-type="text"
            data-effect="top(45)"
            data-duration="2000"
            data-delay="1500"
            data-ease="easeOutExpo"> Lorem ipsum dolor sit amet consectetuer adipiscing elit Suspendisse et justo <br />
        Praesent mattis commodo augue Aliquam ornare. </h3>
        
      <a class="ms-layer sbut3"
			style="left: 230px; top: 395px;"
			data-type="text"
			data-delay="2000"
			data-ease="easeOutExpo"
			data-duration="1200"
			data-effect="scale(1.5,1.6)"> Read More </a> 
            
            <a class="ms-layer sbut4"
			style="left: 390px; top: 395px;"
			data-type="text"
			data-delay="2500"
			data-ease="easeOutExpo"
			data-duration="1200"
			data-effect="scale(1.5,1.6)"> Purchase Now ! </a> 
            </div>
    <!-- end slide 1 --> 
    
    <div class="ms-slide" data-delay="10">
		
        <video data-autopause="false" data-mute="true" data-loop="true" data-fill-mode="fill">
                <source type="video/webm" src="https://codelayers.net/videos/video-2.webm">
              <source type="video/mp4" src="https://codelayers.net/videos/video-2.mp4">
              <source type="video/ogg" src="https://codelayers.net/videos/video-2.ogv">
            </video>
            <img src="js/masterslider/style/blank.gif" data-src="http://placehold.it/1920x650" alt="lorem ipsum dolor sit">  
        
        <h3 class="ms-layer text52"
			style="top:200px;"
			data-type="text"
			data-ease="easeOutExpo"
			data-delay="500"
		 	data-duration="1400"
		 	data-effect="skewleft(30,80)"> Add Your Own </h3>
            
      <h3 class="ms-layer text53"
			style="top:245px;"
			data-type="text"
			data-ease="easeOutExpo"
			data-delay="1000"
		 	data-duration="1400"
		 	data-effect="skewright(30,80)"> Video Backgrounds </h3>
            
      <h3 class="ms-layer text54"
        	style="top: 313px;"
            data-type="text"
            data-effect="top(45)"
            data-duration="2000"
            data-delay="1500"
            data-ease="easeOutExpo"> Lorem ipsum dolor sit amet consectetuer adipiscing elit Suspendisse et justo <br />
        Praesent mattis commodo augue Aliquam ornare. </h3>
 
            
            <a class="ms-layer sbut5"
			style="left: 710px; top: 395px;"
			data-type="text"
			data-delay="2500"
			data-ease="easeOutExpo"
			data-duration="1200"
			data-effect="scale(1.5,1.6)"> Purchase now ! </a>
        			       
    </div><!-- end slide -->
    
    <!-- slide 2 -->
    <div class="ms-slide slide-1" data-delay="9">
      <div class="slide-pattern"></div>
      
      <img src="js/masterslider/blank.gif" data-src="http://placehold.it/1920x650" alt=""/>
      
      <h3 class="ms-layer text52"
			style="top:200px;"
			data-type="text"
			data-ease="easeOutExpo"
			data-delay="500"
		 	data-duration="1400"
		 	data-effect="skewleft(30,80)"> Our Beautiful </h3>
            
      <h3 class="ms-layer text53"
			style="top:245px;"
			data-type="text"
			data-ease="easeOutExpo"
			data-delay="1000"
		 	data-duration="1400"
		 	data-effect="skewright(30,80)"> 30 + Unique Layouts </h3>
            
      <h3 class="ms-layer text54"
        	style="top: 313px;"
            data-type="text"
            data-effect="top(45)"
            data-duration="2000"
            data-delay="1500"
            data-ease="easeOutExpo"> Lorem ipsum dolor sit amet consectetuer adipiscing elit Suspendisse et justo <br />
        Praesent mattis commodo augue Aliquam ornare. </h3>
 
            
            <a class="ms-layer sbut5"
			style="left: 710px; top: 395px;"
			data-type="text"
			data-delay="2500"
			data-ease="easeOutExpo"
			data-duration="1200"
			data-effect="scale(1.5,1.6)"> Purchase now ! </a> 
            </div>
    <!-- end slide 2 -->
    
    
    <!-- slide 3 -->
    <div class="ms-slide slide-3" data-delay="9">
         
        <!-- slide background -->
        <img src="js/masterslider/blank.gif" data-src="http://placehold.it/1920x650" alt=""/>
        
		<h3 class="ms-layer text1"
			style="left:230px;top:200px;"
			data-type="text"
			data-ease="easeOutExpo"
			data-delay="500"
		 	data-duration="1400"
		 	data-effect="skewleft(30,80)"> Video Layer With</h3>
            
      <h3 class="ms-layer text2"
			style="left:230px;top:245px;"
			data-type="text"
			data-ease="easeOutExpo"
			data-delay="1000"
		 	data-duration="1400"
		 	data-effect="skewright(30,80)"> Video Custom Cover </h3>
            
      <h3 class="ms-layer text3"
        	style="left: 230px; top: 313px;"
            data-type="text"
            data-effect="top(45)"
            data-duration="2000"
            data-delay="1500"
            data-ease="easeOutExpo"> Lorem ipsum dolor sit amet consectetuer adipiscing <br /> elit Suspendisse et justo 
        Praesent. </h3>
        
      <a class="ms-layer sbut1"
			style="left: 230px; top: 395px;"
			data-type="text"
			data-delay="2000"
			data-ease="easeOutExpo"
			data-duration="1200"
			data-effect="scale(1.5,1.6)"> Read More </a> 
            
            <a class="ms-layer sbut5"
			style="left: 390px; top: 395px;"
			data-type="text"
			data-delay="2500"
			data-ease="easeOutExpo"
			data-duration="1200"
			data-effect="scale(1.5,1.6)"> Purchase now ! </a> 
		
		<img src="js/masterslider/blank.gif" data-src="images/sliders/masterslider/video-shadow.png" alt="video shadow"
		 	  style="right:180px; top:495px;"
		 	  class="ms-layer"
		 	  data-type="image"
			  data-duration="3000"
			  data-ease="easeOutExpo"
		/>
		
		<div class="ms-layer video-box" style="right:230px; top:165px; width:662px; height:372px"
			  data-type="video"
			  data-effect="top(100)"
			  data-duration="3000"
			  data-ease="easeOutExpo"
		>
			<img src="js/masterslider/blank.gif" data-src="http://placehold.it/665x375" alt="video shadow"/>
			<iframe src="http://player.vimeo.com/video/50672540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen> </iframe>
		</div>

    </div>
    <!-- end slide 3 -->
  </div>
  <section class="sec-padding">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
		  
		  <div class="tabs-content1">
			<div id="example-1-tab-1" class="tabs-panel1">
			  <div class="col-md-12 padding-left-3">
				<h3>The aim of Self-Checkout System  is to automate the process to check-out a book from any library to improve efficiency over traditional
					library check-out systems.	</h3>
					<h5>How the current Self-Checkout system simplifies the conventional process of checking out the books:</h5>

				<br/>
				<ul class="iconlist orange">
					
						  <li>In traditional library check-out systems, people have to stand in a queue to check-out their books along with their
							library card.</li>
							<li>When their turn comes, the librarian scans the books, then scans their library card and gives them a receipt with the
								cost and return date.</li>
								<li>We are designing and developing a self-checkout system to improve efficiency over the current process.</li>
								<li>The system will scan RFID tags attached to the books and allow users to check-out with their accounts which they
									can setup on our website.</li>
					  </ul>
					  
				  
			</div>
			<!-- end tab 1 -->
			
			<!-- end tab 4 --> 
		  </div>
		  <!-- end all tabs --> 
		</div>
	  </div>
	</div>
  </section>
             
@endsection
@section('scripts')
<script type="text/javascript" src="js/universal/jquery.js"></script>
<script src="js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/ytplayer/jquery.mb.YTPlayer.js"></script> 
<script type="text/javascript" src="js/ytplayer/elementvideo-custom.js"></script> 
<script type="text/javascript" src="js/ytplayer/play-pause-btn.js"></script> 
<script src="js/mainmenu/customeUI.js"></script>
<script src="js/mainmenu/jquery.sticky.js"></script> 
<script src="js/masterslider/masterslider.min.js"></script> 
<script type="text/javascript">
(function($) {
 "use strict";
	var slider = new MasterSlider();
	// adds Arrows navigation control to the slider.
	slider.control('arrows');
	slider.control('bullets');
	
	slider.setup('masterslider' , {
		 width:1600,    // slider standard width
		 height:650,   // slider standard height
		 space:0,
		 speed:45,
		 layout:'fullwidth',
		 loop:true,
		 preload:0,
		 autoplay:true,
		 view:"parallaxMask"
	});
})(jQuery);
</script> 

<script type="text/javascript" src="js/cubeportfolio/jquery.cubeportfolio.min.js"></script> 
<script type="text/javascript" src="js/cubeportfolio/main.js"></script> 
<script src="js/owl-carousel/owl.carousel.js"></script>
<script src="js/owl-carousel/custom.js"></script>  
<script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="js/tabs/smk-accordion.js"></script>
<script type="text/javascript" src="js/tabs/custom.js"></script> 
<script src="js/scrolltotop/totop.js"></script>

<script src="js/scripts/functions.js" type="text/javascript"></script>
@endsection
