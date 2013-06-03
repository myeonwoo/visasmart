<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Tectonic | Single Project: Slideshow</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/base.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/grid.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/layout.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/colors/brown.css" id="color-scheme">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Open+Sans:400,700,400italic|Open+Sans+Condensed:300">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/prettyPhoto.default.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/carousel.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/switcher.css"> <!-- Style Switcher -->
	
	<!-- Java Script -->
	<script>document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/g, 'js');</script>
	<!--[if lt IE 9]><script src="<?php echo base_url(); ?>static/js/html5shiv.js"></script><![endif]-->
	
</head>

<body class="body-bg-image1 image-background">
<div id="page-wrapper">


<!-- START HEADER -->

<header id="header">
	
	<div class="container"> <!-- 1152 pixels Container -->
	
		<div class="sixteen columns">
			
			<!-- Logo -->
			<div id="logo">
				<a href="index.html"><img src="<?php echo base_url(); ?>static/images/logo.png" alt="logo"></a>
			</div>
	
			<!-- Navigation -->
			<nav id="navigation">

				<div id="primary-nav">
					
					<ul id="main-menu">

						<li><a href="index.html">Home</a>
							<ul>
								<li><a href="index.html">Home Page 1</a></li>
								<li><a href="index2.html">Home Page 2</a></li>
							</ul>
						</li>
						
						<li><a href="about-us.html">Page Templates</a>
							<ul>
								<li><a href="about-us.html">About Us</a></li>
								<li><a href="services.html">Services Page 1</a></li>
								<li><a href="services-page-2.html">Services Page 2</a></li>
								<li><a href="team.html">Team</a>
									<ul>
										<li><a href="member-profile.html">Member Profile</a></li>
									</ul>
								</li>
								<li><a href="gallery.html">Gallery</a></li>
								<li><a href="fullwidth-page.html">Full-width Page</a></li>
							</ul>
						</li>

						<li><a href="portfolio-2-columns.html" class="current">Portfolio</a>
							<ul>
								<li><a href="portfolio-1-column.html">1 Column</a></li>
								<li><a href="portfolio-2-columns.html">2 Columns</a></li>
								<li><a href="portfolio-3-columns.html">3 Columns</a></li>
								<li><a href="portfolio-3-columns-fullwidth.html">3 Columns Full-width</a></li>
								<li><a href="portfolio-4-columns-fullwidth.html">4 Columns Full-width</a></li>
								<li><a href="single-project.html">Single Project</a></li>
								<li><a href="single-project-gallery-slider.html">Project with Gallery Slider</a></li>
								<li><a href="single-project-slideshow.html" class="current">Project with Slideshow</a></li>
								<li><a href="single-project-video-youtube.html">Project with Video</a>
									<ul>
										<li><a href="single-project-video-youtube.html">YouTube Video</a></li>
										<li><a href="single-project-video-vimeo.html">Vimeo Video</a></li>
										<li><a href="single-project-video-html5.html">HTML5 Video</a></li>
									</ul>
								</li>
							</ul>
						</li>

						<li><a href="blog.html">Blog</a>
							<ul>
								<li><a href="blog.html">Large Image</a></li>
								<li><a href="blog-medium-image.html">Medium Image</a></li>
								<li><a href="single-post.html">Single Post</a></li>
							</ul>
						</li>
						
						<li><a href="typography.html">Features</a>
							<ul>
								<li><a href="typography.html">Typography</a></li>
								<li><a href="columns.html">Columns</a></li>
								<li><a href="elements.html">Elements</a></li>
								<li><a href="media.html">Media and Sliders</a></li>
								<li><a href="pricing-tables.html">Pricing Tables</a></li>
							</ul>
						</li>
						
						<li><a href="contact.html">Contact</a>
							<ul>
								<li><a href="contact.html">Defaul Layout</a></li>
								<li><a href="contact2.html">Alternative Layout</a></li>
							</ul>
						</li>

					</ul>

				</div>
				
			</nav>
			
		</div>
		
	</div>
	
</header>

<!-- END HEADER -->


<!-- START CONTENT -->

<section id="main" class="container"> <!-- 1152 pixels Container -->

	<!-- Page Title -->
	<div class="sixteen columns">
		<div class="page-title">
			<h3>Hiking Trips</h3>
			<h1>Middle Fork Salmon Hiking</h1>
		</div>
	</div>
	
	<!-- Info Board -->
	<!-- data-smallscreen: "yes" or "no" - whether to show a block on a small-screen mobile device or not -->
	<!-- five-item-menu - corresponds to the number of items in the secondary menu -->
	<div class="four columns five-item-menu" id="iBoard" data-smallscreen="yes">
		
		<!-- Secondary Menu -->
		<div class="menu shadow" data-smallscreen="yes">
			<ul id="secondary-menu">
				<li><a href="#"><h6 class="title">Whitewater Rafting</h6></a></li>
				<li><a href="#"><h6 class="title">Multisport</h6></a></li>
				<li class="current"><a href="#"><h6 class="title">Hiking and Walking</h6></a></li>
				<li><a href="#"><h6 class="title">Biking</h6></a></li>
				<li><a href="#"><h6 class="title">Horseback</h6></a></li>
			</ul>
		</div>
		
		<!-- Info Text -->
		<div class="five columns alpha omega">
			<aside id="info-board" class="colored" data-smallscreen="yes">
				<h2 class="tall">Natural hot springs, Native American pictographs, pioneer homesteads, incredible scenery, wildlife viewing & blue-ribbon trout fishing.</h2>
			</aside>
		</div>
	</div>
	
	<!-- Page Content -->
	<div class="twelve columns" id="pContent">
	
		<section id="page-content" class="clearfix"> <!-- inner grid 720 pixels wide -->
		
			<div class="twelve columns">
			
				<!-- Image Slider -->
				<section class="flexslider margin-bottom-35px">
					<ul class="slides">
						<li>
							<img src="<?php echo base_url(); ?>static/images/portfolio/project8-slide1.jpg" alt="">
						</li>
						<li>
							<img src="<?php echo base_url(); ?>static/images/portfolio/project8-slide2.jpg" alt="">
						</li>
						<li>
							<img src="<?php echo base_url(); ?>static/images/portfolio/project8-slide3.jpg" alt="">
						</li>
					</ul>
					<div class="border"></div> <!-- delete this line if you link a slide to URL -->
				</section>
		
				<!-- Description -->
				<h2>Description</h2>
				<p><strong>This is an example of a single project (single service) page with the slideshow.</strong> Each element of the item description can be easily modified.</p>
				<p class="margin-bottom-30px">Mauris rhoncus aliquet lectus, lobortis fringilla tortor placerat ac magna volutpat cursus sit amet sollicitudin massa. Etiam sollicitudin lectus vitae velit vulputate quis consequat nunc placerat in ac risus quam, in congue purus.</p>
				
				<!-- Tabs -->
				<ul class="tabs-nav clearfix">
					<li class="active"><a href="#tab1">Overview</a></li>
					<li><a href="#tab2">Dates & Rates</a></li>
					<li><a href="#tab3">Itinerary</a></li>
				</ul>
				
				<div class="tabs-container">
					
					<!-- Tab 1 content -->
					<div id="tab1" class="tab-content">
						<ul class="arrow-list colored data remove-bottom">
							<li><strong>Duration:</strong> 6 days</li>
							<li><strong>Length:</strong> 48 miles</li>
							<li><strong>Intensity:</strong> Intermediate</li>
							<li><strong>Season:</strong> June-September</li>
							<li><strong>Begins In:</strong> Stanley, Idaho</li>
							<li><strong>Ends In:</strong> Boise, Idaho</li>
							<li><strong>Airport:</strong> Boise, Idaho</li>
							<li><strong>Wildlife:</strong> Big Horn Sheep, Eagles, Hawks, Songbirds, Waterfowl</li>
						</ul>
					</div>
					
					<!-- Tab 2 content -->
					<div id="tab2" class="tab-content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras leo urna, convallis at tincidunt vel, convallis quis nisi. In eleifend ligula sit amet lacus suscipit tristique tempor turpis aliquet. Etiam sollicitudin turpis in quam tincidunt lacinia.</p>
						<ul class="disc">
							<li>Class aptent taciti sociosqu ad litora torquent.</li>	
							<li>Nulla ornare neque sit amet magna volutpat cursus sit amet sollicitudin massa.</li>
							<li>Duis quis elit eu purus fringilla gravida sed arcu vehicula.</li>
							<li>Duis quis elit eu purus fringilla.</li>
						</ul>
						<p class="remove-bottom">Vivamus diam eros, consectetur eu eleifend quis, varius et felis. Aliquam gravida tortor eu nulla congue praesent tristique egestas tincidunt. Nulla convallis, nisi ac fringilla pharetra, est nulla tincidunt lacus.</p>
					</div>
					
					<!-- Tab 3 content -->
					<div id="tab3" class="tab-content">
						<img src="<?php echo base_url(); ?>static/images/pic-screenshot.jpg" alt="" class="image-left scale-with-grid adapted">
						Nam sodales erat ornare erat iaculis commodo. Curabitur et luctus augue. Vivamus ut arcu in arcu mollis consectetur id id mauris. Curabitur porta risus eu lorem tempus vitae sodales ante mollis. Curabitur gravida tincidunt ornare. Sed vulputate, nunc a cursus imperdiet, felis tortor interdum purus, non viverra justo libero et erat. Aliquam dignissim lorem ac leo egestas pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In ultrices magna non sapien varius sollicitudin. Pellentesque tincidunt lacinia justo, ac convallis turpis rhoncus ut. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
					</div>
					
				</div>
				<!-- end Tabs -->
				
				<p>Nam sodales erat ornare erat iaculis commodo. Curabitur et luctus vivamus ut arcu in arcu mollis consectetur id id mauris. Curabitur porta risus eu lorem tempus vitae sodales ante mollis. Curabitur gravida tincidunt ornare. Sed vulputate, a cursus imperdiet, felis tortor interdum purus, non viverra justo libero et erat. Aliquam dignissim lorem ac leo egestas pellentesque.</p>
				<p>Donec non eros ipsum, vel suscipit enim. Proin at leo a ligula egestas pellentesque. Maecenas porta pretium quam, et rutrum nunc lobortis id. Aenean cursus, justo ut tristique tincidunt, sapien turpis egestas nisi, non ultricies lorem risus nec neque. In nec quam sit amet erat iaculis cursus. Morbi porta, urna at euismod placerat, nibh mauris tincidunt erat, quis lobortis leo augue ac erat. Aenean quis diam nunc. Quisque nisl enim, volutpat vitae fermentum sed, convallis non ante. Quisque tincidunt lacus turpis. Nulla congue suscipit turpis, vitae hendrerit augue facilisis quis.</p>
				<p>Sed commodo fermentum urna nec rutrum. Nulla fermentum nulla orci. Pellentesque a consectetur lectus. Maecenas in sapien nunc. Duis congue enim non quam malesuada fringilla. Duis placerat tellus sed arcu vehicula ac ultrices eros condimentum. Duis quis elit eu purus fringilla gravida. Nulla pretium elementum lacus, eget condimentum est ullamcorper at. Nam a ipsum tortor. Nunc nec nisl ac urna posuere dictum. Nullam nec feugiat ipsum. Nam sed purus in purus dictum iaculis. Fusce fringilla tellus ac leo luctus ultricies. Integer ultrices ultrices leo, pellentesque laoreet dui feugiat vitae. Quisque egestas adipiscing turpis ultricies feugiat. Aliquam ut mi id mi malesuada feugiat in quis velit.</p>
			
			</div> <!-- end twelve columns -->
		
		</section> <!-- end inner grid -->
	
	</div>
	<!-- end Page Content -->
	
	<!-- Sidebar -->
	<div class="four columns" id="sBar">
	
		<aside id="sidebar">
			
			<!-- Trips List -->
			<div class="widget" data-smallscreen="yes"> <!-- show widget on a small-screen mobile device: "yes" or "no" -->
				<h5>Hiking Trips</h5>
				<ul class="categories square-list">
					<li><a href="#">Rogue River Hiking</a></li>
					<li class="current"><a href="single-project-slideshow.html">Middle Fork Salmon Hiking</a></li>
					<li><a href="#">Peaks of the Balkans</a></li>
					<li><a href="#">Idaho Adventure</a></li>
					<li><a href="#">Snake River Hiking &mdash; Hells Canyon</a></li>
					<li><a href="#">Amazon Rainforest</a></li>
				</ul>
			</div>
			
			<!-- Some Featured Project/Service/Product -->
			<div class="widget" data-smallscreen="yes"> <!-- show widget on a small-screen mobile device: "yes" or "no" -->
				<h5>Featured Hiking</h5>
				<a href="single-project.html" title="Spring"><img src="<?php echo base_url(); ?>static/images/portfolio/project6-preview-420x252.jpg" alt="" class="scale-with-grid margin-bottom-10px"></a>
				<p class="margin-bottom-5px"><strong>Peaks of the Balkans &mdash; Montenegro and Albania</strong></p>
				<p>Duration: 8 days</p>
				<p>Maecenas porta pretium quam, et rutrum nunc lobortis id. Aenean cursus, justo ut tristique tincidunt, sapien turpis egestas nisi...</p>
			</div>
			
		</aside>
		
	</div>
	<!-- end Sidebar -->
	
	<div class="clear"></div>
	
</section>

<!-- END CONTENT -->


<!-- START FOOTER -->

<footer id="footer">

	<div class="container"> <!-- 1152 pixels Container -->
	
		<!-- Contact Details -->
		<div class="one-third column" id="contact-details">
			<div>
				<p>Connect with Us</p>
				<h2 class="phone-number">+1 (510) 700-1234</h2>
				<a href="mailto:info@ipsum.com">info@ipsum.com</a>
			</div>
		</div>
		
		<div class="two-thirds column" id="footer-links">
			
			<!-- Social Icons -->
			<ul class="social-icons clearfix">
				<li class="twitter"><a href="#">Twitter</a></li>
				<li class="facebook"><a href="#">Facebook</a></li>
				<li class="pinterest"><a href="#">Pinterest</a></li>
				<li class="linkedin"><a href="#">LinkedIn</a></li>
			</ul>
			
			<!-- Footer Navigation -->
			<ul class="footer-nav clearfix">
				<li><a href="index.html">Home</a></li>
				<li><a href="about-us.html">About</a></li>
				<li><a href="services.html">Services</a></li>
				<li><a href="portfolio-2-columns.html">Portfolio</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
			
			<div class="clear"></div> <!-- IE7 margin-bottom fix -->
			
		</div>
		
	</div>

</footer>

<footer id="footer-bottom">
	
	<div class="container"> <!-- 1152 pixels Container -->
		<div class="sixteen columns">
			
			<div class="twelve columns alpha">
				<ul class="links clearfix">
					<li>&copy; 2013 Tectonic<span>|</span></li>
					<li><a href="#">Legal Notice</a><span>|</span></li>
					<li><a href="#">Terms</a></li>
				</ul>
			</div>
				
			<div class="four columns omega">
				<span class="scroll-top">Back to Top</span>
			</div>
			
		</div>
	</div>
	
</footer>

<!-- END FOOTER -->


</div>

<!-- Java Script -->
<script src="<?php echo base_url(); ?>static/js/respond.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/selectnav.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/detectmobilebrowser.js"></script>
<script src="<?php echo base_url(); ?>static/js/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/jquery.fitvids.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/jquery.prettyPhoto.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/jquery.flexslider.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/jquery.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/jquery.tweet.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/custom.js"></script>
<script src="<?php echo base_url(); ?>static/js/switcher.js"></script> <!-- Style Switcher -->

<script>
// FlexSlider custom parameters
// var fs_params = {controlNav: true, directionNav: false};
</script>

</body>
</html>
