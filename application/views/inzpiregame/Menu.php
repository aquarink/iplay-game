<!DOCTYPE HTML>
<html>
<head>
<title>:::inzpire.games:::</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery.js"></script>
<!-- start slider -->
	<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery.min.js"></script>
    <script type='text/javascript' src="js/jquery.mobile.customized.min.js"></script>
    <script type='text/javascript' src="js/jquery.easing.1.3.js"></script> 
    <script type='text/javascript' src="js/camera.min.js"></script>
    <script>
		jQuery(function(){

			jQuery('#camera_wrap_2').camera({
				
				loader: 'bar',
				pagination: false,
				thumbnails: false
			});
		});
	</script>
<!-- end slider -->
<!-- start gallery -->
	<script type="text/javascript" src="js/jquery.easing.min.js"></script>	
	<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
	<script type="text/javascript">
	$(function () {
		
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixitup({
					targetSelector: '.portfolio',
					filterSelector: '.filter',
					effects: ['fade'],
					easing: 'snap',
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			
			},
			
			hoverEffect: function () {
			
				// Simple parallax effect
				$('#portfoliolist .portfolio').hover(
					function () {
						$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
						$(this).find('img').stop().animate({top: 0}, 500, 'easeOutQuad');				
					},
					function () {
						$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
						$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
					}		
				);				
			
			}

		};
		
		// Run the show!
		filterList.init();
		
		
	});	
	</script>
<!-- Add fancyBox main JS and CSS files -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>
</head>
		
<body>
<
<!--end wrap-->   
<!--top- heading-->
<div class="top-heading">
	<!--start-wrap-->
	<div class="wrap">
		<h1></h1>
	</div>
	<!--end wrap-->
</div> 
<!--start portfolio-->
<div class="wrap">
<div class="main">
	<!-- start gallery  -->
			<div class="gallery1">
					<!--start-mfp -->	
						<div id="small-dialog1" class="mfp-hide">
							<div class="pop_up">
								<h2> </h2>
								<img src="images/gallery_zoom.jpg" alt=""/>
								<p class="para"> </p>
							</div>
						</div>
					<!--end-mfp -->	
					div class="logo">
			<a href="index.html"><img src="img/logo.png" title="game" alt="game"/></a>
		</div><!-- end logo -->
					<div class="container">
					
			<div id="portfoliolist">
			<div class="portfolio logo" data-cat="logo">
				<div class="portfolio-wrapper">				
					<a  href="game/bil/index.html">
						<img src="images/g2.png"  alt="Image 1" />
						<span><img src="images/plus.png" alt="" /> </span>
						<div class="desc">
						 	<h2></h2>
						 	<h3></h3>
						</div>
					</a>
				</div>
			</div>
			<div class="portfolio logo" data-cat="logo">
				<div class="portfolio-wrapper">				
					<a  href="game/hal/index.html">
						<img src="images/g1.png"  alt="Image 1" />
						<span><img src="images/plus.png" alt="" /> </span>
						<div class="desc">
						 	<h2></h2>
						 	<h3></h3>
						</div>
					</a>
				</div>
			</div>		
			<div class="portfolio logo" data-cat="logo">
				<div class="portfolio-wrapper">				
					<a  href="game/ran/index.html">
						<img src="images/g3.png"  alt="" />
						<span><img src="images/plus.png" alt="" /> </span>
						<div class="desc">
						 	<h2></h2>
						 	<h3></h3>
						</div>
					</a>
				</div>
			</div>		
			<div class="portfolio logo" data-cat="logo">
				<div class="portfolio-wrapper">				
					<a  href="game/vik/index.html">
						<img src="images/g4.png"  alt="" />
						<span><img src="images/plus.png" alt="" /> </span>
						<div class="desc">
						 	<h2></h2>
						 	<h3></h3>
						</div>
					</a>
				</div>
			</div>		
			<div class="portfolio logo" data-cat="logo">
				<div class="portfolio-wrapper">				
					<a  href="game/jc/index.html">
						<img src="images/g5.png"  alt="" />
						<span><img src="images/plus.png" alt="" /> </span>
						<div class="desc">
						 	<h2></h2>
						 	<h3></h3>
						</div>
					</a>
				</div>
			</div>	
			<div class="portfolio logo" data-cat="logo">
				<div class="portfolio-wrapper">				
					<a  href="game/math/index.html">
						<img src="images/g6.png"  alt="" />
						<span><img src="images/plus.png" alt="" /> </span>
						<div class="desc">
						 	<h2></h2>
						 	<h3></h3>
						</div>
					</a>
				</div>
			</div>		
			<div class="portfolio logo" data-cat="logo">
				<div class="portfolio-wrapper">				
					<a  href="game/mons/index.html">
						<img src="images/g7.png"  alt="" />
						<span><img src="images/plus.png" alt="" /> </span>
						<div class="desc">
						 	<h2></h2>
						 	<h3></h3>
						</div>
					</a>
				</div>
			</div>		
			<div class="portfolio logo" data-cat="logo">
				<div class="portfolio-wrapper">				
					<a  href="game/trac/index.html">
						<img src="images/g8.png"  alt="" />
						<span><img src="images/g8.png" alt="" /> </span>
						<div class="desc">
						 	<h2></h2>
						 	<h3></h3>
						</div>
					</a>
				</div>
			</div>
			
			
					
				
			
																																										
		</div>
	</div><!-- container -->
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script type="text/javascript">$('body').flipLightBox()</script>
	<div class="clear"> </div>
	</div>
<!--End-gallery-->
</div>
<!--start footer-->
<div class="footer">
	<div class="footer-main wrap">
	<div class="footer-grids">
		<div class="fgrid">
			<h3></h3>
			<p></p>
			<p></p>
		</div>
		
		<div class="fgrid">
			
			<h4> </h4>
				<div class="social-media">
			     
		</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>
</div>
<!--end footer-->
<div class="copy-right">
	<div class="wrap">
		<div class="copy-right-left">
			<p>INZPIRE 2017</p>
		</div>
	</div>
</div>
</body>
</html>