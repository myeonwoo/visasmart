
<!-- START CONTENT -->

<section id='main' class='container'> <!-- 1152 pixels Container -->
	<!-- Page Title -->
	<div class='sixteen columns'>
		<div class='page-title'>
			<h3></h3>
		</div>
	</div>

	<!-- Info Board -->
	<!-- data-smallscreen: "yes" or "no" - whether to show a block on a small-screen mobile device or not -->
	<!-- five-item-menu - corresponds to the number of items in the secondary menu -->
	<div class="four columns three-item-menu" id="iBoard" data-smallscreen="yes">
		<!-- Secondary Menu -->
		<div class="menu shadow" data-smallscreen="yes">
			<ul id="secondary-menu">
				<li class="current"><a href="<?php echo site_url("usa/article/view/id/1"); ?>"><h6 class="title">미국 유학|문화 교류</h6></a></li>
				<li><a href="<?php echo site_url("usa/article/view/id/1"); ?>"><h6 class="title">숙지사항</h6></a></li>
				<li><a href="<?php echo site_url("usa/article/view/id/1"); ?>"><h6 class="title">준비사항</h6></a></li>
				<li><a href="<?php echo site_url("usa/article/view/id/1"); ?>"><h6 class="title">성공전략</h6></a></li>
			</ul>
		</div>
	</div>


	
	<!-- Page Content -->
	<div class='twelve columns' id='pContent'>
	
		<section id='page-content' class='clearfix'> <!-- inner grid 720 pixels wide -->
		
			<div class='twelve columns margin-bottom-10px'>
			</div> <!-- end twelve columns -->

			<div class="clear"></div>
			
			<!-- article 내용 -->
			<?php echo htmlspecialchars_decode($content); ?>

		</section> <!-- end inner grid -->
	
	</div>
	<!-- end Page Content -->
	
	<!-- Sidebar -->
	<div class="four columns" id="sBar">
		
		<aside id="sidebar">
						
			<!-- Testimonials Carousel -->
			<div class="widget" data-smallscreen="yes"> <!-- show widget on a small-screen mobile device: "yes" or "no" -->
				<h5>고객이 남긴 글</h5>
				<section class="carousel-container testimonials-holder">
					<div class="carousel-frame">
						<ul class="testimonials-carousel clearfix">
							<li>
								<blockquote class="testimonial">
									<div class="quote-icon"></div>
									<p>유용한 유학 정보를 많은 도움되었습니다.</p>
									<span><strong>임면우</strong>, Appdisco</span>
								</blockquote>
							</li>
							<li>
								<blockquote class="testimonial">
									<div class="quote-icon"></div>
									<p>I am very pleased and excited about this provider so far. They are easy to work with, and are able to taylor the product to my needs. Highly recommend.</p>
									<span><strong>Dr. Morris</strong>, Latio Group</span>
								</blockquote>
							</li>
							<li>
								<blockquote class="testimonial">
									<div class="quote-icon"></div>
									<p>Awesome theme! Very intuitive to use, clean coded, and easy to customize. Just rated 5 stars! Will recommend to all our partners and friends!</p>
									<span><strong>David Fernandes</strong>, Developer</span>
								</blockquote>
							</li>
							<li>
								<blockquote class="testimonial">
									<div class="quote-icon"></div>
									<p>Thank you! Hope that we will work together in the future also. The service is definitely worth the price.</p>
									<span><strong>Melinda Meyers</strong></span>
								</blockquote>
							</li>
						</ul>
					</div>
				</section>
			</div>
			<!-- end Testimonials Carousel -->

			<!-- 연락처 & 은행계좌 정보 -->
			<div class="widget" data-smallscreen="yes"> <!-- show widget on a small-screen mobile device: "yes" or "no" -->
				<h5>Contact Info</h5>
				<div class="flickr-widget clearfix">
					
					<img class="" style="width:100%;" src="<?php echo base_url(); ?>static/common/images/lnb/Lnb_Banner01.gif" alt="">
					<img class="" style="width:100%;" src="<?php echo base_url(); ?>static/common/images/lnb/Lnb_Banner02.gif" alt="">
				</div>
				<div class="clear"></div> <!-- IE7 margin-bottom fix -->
			</div>
			
		</aside>
		
	</div>
	<!-- end Sidebar -->
	
	
	<div class='clear'></div>
	
</section>

<!-- END CONTENT -->
