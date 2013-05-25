		<% if gubun="1" and board_use = "" then %> 
    <ul class="Tab_Area c_box">
    	<li><a href="qna.asp?gubun=1" onfocus="blur()"><img src="/common/images/visa/visa_tab01_00_on.gif" alt="전체" name="Faq_tab_img1" class="block" id="Faq_tab_img1" /></a></li>
			<li><a href="qna.asp?gubun=1&board_use=1" onfocus="blur()"><img src="/common/images/visa/visa_tab01_01_a.gif" class="block" alt="Q &amp; A" id="Faq_tab_img2"/></a></li>
			<li><a href="qna.asp?gubun=1&board_use=2" onfocus="blur()"><img src="/common/images/visa/visa_tab01_02.gif" class="block" alt="비자후기" id="Faq_tab_img3"/></a></li>
		</ul>
	  <% elseif gubun="1" and board_use = "1" then %> 
    <ul class="Tab_Area c_box">
    	<li><a href="qna.asp?gubun=1" onfocus="blur()"><img src="/common/images/visa/visa_tab01_00.gif" alt="전체" name="Faq_tab_img1" class="block" id="Faq_tab_img1" /></a></li>
			<li><a href="qna.asp?gubun=1&board_use=1" onfocus="blur()"><img src="/common/images/visa/visa_tab01_01_on.gif" class="block" alt="Q &amp; A" id="Faq_tab_img2"/></a></li>
			<li><a href="qna.asp?gubun=1&board_use=2" onfocus="blur()"><img src="/common/images/visa/visa_tab01_02.gif" class="block" alt="비자후기" id="Faq_tab_img3" /></a></li>
		</ul>
    <% elseif gubun="1" and board_use = "2" then %>
    <ul class="Tab_Area c_box">
    	<li><a href="qna.asp?gubun=1" onfocus="blur()"><img src="/common/images/visa/visa_tab01_00_a.gif" alt="전체" name="Faq_tab_img1" class="block" id="Faq_tab_img1" /></a></li>			
			<li><a href="qna.asp?gubun=1&board_use=1" onfocus="blur()"><img src="/common/images/visa/visa_tab01_01.gif" class="block" alt="Q &amp; A"  id="Faq_tab_img2"/></a></li>
			<li><a href="qna.asp?gubun=1&board_use=2" onfocus="blur()"><img src="/common/images/visa/visa_tab01_02_on.gif" class="block" alt="비자후기"  id="Faq_tab_img3"/></a></li>
		</ul>
		<% elseif gubun="2" and board_use = "" then %>
    <ul class="Tab_Area c_box">
			<li><a href="faq.asp?gubun=2" onfocus="blur()"><img src="/common/images/visa/visa_tab02_01_on.gif" class="block" alt="전체" id="Faq_tab_img1" /></a></li>
			<li><a href="faq.asp?gubun=2&board_use=1" onfocus="blur()"><img src="/common/images/visa/visa_tab02_02_a.gif" class="block" alt="FAQs" id="Faq_tab_img2" /></a></li>
			<li><a href="faq.asp?gubun=2&board_use=2" onfocus="blur()"><img src="/common/images/visa/visa_tab02_03.gif" class="block" alt="유용한정보" id="Faq_tab_img3" /></a></li>
		</ul>
		<% elseif gubun="2" and board_use = "1" then %>
    <ul class="Tab_Area c_box">
			<li><a href="faq.asp?gubun=2" onfocus="blur()"><img src="/common/images/visa/visa_tab02_01.gif" class="block" alt="전체" id="Faq_tab_img1" /></a></li>
			<li><a href="faq.asp?gubun=2&board_use=1" onfocus="blur()"><img src="/common/images/visa/visa_tab02_02_on.gif" class="block" alt="FAQs" id="Faq_tab_img2" /></a></li>
			<li><a href="faq.asp?gubun=2&board_use=2" onfocus="blur()"><img src="/common/images/visa/visa_tab02_03.gif" class="block" alt="유용한정보" id="Faq_tab_img3" /></a></li>
		</ul>
		<% elseif gubun="2" and board_use = "2" then %>
    <ul class="Tab_Area c_box">
			<li><a href="faq.asp?gubun=2" onfocus="blur()"><img src="/common/images/visa/visa_tab02_01_a.gif" class="block" alt="전체" id="Faq_tab_img1" /></a></li>
			<li><a href="faq.asp?gubun=2&board_use=1" onfocus="blur()"><img src="/common/images/visa/visa_tab02_02.gif" class="block" alt="FAQs" id="Faq_tab_img2" /></a></li>
			<li><a href="faq.asp?gubun=2&board_use=2" onfocus="blur()"><img src="/common/images/visa/visa_tab02_03_on.gif" class="block" alt="유용한정보" id="Faq_tab_img3" /></a></li>
		</ul>
		<% elseif gubun="4" then %>
    <ul class="Tab_Area c_box">
			<li><a href="#" onfocus="blur()"><img src="/common/images/visa/visa_tab03_01_on.gif" class="block" alt="출국안내" id="leave_tab_img1" /></a></li>
			<!--<li><a href="javascript:leave_tab(2);" onfocus="blur()"><img src="/common/images/visa/visa_tab03_02.gif" class="block" alt="짐꾸리기" id="leave_tab_img2" /></a></li>-->
		</ul>
    <% end if %>	  
