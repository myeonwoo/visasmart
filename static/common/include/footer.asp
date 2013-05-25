<script language="JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/common/js/jquery.rightClick.js"></script> -->
<script type="text/javascript">
$(document).ready(function(){
	if(typeof(rightClick)!='string'){
		document.oncontextmenu=new Function('return false');   // 우클릭 방지
		document.ondragstart=new Function('return false');     // 드래그 방지
		document.onselectstart=new Function('return false');   // 선택방지
	}
});
</script>

			  <ul class="footer_area">
					<li class="foot_left"><img src="/common/images/foot_img01.gif" alt="gnb" border="0" usemap="#Map" class="block" />
                    <map name="Map" id="Map">
                    <area shape="rect" onfocus="blur()" coords="924,2,1000,29" href="http://www.visasmart.co.kr/visa/map.asp" />
					<area shape="rect" onfocus="blur()" coords="867,2,925,29" href="http://www.visasmart.co.kr/visa/about.asp" />
                    </map>
					</li>
			        </ul>
	                  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                         <td width="603" height="80" align="left"><img src="/common/images/foot_img04.gif" /></td>
                         <td height="50" align="right"><a href="http://www.ftc.go.kr/ftcinfo/ftcinfo/logo.jsp" target="_blank"><img src="/common/images/foot_img05.gif" border="0" /></a></td>
                        </tr>
                     </table>