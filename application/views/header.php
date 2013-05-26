<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Tectonic | Business Site Template</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/base.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/grid.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/layout.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/colors/brown.css" id="color-scheme">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Open+Sans:400,700,400italic|Open+Sans+Condensed:300">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/prettyPhoto.default.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/carousel.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/switcher.css"> <!-- Style Switcher -->
	
	<script src="<?php echo base_url(); ?>static/js/jquery.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'static/js/site.js' ?>"></script>

	<!-- Java Script -->
	<script>document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/g, 'js');</script>
	<!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
	
</head>

<body class="body-bg-image1 image-background">
<div id="page-wrapper">


<!-- START HEADER -->

<header id="header">
	
	<div class="container"> <!-- 1152 pixels Container -->
	
		<div class="sixteen columns">
			
			<!-- Logo -->
			<div id="logo">
				<a href="#"><img src="<?php echo base_url(); ?>static/common/images/logo.gif" alt="logo"></a>
			</div>
	
			<!-- Navigation -->
			<nav id="navigation">

				<div id="primary-nav">
					
					<ul id="main-menu">

						<li>
							<a href="<?php echo site_url("home"); ?>" class="current">Home</a>
							<ul>
								<li><a href="<?php echo site_url("home/aboutus"); ?>">About Us</a></li>
								<li><a href="<?php echo site_url("home"); ?>">Home Page 2</a></li>
							</ul>
						</li>
						
						<li><a href="<?php echo site_url("usa/first"); ?>">미국비자</a>
							<ul>
								<li><a href="<?php echo site_url("usa/first"); ?>">유학|문화 교류</a>
									<ul>
										<li><a href="<?php echo site_url("usa/first"); ?>">미국비자 숙지사항</a></li>
										<li><a href="<?php echo site_url("home"); ?>">미국비자 준비사항</a></li>
										<li><a href="<?php echo site_url("home"); ?>">미국비자 성공전략</a></li>
									</ul>
								</li>
							</ul>
						</li>

						<li><a href="<?php echo site_url("home"); ?>">캐나다비자</a>
							<ul>
								<li><a href="<?php echo site_url("home"); ?>">유학허가</a>
									<ul>
										<li><a href="<?php echo site_url("home"); ?>">유학허가 숙지사항</a></li>
										<li><a href="<?php echo site_url("home"); ?>">학생비자 준비서류</a></li>
										<li><a href="<?php echo site_url("home"); ?>">캐나다비자 성공전략</a></li>
									</ul>
								</li>
								<li><a href="<?php echo site_url("home"); ?>">취업허가</a>
									<ul>
										<li><a href="<?php echo site_url("home"); ?>">취업허가 숙지사항</a></li>
										<li><a href="<?php echo site_url("home"); ?>">취업비자 준비서류</a></li>
									</ul>
								</li>
								<li><a href="<?php echo site_url("home"); ?>">방문/동반(TRV)</a>
									<ul>
										<li><a href="<?php echo site_url("home"); ?>">방문/동반 숙지사항</a></li>
										<li><a href="<?php echo site_url("home"); ?>">방문/동반 준비서류</a></li>
									</ul>
								</li>
							</ul>
						</li>

						<li><a href="<?php echo site_url("home"); ?>">유학후 이민정보</a>
							<ul>
								<li><a href="<?php echo site_url("home"); ?>">학생비자 > 영주권</a>
									<ul>
										<li><a href="<?php echo site_url("home"); ?>">CEC[캐나다경험자이민]</a></li>
										<li><a href="<?php echo site_url("home"); ?>">MPNP[마니토바]</a></li>
										<li><a href="<?php echo site_url("home"); ?>">SINP[사스카츄완]</a></li>
										<li><a href="<?php echo site_url("home"); ?>">NSNP[노바스코샤]</a></li>
										<li><a href="<?php echo site_url("home"); ?>">인기전공 > 취업전망</a></li>
									</ul>
								</li>
								<li><a href="<?php echo site_url("home"); ?>">캐나다 컬리지</a>
									<ul>
										<li><a href="<?php echo site_url("home"); ?>">사설학원 조건부입학</a></li>
										<li><a href="<?php echo site_url("home"); ?>">Ontario</a></li>
										<li><a href="<?php echo site_url("home"); ?>">British Columbia</a></li>
										<li><a href="<?php echo site_url("home"); ?>">Alberta</a></li>
										<li><a href="<?php echo site_url("home"); ?>">Other Regions</a></li>
									</ul>
								</li>
							</ul>
						</li>
						
						<li><a href="<?php echo site_url("home"); ?>">비자스마트</a>
							<ul>
								<li><a href="<?php echo site_url("home"); ?>">수속안내</a>
									<ul>
										<li><a href="<?php echo site_url("home"); ?>">회사소개</a></li>
										<li><a href="<?php echo site_url("home"); ?>">수속비용</a></li>
										<li><a href="<?php echo site_url("home"); ?>">회사 약도</a></li>
									</ul>
								</li>
								<li><a href="<?php echo site_url("home"); ?>">Q&A | FAQs</a>
									<ul>
										<li><a href="<?php echo site_url("home"); ?>">Q&A | 공지사항</a></li>
										<li><a href="<?php echo site_url("home"); ?>">FAQs | 유용정보</a></li>
										<li><a href="<?php echo site_url("home"); ?>">영문서류 샘플보기</a></li>
										<li><a href="<?php echo site_url("home"); ?>">출국안내|짐꾸리기</a></li>
									</ul>
								</li>
							</ul>
						</li>
						
						<li><a href="contact.html">Contact</a>
							<ul>
								<li><a href="<?php echo site_url("home"); ?>">Defaul Layout</a></li>
								<li><a href="<?php echo site_url("home"); ?>">Alternative Layout</a></li>
							</ul>
						</li>

					</ul>

				</div>
				
			</nav>
			
		</div>
		
	</div>
	
</header>

<!-- END HEADER -->