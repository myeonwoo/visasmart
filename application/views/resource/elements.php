<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Tectonic | Elements</title>
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

						<li><a href="portfolio-2-columns.html">Portfolio</a>
							<ul>
								<li><a href="portfolio-1-column.html">1 Column</a></li>
								<li><a href="portfolio-2-columns.html">2 Columns</a></li>
								<li><a href="portfolio-3-columns.html">3 Columns</a></li>
								<li><a href="portfolio-3-columns-fullwidth.html">3 Columns Full-width</a></li>
								<li><a href="portfolio-4-columns-fullwidth.html">4 Columns Full-width</a></li>
								<li><a href="single-project.html">Single Project</a></li>
								<li><a href="single-project-gallery-slider.html">Project with Gallery Slider</a></li>
								<li><a href="single-project-slideshow.html">Project with Slideshow</a></li>
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
						
						<li><a href="typography.html" class="current">Features</a>
							<ul>
								<li><a href="typography.html">Typography</a></li>
								<li><a href="columns.html">Columns</a></li>
								<li><a href="elements.html" class="current">Elements</a></li>
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
			<h3>Features</h3>
			<h1>Elements</h1>
		</div>
	</div>
	
	<!-- Info Board -->
	<!-- data-smallscreen: "yes" or "no" - whether to show a block on a small-screen mobile device or not -->
	<!-- five-item-menu - corresponds to the number of items in the secondary menu -->
	<div class="four columns five-item-menu" id="iBoard" data-smallscreen="yes">
	
		<!-- Secondary Menu -->
		<div class="menu shadow" data-smallscreen="yes">
			<ul id="secondary-menu">
				<li><a href="typography.html"><h6 class="title">Typography</h6></a></li>
				<li><a href="columns.html"><h6 class="title">Columns</h6></a></li>
				<li class="current"><a href="elements.html"><h6 class="title">Elements</h6></a></li>
				<li><a href="media.html"><h6 class="title">Media and Sliders</h6></a></li>
				<li><a href="pricing-tables.html"><h6 class="title">Pricing Tables</h6></a></li>
			</ul>
		</div>
		
		<!-- Info Text -->
		<div class="five columns alpha omega">
			<aside id="info-board" class="colored" data-smallscreen="yes">
				<h2 class="tall">This page showcases most of the elements, modules and blocks available in the template.</h2>
			</aside>
		</div>
		
	</div>
	
	<!-- Page Content -->
	<div class="twelve columns" id="pContent">
	
		<section id="page-content" class="clearfix"> <!-- inner grid 720 pixels wide -->
		
			<div class="twelve columns margin-bottom-35px">
				
				<h4 class="margin-bottom-10px">Features Boxes</h4>
				<div class="divider-line double colored margin-bottom-50px"></div>
				
				<!-- Features: Column Type -->
				<ul class="features-column-type clearfix margin-bottom-40px">
					
					<li>
						<article>
							<a href="#"><h4 class="title">Easily Customizable</h4></a>
							<p>Vivamus arcu mollis consectetur fringilla arcu tempor dignissim at lectus, pretium et arcu.</p>
							<a href="#" class="link-sm uppercase">Read more<span></span></a>
						</article>
					</li>
					
					<li>
						<article>
							<a href="#"><h4 class="title">Fully Responsive</h4></a>
							<p>Accusantium et doloremque veritatis architecto, eaque ipsa quae ab illo veritatis perspiciatis.</p>
							<a href="#" class="link-sm uppercase">Read more<span></span></a>
						</article>
					</li>
					
					<li>
						<article>
							<a href="#"><h4 class="title">Mobile Optimized</h4></a>
							<p>Nam aliquam volutpat leo vel bibendum nunc elit purus, tempus pulvinare rhoncus egestas leo.</p>
							<a href="#" class="link-sm uppercase">Read more<span></span></a>
						</article>
					</li>
					
				</ul>
				<!-- end Features -->
				
				<div class="divider-line dotted colored"></div>
				
			</div> <!-- end twelve columns -->
			<div class="clear"></div>
				
			<!-- Features: Icon Type -->
			<section class="features-icon-type clearfix margin-bottom-35px">
				
				<div class="row">
					
					<div class="six columns">
						<article>
							<img src="<?php echo base_url(); ?>static/images/icons/big/icon-globe.png" alt="">
							<header><h3>Social Networking Apps</h3></header>
							<p>Fusce porttitor turpis quis molestie costant equat. Ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia. Nam quis cursus massa.</p>
							<a href="#" class="link-sm uppercase">Learn more<span></span></a>
						</article>
					</div>
				
					<div class="six columns">
						<article>
							<img src="<?php echo base_url(); ?>static/images/icons/big/icon-graph.png" alt="">
							<header><h3>SEO Services</h3></header>
							<p>Sed ut perspiciatis unde omnis iste natus illo inventore voluptatem fringilla tempor dignissim at, pretium et arcu luctus et ultrices.</p>
							<a href="#" class="link-sm uppercase">Learn more<span></span></a>
						</article>
					</div>
					
				</div>
				
			</section>
			<!-- end Features -->
			
			<div class="twelve columns margin-bottom-40px">
				<div class="divider-line dotted colored"></div>
			</div>
			<div class="clear"></div>
			
			<!-- Features: Picture Type -->
			<section class="features-picture-type clearfix margin-bottom-50px">
				
				<div class="row">
				
					<div class="four columns">
						<article>
							<a href="#"><img src="<?php echo base_url(); ?>static/images/service1.jpg" alt=""></a>
							<div>
								<h5>Content Management</h5>
								<p>Sed ut unde omnis iste natus illo inventore fringilla tempor dignissim at, pretium et arcu luctus.</p>
								<a href="#" class="link-sm uppercase">Read more<span></span></a>
							</div>
						</article>
					</div>
					
					<div class="four columns">
						<article>
							<a href="#"><img src="<?php echo base_url(); ?>static/images/service2.jpg" alt=""></a>
							<div>
								<h5>Competitor Analysis</h5>
								<p>Accusantium et veritatis architecto, eaque ipsa faucibus luctus quae ab veritatis vest id ligula porta.</p>
								<a href="#" class="link-sm uppercase">Read more<span></span></a>
							</div>
						</article>
					</div>
					
					<div class="four columns">
						<article>
							<a href="#"><img src="<?php echo base_url(); ?>static/images/service3.jpg" alt=""></a>
							<div>
								<h5>Graphic Design & Identity</h5>
								<p>Fusce porttitor turpis quis molestie costant equat ante ipsum primis in ultrices posuere cubilia quis cursus.</p>
								<a href="#" class="link-sm uppercase">Read more<span></span></a>
							</div>
						</article>
					</div>
				
				</div>
				
			</section>
			<!-- end Features -->
			
			<div class="twelve columns margin-bottom-30px">
				
				<h4 class="margin-bottom-10px">Info Boxes</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Info Box -->
				<div class="info-box margin-bottom-30px">
					<h2>Good choice and perfect solution for any business or portfolio</h2>
					<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia od io sem nec elit. Donec id elit non mi or ta gravida at eget metus similique sunt culpa tofficia deserunt mollitia anima.</p>
					<a href="#" class="link-sm uppercase">Learn more<span></span></a>
				</div>
				
				<!-- Info Box -->
				<div class="info-box margin-bottom-30px">
					<h3 class="align-center">Interested in Working With Us?</h3>
					<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia od io sem nec elit. Donec id elit non mi or ta gravida at eget metus similique sunt culpa tofficia deserunt mollitia anima.</p>
					<div class="align-center margin-bottom-5px"><a href="contact.html" class="button">Get in Touch!</a></div>
				</div>
				
				<!-- Info Box colored -->
				<div class="info-box colored rounded clearfix margin-bottom-50px">
					<img src="<?php echo base_url(); ?>static/images/service3.jpg" alt="" class="image-right scale-with-grid adapted width-250px">
					<h3>Featured product, service, or event</h3>
					<p>Nulla ornare neque sit amet magna volutpat cursus sit amet sollicitudin massa. Sed a sapien ac odio fringilla accumsan. Suspendisse fringilla pellentesque bibendum. Cras scelerisque nisi et lectus facilisis varius. Mauris sodales interdum fringilla. Curabitur ultricies lacus in elit imperdiet id tincidunt eros fringilla.</p>
					<a href="#" class="link-sm uppercase">Learn more<span></span></a>
				</div>
				
				<h4 class="margin-bottom-10px">Announcements</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Announcements -->
				<div class="announcements margin-bottom-30px">
					
					<article>
						<h5 class="uppercase">Stay up-to-date with our latest offers</h5>
						<p>Taciti sociosqu ad litora torquent per conubia nostra, inceptos per himenaeos, lectus orci, elementum quis accumsan sodales vitae fermentum. In ultrices magna non sapien varius sollicitudin entesque tincidunt lacinia justo, convallis turpis rhoncus ut aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
						<a href="#" class="link-lg">Go to our offers page<span></span></a>
					</article>
					
					<article>
						<h5 class="uppercase">Learn about our corporate sponsors</h5>
						<p>Elementum quis accumsan sodales, lobortis euismod nulla nec mauris id porttitor felis placerat. Nunc pellen tesque mi placerat posuere laoreet sapien varius.</p>
						<a href="#" class="link-lg">Discover our sponsors<span></span></a>
					</article>
					
				</div>
				<!-- end Announcements -->
				
				<div class="divider-pattern colored margin-bottom-30px"></div>
				
				<!-- Announcements -->
				<div class="announcements clearfix margin-bottom-25px">
				
					<section class="align-left adapted width-one-half">
						<article class="offset-right-10px">
							<h5 class="uppercase">Stay up-to-date with our latest offers</h5>
							<p>Taciti sociosqu ad litora torquent per conubia nostra, inceptos per himenaeos, lectus orci, elementum quis accumsan sodales vitae fermentum.</p>
							<a href="#" class="link-lg">Go to our offers page<span></span></a>
						</article>
					</section>
					
					<section class="align-right adapted width-one-half">
						<article class="offset-left-10px">
							<h5 class="uppercase">Learn about our corporate sponsors</h5>
							<p>Elementum quis accumsan sodales, lobortis euismod nulla nec mauris id porttitor felis placerat. Nunc pellen tesque mi placerat posuere laoreet.</p>
							<a href="#" class="link-lg">Discover our sponsors<span></span></a>
						</article>
					</section>
					
				</div>
				<!-- end Announcements -->
				
				<div class="divider-pattern colored margin-bottom-40px"></div>
				
				<!-- Announcements -->
				<div class="announcements margin-bottom-40px">
					
					<article class="clearfix">
						<a href="#"><img src="<?php echo base_url(); ?>static/images/post-item-preview-1.jpg" alt=""></a>
						<div class="preview-text">
							<a href="#"><h5 class="title">Learn about our more recent classes</h5></a>
							<p>Vestibulum id ligula porta felis euismod semper ali d dolor id nibh ultricies vehicula ut id elit tincidunt lacinia justo.</p>
							<span>Jan 26, 2013</span>
						</div>
					</article>
					
					<article class="clearfix">
						<a href="#"><img src="<?php echo base_url(); ?>static/images/post-item-preview-3.jpg" alt=""></a>
						<div class="preview-text">
							<a href="#"><h5 class="title">We have moved to a new ofice</h5></a>
							<p>Nulla vitae libero, a pharetra augue vivamus sagittis aptent taciti ad litora mauris molestie nisi dignissim, lobortis placerat ac massa justo sit amet risus.</p>
							<span>Aug 08, 2012</span>
						</div>
					</article>
					
				</div>
				<!-- end Announcements -->
				
				<div class="divider-pattern colored"></div>
				
			</div> <!-- end twelve columns -->
			<div class="clear"></div>
				
			<!-- Announcements -->
			<section class="announcements clearfix margin-bottom-50px">
				
				<div class="row">
					
					<div class="six columns">
						<article>
							<a href="#"><h5 class="title uppercase">Responsive HTML5 and CSS3 design</h5></a>
							<p class="remove-bottom">Tectonic is fully responsive, and all the layouts are built with responsive design in mind &mdash; so it works well on desktops, tablets, and mobile devices&#8230;<a href="#">&nbsp;&raquo;&nbsp;</a></p>
						</article>
					</div>
					
					<div class="six columns">
						<article>
							<a href="#"><h5 class="title uppercase">Cross-browser compatible</h5></a>
							<p class="remove-bottom">We worked hard to make the template usable across all major media, whether it be popular browsers, mobile devices, or any other web browsing devices&#8230;<a href="#">&nbsp;&raquo;&nbsp;</a></p>
						</article>
					</div>
					
				</div>
				
				<div class="row">
					
					<div class="six columns">
						<article>
							<h5 class="uppercase">Multi-Video Support</h5>
							<p class="remove-bottom">Not only videos from YouTube and Vimeo, but also HTML5 Video are supported throughout the entire template, so they can be used on any page!</p>
						</article>
					</div>
					
					<div class="six columns">
						<article>
							<h5 class="uppercase">Fully functional Contact Form</h5>
							<p class="remove-bottom">The template is packaged with the fully functional contact and comment forms.</p>
						</article>
					</div>
					
				</div>
				
			</section>
			<!-- end Announcements -->
			
			<div class="twelve columns">
				
				<h4 class="margin-bottom-10px">Testimonials</h4>
				<div class="divider-line double colored margin-bottom-15px"></div>
				
				<!-- Testimonials -->				
				<section class="carousel-container testimonials-holder margin-bottom-20px">
					<div class="carousel-frame">
						
						<ul class="testimonials-carousel clearfix">
							
							<li>
								<blockquote class="testimonial">
									<div class="quote-icon"></div>
									<p>Just wanna post a huge thanks here to the author for his kind help via email, problem solved and this fantastic website template marks the close of my project in a lovely way! Great work, wonderful support... A highly recommended purchase to anyone in doubt!</p>
									<span><strong>John Carter</strong> &mdash; Manager, OnixCreative</span>
								</blockquote>
							</li>
							
							<li>
								<blockquote class="testimonial">
									<div class="quote-icon"></div>
									<p>I am very pleased and excited about this provider so far. They have got an incredible amount of work done in a short period, and have kept me posted frequently. They are easy to work with, and are able to taylor the product to my needs. Highly recommend.</p>
									<span><strong>Dr. Norton Morris</strong> &mdash; CEO, Latio Group Inc.</span>
								</blockquote>
							</li>
							
							<li>
								<blockquote class="testimonial">
									<div class="quote-icon"></div>
									<p>Awesome template! Very intuitive to use, clean coded, and easy to customize. Just rated 5 stars! Will recommend to all our partners and friends!</p>
								<span><strong>David Fernandes</strong> &mdash; Developer</span>
								</blockquote>
							</li>
							
							<li>
								<blockquote class="testimonial">
									<div class="quote-icon"></div>
									<p>Thank you! Hope that we will work together in the future also. The service is definitely worth the price. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
									<span><strong>Melinda Meyers</strong></span>
								</blockquote>
							</li>								
						</ul>
						
					</div>
				</section>
				<!-- end Testimonials -->
				
				<div class="divider-line dotted colored margin-bottom-50px"></div>
				
				<h4 class="margin-bottom-10px">Accordion</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Accordion -->
				<section class="accordion margin-bottom-50px">
				
					<div class="toggle-trigger active"><a href="#"><h5>Project Planning & Management</h5></a></div>
					<div class="toggle-container">
						<div class="content">The key to a successful project is in the planning. Creating a project plan is the first thing you should do when undertaking any kind of project. Our consultants provide world-class facilitation and planning services to help our clients develop and maintain their plans...</div>
					</div>
					
					<div class="toggle-trigger"><a href="#"><h5>Website Development</h5></a></div>
					<div class="toggle-container">
						<div class="content">
							<p class="margin-bottom-5px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu.</p>
							<ul class="square-list tight remove-bottom">
								<li>Dynamic HTML and Flash</li>
								<li>Apps for Mobile / Tablet</li>
								<li>Backend and</li>
								<li>R&amp;D / Prototyping</li>
							</ul>
						</div>
					</div>
					
					<div class="toggle-trigger"><a href="#"><h5>Usability Testing</h5></a></div>
					<div class="toggle-container">
						<div class="content">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu. Sed felis nisl, ultricies vel laoreet nec, fringilla ac dui.</p>
							<img src="<?php echo base_url(); ?>static/images/pic-screenshot.jpg" alt="" class="image-left scale-with-grid adapted">
							<p class="remove-bottom">Aliquam erat volutpat. Aenean varius, mi in malesuada congue, odio arcu placerat dui, non tristique purus tellus quis justo. Donec non eros ipsum, vel suscipit enim. Proin at leo a ligula egestas pellentesque. Maecenas porta pretium quam, et rutrum nunc lobortis id. Integer vel enim mi, sed suscipit neque. Integer at enim cursus massa malesuada tempus. Praesent congue molestie tristique. Nullam tortor leo, tristique ac tempus eget, vestibulum nec ante. Mauris rhoncus aliquet lectus, lobortis fringilla tortor placerat ac. Vestibulum quis dui dui. Nulla ornare neque sit amet magna volutpat cursus sit amet sollicitudin massa. Sed a sapien ac odio fringilla accumsan. Sed blandit dapibus fermentum. Sed nunc arcu, malesuada non hendrerit id, viverra nec tortor. Sed non venenatis erat.</p>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class="toggle-trigger"><a href="#"><h5>SEO Analysis & Web Analytics</h5></a></div>
					<div class="toggle-container">
						<div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu. Aenean nisl orci, condimentum ultrices consequat eu consectetur.</div>
					</div>
					
				</section>
				<!-- end Accordion -->
				
				<h4 class="margin-bottom-10px">Toggle</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Toggle -->
				<section class="toggle margin-bottom-40px">
					
					<div class="toggle-trigger"><a href="#"><h5>Click here to show/hide a small content box</h5></a></div>
					<div class="toggle-container">
						<div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu. Aenean nisl orci, condimentum ultrices consequat eu consectetur. Aenean nisl orci, condimentum ultrices consequat eu consectetur.</div>
					</div>

					<div class="toggle-trigger"><a href="#"><h5>Integer vel enim mi, sed suscipit neque?</h5></a></div>
					<div class="toggle-container">
						<div class="content">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu. Sed felis nisl, ultricies vel laoreet nec, fringilla ac dui.</p>
							<img src="<?php echo base_url(); ?>static/images/pic-screenshot.jpg" alt="" class="image-left scale-with-grid adapted">
							<p class="remove-bottom">Aliquam erat volutpat. Aenean varius, mi in malesuada congue, odio arcu placerat dui, non tristique purus tellus quis justo. Donec non eros ipsum, vel suscipit enim. Proin at leo a ligula egestas pellentesque. Maecenas porta pretium quam, et rutrum nunc lobortis id. Integer vel enim mi, sed suscipit neque. Integer at enim cursus massa malesuada tempus. Praesent congue molestie tristique. Nullam tortor leo, tristique ac tempus eget, vestibulum nec ante. Mauris rhoncus aliquet lectus, lobortis fringilla tortor placerat ac. Vestibulum quis dui dui. Nulla ornare neque sit amet magna volutpat cursus sit amet sollicitudin massa. Sed a sapien ac odio fringilla accumsan. Sed blandit dapibus fermentum. Sed nunc arcu, malesuada non hendrerit id, viverra nec tortor. Sed non venenatis erat.</p>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class="toggle-trigger"><a href="#"><h5>Aliquam lectus ligula</h5></a></div>
					<div class="toggle-container">
						<div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu. Aenean nisl orci, condimentum ultrices consequat eu consectetur.</div>
					</div>
					
				</section>
				<!-- end Toggle -->
				
				<!-- Toggle -->
				<section class="toggle margin-bottom-50px">
					
					<div class="toggle-trigger"><a href="#" class="middle-font-size"><h5>Title text with smaller font size</h5></a></div>
					<div class="toggle-container">
						<div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu. Aenean nisl orci, condimentum ultrices consequat eu consectetur. Aenean nisl orci, condimentum ultrices consequat eu consectetur.</div>
					</div>

					<div class="toggle-trigger"><a href="#"><strong>Aliquam lectus ligula ultrices consequat &mdash; bold style font</strong></a></div>
					<div class="toggle-container">
						<div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu. Aenean nisl orci, condimentum ultrices consequat eu consectetur.</div>
					</div>
					
				</section>
				<!-- end Toggle -->
				
				<h4 class="margin-bottom-10px">Tabs</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Tabs -->
				<ul class="tabs-nav clearfix">
					<li class="active"><a href="#tab1">Overview</a></li>
					<li><a href="#tab2">Dates & Rates</a></li>
					<li><a href="#tab3">Itinerary</a></li>
				</ul>
				
				<div class="tabs-container margin-bottom-50px">
					
					<!-- Tab 1 content -->
					<div id="tab1" class="tab-content">
						<p class="remove-bottom">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam bibendum mauris molestie nisi dignissim mattis. Vestibulum ac massa magna, vitae volutpat lacus nullam nec feugiat ipsum. Quis lobortis leo augue ac erat aenean quis diam nunc. Quisque nisl enim, volutpat vitae fermentum sed, convallis non ante.</p>
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
				
				<h4 class="margin-bottom-10px">Message Boxes</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Message Boxes -->
				<div class="message-box success closable">
					<p><strong>Success!</strong> Some info text...</p>
				</div>
				<div class="message-box error short">
					<p><strong>Error!</strong> Some info text... (short version)</p>
				</div>
				<div class="message-box warning closable">
					<p>This is a warning message.</p>
				</div>
				<div class="message-box info">
					<h5>This is the info message box</h5>
					<p>All types of notification boxes are functionally the same and differ only in their colors. Each type of message box can be closable and has the short alternative.</p>
				</div>
				<!-- end Message Boxes -->
				
				<div class="margin-bottom-50px"></div>
				
				<h4 class="margin-bottom-10px">Client List</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Clients -->
				<ul class="client-list clearfix margin-bottom-50px">
					<li><a href="#"><img src="<?php echo base_url(); ?>static/images/logo1.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?php echo base_url(); ?>static/images/logo2.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?php echo base_url(); ?>static/images/logo3.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?php echo base_url(); ?>static/images/logo4.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?php echo base_url(); ?>static/images/logo5.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?php echo base_url(); ?>static/images/logo6.jpg" alt=""></a></li>
				</ul>
				
				<h4 class="margin-bottom-10px">Buttons & Links</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Buttons -->
				<a href="#" class="button offset-right-20px">Colored Button</a>
				<a href="#" class="button grey">Grey Button</a>
				
				<!-- Link with small arrow -->
				<div class="clear margin-bottom-30px"></div>
				<a href="#" class="link-sm uppercase">Learn more<span></span></a>
				
				<div class="clear margin-bottom-10px"></div>
				<a href="#" class="link-sm">Meet the Team<span></span></a>
				
				<div class="clear margin-bottom-10px"></div>
				<a href="#" class="link-sm">smile-mug.org<span></span></a>
				
				<!-- Link with long arrow -->
				<div class="clear margin-bottom-10px"></div>
				<a href="#" class="link-lg">Go to our offers page<span></span></a>
				
				<div class="clear margin-bottom-40px"></div>
				
				<h4 class="margin-bottom-10px">Pagination</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Pagination -->
				<nav class="pagination clearfix margin-bottom-15px">
					<span class="current">1</span>
					<a href="#" title="Page 2">2</a>
					<a href="#" title="Page 3">3</a>
					<a href="#" title="Page 4">4</a>
					<a href="#" title="Page 5">5</a>
					<a href="#" class="next" title="Next Page"><span></span></a>
					<span class="pages">Page 1 of 12</span>
				</nav>
				
				<!-- Pagination -->
				<nav class="pagination clearfix margin-bottom-50px">
					<a href="#" class="prev" title="Previous Page"><span></span></a>
					<a href="#" title="Page 8">8</a>
					<a href="#" title="Page 9">9</a>
					<a href="#" title="Page 10">10</a>
					<span class="current">11</span>
					<a href="#" title="Page 12">12</a>
					<span class="pages">Page 11 of 12</span>
				</nav>
				
				<h4 class="margin-bottom-10px">Standard Table</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Standard Table -->
				<table class="standard margin-bottom-50px">
					<tr>
						<th>Header 1</th>
						<th>Header 2</th>
						<th>Header 3</th>
						<th>Header 4</th>
					</tr>
					<tr>
						<td>Item #1</td>
						<td>Description</td>
						<td>100 GB</td>
						<td>100 GB</td>
					</tr>
					<tr>
						<td>Item #2</td>
						<td>Description</td>
						<td>200 GB</td>
						<td>200 GB</td>
					</tr>
					<tr>
						<td>Item #3</td>
						<td>Description</td>
						<td>300 GB</td>
						<td>300 GB</td>
					</tr>
					<tr>
						<td>Item #4</td>
						<td>Description</td>
						<td>400 GB</td>
						<td>400 GB</td>
					</tr>
					<tr>
						<td>Item #5</td>
						<td>Description</td>
						<td>500 GB</td>
						<td>500 GB</td>
					</tr>
				</table>
				<!-- end Standard Table -->
				
				<h4 class="margin-bottom-10px">Social Icons</h4>
				<div class="divider-line double colored margin-bottom-40px"></div>
				
				<!-- Social Icons -->
				<ul class="social-icons clearfix remove-bottom">
					<li class="apple"><a href="#">Apple</a></li>
					<li class="behance"><a href="#">Behance</a></li>
					<li class="delicious"><a href="#">Delicious</a></li>
					<li class="deviantart"><a href="#">Deviantart</a></li>
					<li class="digg"><a href="#">Digg</a></li>
					<li class="dribbble"><a href="#">Dribbble</a></li>
					<li class="facebook"><a href="#">Facebook</a></li>
					<li class="flickr"><a href="#">Flickr</a></li>
					<li class="forrst"><a href="#">Forrst</a></li>
					<li class="google"><a href="#">Google</a></li>
					<li class="google-plus"><a href="#">Google-plus</a></li>
					<li class="lastfm"><a href="#">Lastfm</a></li>
					<li class="linkedin"><a href="#">LinkedIn</a></li>
					<li class="myspace"><a href="#">Myspace</a></li>
					<li class="picasa"><a href="#">Picasa</a></li>
					<li class="pinterest"><a href="#">Pinterest</a></li>
					<li class="rss"><a href="#">Rss</a></li>
					<li class="skype"><a href="#">Skype</a></li>
					<li class="stumbleupon"><a href="#">Stumbleupon</a></li>
					<li class="tumblr"><a href="#">Tumblr</a></li>
					<li class="twitter"><a href="#">Twitter</a></li>
					<li class="vimeo"><a href="#">Vimeo</a></li>
					<li class="yahoo"><a href="#">Yahoo</a></li>
					<li class="youtube"><a href="#">Youtube</a></li>
				</ul>
				<!-- end Social Icons -->
				
			</div> <!-- end twelve columns -->
		
		</section> <!-- end inner grid -->
	
	</div>
	<!-- end Page Content -->
	
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

</body>
</html>
