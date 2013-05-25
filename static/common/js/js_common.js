var NS4;
var IE4;
if (document.all)
{
    IE4 = true;
    NS4 = false;
}
else
{
    IE4 = false;
    NS4 = true;
}
isWin = (navigator.appVersion.indexOf("Win") != -1)

var telRegEx = /^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}/i; //일반전화 정규식
var hpRegEx = /^[0-9]{3}-[0-9]{3,4}-[0-9]{4}/i;	//핸드폰

function onlyNumber() //숫자 유효성 검사
{	
  if((event.keyCode<48)||(event.keyCode>57))
  event.returnValue=false ;
}

function js_RegnoValid(Regno) //주민번호 유효성 검사
{
	a = new Array(13);

	for (var i=0; i < 13; i++) 
	{ a[i] = parseInt(Regno.charAt(i));}

   var j = a[0]*2 + a[1]*3 + a[2]*4 + a[3]*5 + a[4]*6 + a[5]*7 + a[6]*8 + a[7]*9 + a[8]*2 + a[9]*3 + a[10]*4 + a[11]*5;
   var j = j % 11;
   var k = 11 - j;

   if (k > 9) { k = k % 10 }
   if (k != a[12])
	   return false
   else 
	   return true;
}


//공백제거
/*function Trim(string) {
    for(;string.indexOf(" ")!= -1;){
        string=string.replace(" ","")
    }
    return string;
}*/
String.prototype.trim = function(){return this.replace(" ","");}

function strCheck(checkStr) { //특수문자 체크
	var TEXT = "-_~!@#$%^&*()+|\=`,.><?/＃＆＊＠§※☆★ㅁ○●ㅋ◎◇◆□■△▲▽▼→←↑↓↔〓◁◀▷▣♤♠♡♥♧♣⊙◈▣◐◑▒▤▥▨▦▩♨☏☎☜☞";
	for (i = 0;  i < checkStr.length;  i++)
	{
		ch = checkStr.charAt(i);
		for (j = 0;  j < TEXT.length;  j++) {
			if (ch == TEXT.charAt(j)) {
				return (false);
				break;
			}
		}
	}
	return (true);
}


/*function post(chk){ //우편번호창
	var url = "/mypage/findzip.asp?chk="+chk;
	window.open(url,"postsearch","width=403,height=250,scrollbars=yes");	
}*/

function findPost(obj){ //우편번호창
	 oWnd = centOpenWin('../services/p_post.php?obj='+obj,'FND_POST','scrollbars=no' ,390, 450);
     oWnd.focus();
}

function isEmail(s) {
	return s.search(/^\s*[\w\~\-\.]+\@[\w\~\-]+(\.[\w\~\-]+)+\s*$/g)>=0;
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}


function centOpenWin(url,name,features ,width, height){ //팝업 센터로 띄우기
	if (IE4 && width < window.screen.width && height < window.screen.height) 
    {
        var windowX = Math.ceil( (window.screen.width  - width) / 2 );
        var windowY = Math.ceil( (window.screen.height - height) / 2 );
        oWnd = window.open(url, name, "width="+width+",height="+height+","+features+",left="+windowX+",top="+windowY);
    }
    else 
    {
        oWnd = window.open(url, name, "width="+width+",height="+height+","+features);
    }
  return oWnd	
}
  

function ResizeParentFrame(name)	// 자신의 내용에 맞게 부모의 iframe 사이즈 크기 조절
{
	if (parent.document.all(name)) {
		var frmSelf  = parent.document.all(name);
		var frmBody  = document.body;
		var frmBodyHeight = frmBody.scrollHeight;
		if (frmBodyHeight <= 0) 
		{
			location.reload();
		}else{ 
		   if(name=='ifrmComment') //댓글
		   {
			 frmSelf.style.height = frmBodyHeight+40;
		   }else{
			frmSelf.style.height = frmBodyHeight+20;
		   }
		   
		}
		
	}
}

function ResizeParentWidthFrame(name)	// 자신의 내용에 맞게 부모의 iframe Width 크기 조절
{
	if (parent.document.all(name)) {
		var frmSelf  = parent.document.all(name);
		var frmBody  = document.body;
		var frmBodyWidth = frmBody.scrollWidth;
		
		
		if (frmBodyWidth <= 0)
			location.reload();
		else
			frmSelf.style.width = frmBodyWidth - 31;
	}
}


function zzimPgm(no,cd,dbjob) //프로그램 찜하기
{
  if(dbjob=='d'){
	var msg = confirm('삭제하시겠습니까?');
	if(!msg)return;
  }
  document.frames['ifrmZzimPgm'].location.href = '/common/iframe/ifrm_zzim_program.asp?pgm_no='+no+'&pgm_cd='+cd+'&dbjob='+dbjob; 	
}

function rebroadcastPgm(no) //프로그램 재방요청
{
  document.frames['ifrmRebroadcastPgm'].location.href = '/common/iframe/ifrm_rebroadcast_program.asp?pgm_no='+no; 	
}

function loginMsg()
{
  alert('로그인 해주세요');
  return;
}


function repeat_check(str, num)
{ 
	var cnt = str.length; 
	var repeat = ""; 
	var R=1;
	 
	for(var i=0; i<cnt; i++) { 
	  tmp = str.substr(i, 1); 
	  key = tmp; 
	  if(key == repeat) { R++; } 
	  else { R=1; repeat = key; } 
	  if(R >= num) { return repeat; } 
	} 
	return ""; 
}

function sequence_check(str, num)
{
	var cnt = str.length; 
	var repeat = 0; 
	var R=1;
	 
	for(var i=0; i<cnt; i++) { 
	  asc = str.charCodeAt(i);
	  key = asc; 
	  if(key == repeat + 1) { R++; repeat = key; } 
	  else { R=1; repeat = key; }
	  if(R >= num) { return repeat; } 
	} 
	return 0;
}

//참조함수(컴마불가)
function commaSplitAndNumberOnly(str) {	
	var txtNumber = '' + str;
	if (isNaN(txtNumber) || txtNumber.indexOf('.') != -1 ) {
		str = str.substring(0, str.length-1 );
		str = commaSplitAndNumberOnly(ob);
		ob.focus();
		return str;
	}else {
		var rxSplit = new RegExp('([0-9])([0-9][0-9][0-9][,.])');
		var arrNumber = txtNumber.split('.');
		arrNumber[0] += '.';
		do {
			arrNumber[0] = arrNumber[0].replace(rxSplit, '$1,$2');
		}
		while (rxSplit.test(arrNumber[0]));
		
		if (arrNumber.length > 1) {
			return arrNumber.join('');
		}
		else {
			return arrNumber[0].split('.')[0];
		}
   }
}

String.prototype.comma = function() {
    tmp = this.split('.');
    var str = new Array();
    var v = tmp[0].replace(/,/gi,'');
    for(var i=0; i<=v.length; i++) {
        str[str.length] = v.charAt(v.length-i);
        if(i%3==0 && i!=0 && i!=v.length) {
            str[str.length] = '.';
        }
    }
    str = str.reverse().join('').replace(/\./gi,',');
    return (tmp.length==2) ? str + '.' + tmp[1] : str;
}

function onlyNum(obj) {
    var val = obj.value;
    var re = /[^0-9\.\,\-]/gi;
    obj.value = val.replace(re, '');
}


 /*function KeyEventHandle()
 {
	if(
	(event.ctrlKey == true && ( event.keyCode == 78 || event.keyCode == 82 ) ) ||
	(event.keyCode >= 112 && event.keyCode <= 123 ))
	{
		event.keyCode                = 0;
		event.cancelBubble        = true;
		event.returnValue        = false;
	}
}
        document.onkeydown=KeyEventHandle;
        document.onkeyup=KeyEventHandle;
*/
/*
oncontextmenu='return false'
ondragstart = 'return false'
onselectstart = 'return false'
*/

function vwimgrzmv(obj,imgsrc) {
	var rz = 0;
	var scrl = 0;
	var rzwidth = obj.width + 5;
	var rzheight = obj.height + 25;
	var mvleft = (window.screen.width - obj.width) / 2;
	var mvtop = (window.screen.height - obj.height - 25) / 2;
	var imgwin = null;
	var ie = navigator.appName.indexOf('Microsoft Internet Explorer')>-1 ? true : false;

	if(obj.height>window.screen.height) {
		rz = 0;
		scrl = 1;
		rzwidth = obj.width + 23;
		rzheight = window.screen.height - 30;
		mvtop = 0;
	}

	if(obj.width>window.screen.width) {
		rz = 0;
		scrl = 1;
		rzwidth = window.screen.width;
		mvleft = 0;
	}

	if(!imgsrc) imgsrc = obj.src;

	imgwin = window.open('','_blank','toolbar=0,menubar=0,status=1,scrollbars=' + scrl + ',resizable=' + rz + ',width=0,height=0,left=' + ((window.screen.availWidth-245)/2) + ',top=' + ((window.screen.availHeight-105)/2));
	if(imgwin) {
		imgwin.blur();
		imgwin.moveTo(0,0);
		imgwin.resizeTo(0,0);

		imgwin.document.write(("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"><" + "html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"ko\" xml:lang=\"utf-8\"><" + "head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /><" + "title>object</" + "title><style type=\"text/css\">body { margin:0; }</style></" + "head>" +
			"<" + "body>" +
			"<img src=\"" + imgsrc.replace('+',' ') + "\" id=\"uploaded_image\" " +
			" onload=\"" +
				"var rz = 0;" +
				"var scrl = 0;" +
				"var rzwidth = this.width + 5;" +
				"var rzheight = this.height + 25 + " + (ie?55:30)  + ";" +
				"var mvleft = (window.screen.width - this.width) / 2;" +
				"var mvtop = (window.screen.height - this.height-25) / 2;" +
				"var imgwin = null;" +
				"if(this.height >= window.screen.height - 10) {" +
					"rzwidth = this.width + 23;" +
					"rzheight = window.screen.height - 30;" +
					"mvtop = 0;" +
				"} " +
				"if(this.width >= window.screen.width - 10) {" +
					"rz = 1;" +
					"scrl = 1;" +
					"rzwidth = window.screen.width;" +
					"mvleft = 0;" +
				"}" +
				"window.resizeTo(rzwidth, rzheight);" +
				"window.moveTo(mvleft, mvtop);" +
				"window.scrollbars = scrl;" +
				"window.resizable = rz;" +
				"\"" +
			" onerror=\"alert('이미지파일이 없거나 파일이름이 잘못되었습니다.\\n파일이름에 한글이 포함되어 있으면 뷰어창에 오류가 발생할수도 있습니다.');self.close();\"" +
			" onclick=\"window.close();\"" +
			" style=\"cursor:hand;cursor:pointer;\" alt=\"클릭하시면 창이 닫힙니다\" />" +
			"<" + "script type=\"text/javascript\">" +
				"function init() {" +
					"var img = document.getElementById('uploaded_image');" +
					"if(img) {" +
						"if(img.width >= window.screen.width -10) {" +
							"img.width = window.screen.width - 10;" +
						"}" +
						"if(img.height >= window.screen.height-50) {" +
							"document.body.scroll='auto';" +
						"}" +
						"document.title = img.width + '*' + img.height;" +
					"}" +
				"}" +
				"window.onLoad = init();" +
			"</" + "script" + ">" +
			"</" + "body></" + "html>"));
		imgwin.status = "Resolution:" + window.screen.width + "x" + window.screen.height;
		imgwin.focus();
	}
}