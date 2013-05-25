<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>애드라떼 관리자 페이지</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- jquery load -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
    <script src="/admin3/js/jquery-ui-timepicker-addon.js"></script>

    <!-- Le styles -->
    <link href="/admin3/css/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
    <link href="/admin3/css/bootstrap.css" rel="stylesheet"/>
    <link href="/admin3/css/bootstrap-responsive.css" rel="stylesheet"/>

</head>
<body>

<div class="container">
	<div class="row">
		<ul class="breadcrumb">
			<li><a href="board_list.php">게시판 관리</a> <span class="divider">/</span></li>
			<li><a href="#">글쓰기</a></li>
		</ul>
		<form class="board-form" action="board_write.php" method="post">
			<table class="table table-bordered">
				<colgroup>
					<col style="width:13%;"/>
					<col style="width:40%;"/>
					<col style="width:13%;"/>
					<col style="width:34%;"/>
				</colgroup>
				<tbody>
					<tr>
						<th>App</th>
						<td colspan="3">
							<select class="margin-b0" name="app">
								<option value="1" selected>애드라떼</option>
								<option value="2" >라떼스크린</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Type</th>
						<td colspan="3">
							<select class="margin-b0" name="type">
								<option value="notice" selected>공지사항</option>
								<option value="event" >이벤트</option>
								<option value="faq" >자주묻는질문</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Title</th>
						<td colspan="4"><input type="text" class="margin-b0" placeholder="제목" name="title" value="깨끗한 애드라떼를 위하여" style="width:700px;"/></td>
					</tr>
					<tr>
						<th>View</th>
						<td colspan="3">
							<select class="margin-b0" name="valid">
								<option value="0" >비공개</option>
								<option value="1" selected>공개</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Notice View Time</th>
						<td>
							<input type="text" class="datetime margin-b0" name="urgent_sdate" value="0000-00-00 00:00:00" /> ~ <input type="text" class="datetime margin-b0" name="urgent_edate" value="0000-00-00 00:00:00" />
							<br/><span class="text-warning">※ 설정 하면 광고리스트에 노출<span>
						</td>
						<th>
							description<br/>
							<span class="text-warning">※ 공지팝업 설명<br/> ex) 3줄 이하</span>
						</th>
						<td>
							</strong><textarea class="margin-b0" name="description" style="width:370px;height:50px;"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<textarea id="board_content" name="contents" style="width:1180px;height:500px;"><P>안녕하세요<BR>애드라떼 입니다<BR>저희 애드라떼는 현재 수많은 회원님들의 사랑과 관심을 받아 쑥쑥 자라나고 있습니다<BR>회원님들의 넘치는 사랑에 감사드립니다<BR><BR><BR>이번에 이렇게 찾아 뵙게 된 것은 몇 가지 공지사항을 알려드리기 위해서 입니다<BR><BR>공지사항에 올라가 있는 사항이지만, 저희의 서비스를 이용하시느라 미처 이를 확인하지 못하신 회원 분들이 계신 것 같아 이렇게 인사 드리게 되었습니다<BR><BR>? <STRONG>타 어플 홍보</STRONG><BR><BR>현재, 문자함과 댓글란을 이용하여 타 유사어플 홍보를 폭탄처럼 투하해주시는 회원분들이 있습니다. 시스템 상으로 금지어를 선정하였으나, 놀라운 창의성을 발휘하여 요리조리 피해가시는 분들이 있습니다. 창의성은 정말 놀랍지만, 그로 인해 다른 회원분들께서 불편을 호소하고 계시며, 광고주분들 역시 불편을 호소하고 계십니다. <BR><BR>그렇기 때문에<BR>현재 규정상 1차 적발 시는 경고조치를 취하고 있으나, 모든 분들이 쾌적하게 이용하실 수 있는애드라떼를 위하여 앞으로는 1차 적발 시 바로 계정 삭제 조치를 취하도록 하겠습니다<BR><BR>? <STRONG>부정 추천 회원 모집</STRONG><BR><BR>저희 애드라떼는 회원분들께서 저희를 알려주시고 추천을 받으실 경우, 이벤트 기간동안 추천 적립금을 쌓아드리고 있습니다.<BR>이 추천 제도를 매우 많은 회원분들께서 이용해주셨고, 저희 애드라떼를 알려주시기 위해 노력해주신 점 정말 감사 드립니다.<BR>그러나, 이 제도의 취지를 잘못 이해하신 몇몇 회원 분들이 계셔서 그에 대한 공지를 하고자 합니다<BR></P><P>한 기기(휴대폰, 태블릿 등)을 이용하여 친구 번호, 가족 번호, 친척 번호, 지인 번호, 사돈의 팔촌번호, 모르는 사람 번호를 이용하여 여러 번 회원 가입을 하면서 자신의 아이디를 추천하는 회원 분들이 간혹 계십니다.<BR>이러한 것은 정상적인 회원 가입으로 볼 수 없기 때문에 그러한 회원 분들을 적발하고 있습니다. 이런 가입의 경우, 대다수 정상적인 회원분들에게 피해가 돌아가게 됩니다. 이런 허위 가입을 절대 하지 말아주시기 바라며, 적발 시 이 역시도 계정 삭제(적립금 회수 포함)&nbsp;조치를 취하도록 하겠습니다.<BR><BR>? <STRONG>운영자 사칭</STRONG><BR><BR>가끔 애드라떼 운영자로 사칭하는 회원분들이 있습니다. 애드라떼의 공식 운영자는 한 개의 아이디만 존재하며, 금품, 맞추 등을 요구하지 않습니다. 더욱이 ㅇ ㅐ ㅈ ㅡ ㄹ , ㅇ ㅐ ㄷ ㅡ ㅁ ㅗ ㅂ ㅣ 등 타 유사 어플의 추천을 부탁 드리지도 않습니다. 이 점 유의하셔서 속지 않으시길 바라며, 혹시나 애드라떼에 대한 사랑이 넘쳐서 운영자를 하고 싶으신 분들은 조용히 입사지원을 해주시기 바랍니다. <BR><BR><BR>앞으로도 많은 사랑과 관심 부탁 드리며, 저희도 더욱 발전하는 모습을 보여드리도록 하겠습니다<BR>다음 번에는 좋은 소식으로 찾아 뵙도록 하겠습니다<BR>감사합니다람쥐<BR><BR>애드라떼 올림<BR><BR>[애드라떼는 이용자와 광고주의 소통을 지향하며, 상호간의 권익을 존중하는 서비스입니다. 공지사항에 정확히 명시되지 않았더라도, 당연히 기본적으로 지켜야 하는 상호존중, 기본도덕, 예의를 지켜주시기 바랍니다]<BR><BR>2012년 3월 16일<BR></P></textarea>
							<button class="btn btn-success image-upload">Image Upload</button>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="align-c">
				<input type="hidden" name="nid" value="1033" />
				<input type="hidden" name="old_type" value="notice" />
				<input class="btn btn-warning" type="submit" value="작성"/>
				<input class="btn fomr-cancel" type="button" value="취소"/>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" src="./editor/js/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript">
<!--
$(function(){
	
	var oEditors = [];
	nhn.husky.EZCreator.createInIFrame({
		oAppRef: oEditors,
		elPlaceHolder: "board_content",
		sSkinURI: "http://localhost/kr_pjt_adlatte_cs/cms/static/editor/SmartEditor2Skin.html",
		fCreator: "createSEditor2"
	});

	console.log(oEditors);

});


//-->
</script>
</body>
</html>