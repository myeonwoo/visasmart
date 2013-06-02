
<section id="main" class="container"> <!-- 1152 pixels Container -->
	<!-- Page Title -->
	<div class="sixteen columns">
		<div class="page-title">
			<h3></h3>
		</div>
	</div>

	<!-- Page Content -->
	<div class="twelve columns" id="pContent">

		<section id="page-content" class="clearfix"> <!-- inner grid 720 pixels wide -->
			<textarea id="board_content" name="content" style="width:710px;height:500px;"><?php echo $content; ?></textarea>
			<br />

			<form id="fileupload" name="fileupload" enctype="multipart/form-data" method="post">
				<fieldset>
					<input type="file" name="fileselect" id="fileselect" class="btn" ></input>
					<input id="uploadbutton" class="btn btn-success image-upload" type="button" value="Image Upload"/>
				</fieldset>
			</form>

			<div class="clear"> </div>
			<div class="align-c">
				<div class="btn btn-warning" id="update_content" > 작성 </div>
			</div>
		</section>

	</div>
</section>


<script src="<?php echo base_url(); ?>static/js/editor/HuskyEZCreator.js" type="text/javascript"></script>
<script type='text/javascript'>
function htmlEncode(value){
  //create a in-memory div, set it's inner text(which jQuery automatically encodes)
  //then grab the encoded contents back out.  The div never exists on the page.
  return $('<div/>').text(value).html();
}

function htmlDecode(value){
  return $('<div/>').html(value).text();
}
	var oEditors = [];
	var file;
	var aid = <?php echo "$id;";?>;

	$(function() {
		var url = local_site.site_url;
		url = url.split('index.php')[0] + 'static/js/editor/SmartEditor2Skin.html';
		console.log(url);

		nhn.husky.EZCreator.createInIFrame({
			oAppRef: oEditors,
			elPlaceHolder: "board_content",
			sSkinURI: url, //sSkinURI: "http://www.adlatte.com/admin3/editor/SmartEditor2Skin.html",
			fCreator: "createSEditor2"
		});
		console.log(oEditors);
		//oEditors.getById["board_content"].exec("PASTE_HTML", ['sHTML']);

		$('#update_content').click(function()
		{
			// 수정한 글 옮기기
			oEditors.getById["board_content"].exec("UPDATE_CONTENTS_FIELD", []);

			var url = local_site.site_url + 'api/article/set_content/format/json';
			var data = {};
			//data['id'] = aid;
			//data['type'] = 1; // notice
			//data['title'] = 'test'; // notice
			var content = $('#board_content').val();
			//console.log(content);
			//content = encodeURI(content);
			//data['content'] = content;
			//content = '<p><b>Hello there.</b></p><p><b><span style="color: rgb(255, 108, 0);">dfdfd</span></b></p>';

			console.log(content);
			content = htmlEncode(content);

			// <p><b>Hello there.</b></p><p><b><span rgb(255, 108, 0);">dfdfd</span></b></p>
			console.log(content);

			data = {id:aid, content:content};

			$.ajax({
				type: "POST",
				dataType: "json",
				data:data,
				url: url, 
				success: function(content){
					console.log(content);
					console.log(content['content']);

					/**
					 **	TODO: reload url
					**/

					return;
				},
				error: function(){
					console.log('error');
					return;
				}
			});


		});

		// Set an event listener on the Choose File field.
	    $('#fileselect').bind("change", function(e) {
			var files = e.target.files || e.dataTransfer.files;
			// Our file var now holds the selected file
			file = files[0];
	    });

		$('#uploadbutton').click(function() {
			var serverUrl = local_site.site_url + 'api/file/upload/filename/format/json';
			console.log(serverUrl);
			console.log(file);

			data = {'id':'test','dfd':'fdf'};
			$.ajax({
				type: "POST",
				dataType: 'json',
				beforeSend: function(request) {
					request.setRequestHeader("X-Parse-Application-Id", 'MY-APP-ID');
					request.setRequestHeader("X-Parse-REST-API-Key", 'MY-REST-API-ID');
					request.setRequestHeader("Content-Type", file.type);
				},
				url: serverUrl,
				data:file,
				processData: false,
				contentType: false,
				success: function(content){
					console.log('success');
					console.log(content);
					return;
				},
				error: function(){
					console.log('error');
					return;
				}
			});

		});
	});
</script>