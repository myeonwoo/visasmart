/** flash write **/
	function flashSet(s,w,h,d,bg,t,f,l){

		if (d == undefined) d = 'flash';
		if (bg == undefined) bg = '#ffffff';
		if (t == undefined) t = 'transparent';

		var code = "";
		code  = "<object type=\"application/x-shockwave-flash\" ";
		code +=         "classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" ";
		code +=         "codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\" ";
		code +=         "width=\""+w+"\" height=\""+h+"\" id=\""+d+"\">";
		code += "<param name=\"movie\" value=\""+s+"\" />";
		code += "<param name=\"quality\" value=\"high\" />";
		code += "<param name=\"wmode\" value=\""+t+"\" />";
		code += "<param name=\"menu\" value=\"false\" />";
		code += "<param name=\"allowScriptAccess\" value=\"always\" />";
		code += "<param name=\"allowFullScreen\" value=\"true\" />";
		code += "<param name=\"swliveconnect\" value=\"true\" />";
		code += "<param name='scale' value='"+f+"' />";
		code += "<param name='salign' value='"+l+"' />";
		code += "<embed src=\""+s+"\" quality=\"high\" ";
		code +=        "wmode=\""+t+"\" ";
		code +=        "menu=\"false\" width=\""+w+"\" height=\""+h+"\" ";
		code +=        "type=\"application/x-shockwave-flash\" ";
		code +=        "allowFullScreen=\"true\"";
		code +=        "pluginspage=\"http://www.macromedia.com/go/getflashplayer\"> ";
		code += "</embed>";
		code += "</object>";
		return code;
	}

	function flashWrite(s,w,h,d,bg,t,f,l) {
		document.write (flashSet(s,w,h,d,bg,t,f,l));
	}

/* On Off Js */
	function on(obj) {
		obj.src = obj.src.replace('_off.gif','_on.gif');
	}
	function off(obj) {
		obj.src = obj.src.replace('_on.gif','_off.gif');
	}


	function on2(idx) {
		var obj2 = document.getElementById(idx);
		obj2.src = obj2.src.replace('_off.gif','_on.gif');
	}
	function off2(idx) {
		var obj2 = document.getElementById(idx);
		obj2.src = obj2.src.replace('_on.gif','_off.gif');
	}

	function openTnavi() {
		document.getElementById('naviClose').style.display = "none";
		document.getElementById('naviOpen').style.display = "block";
	}
	function closeTnavi() {
		document.getElementById('naviClose').style.display = "block";
		document.getElementById('naviOpen').style.display = "none";
	}

/* Layout */
	function showBox(id){
	var bx = document.getElementById(id);
		if (bx.style.display == 'block')
			{
				bx.style.display='none';
			}
		else
			{
				bx.style.display='block';
			}
		}

		function re_layer(id){
			var bx = document.getElementById(id);
			var bx_display = bx.style.display;
			var bxs = document.getElementsByTagName("dl");

			for(var i = 0; i < bxs.length; i++){
				if( bxs[i].className == "ripple_layer_box" ) {bxs[i].style.display="none";}
			}if (bx_display == 'block'){
				bx.style.display='none';
			}else{
				bx.style.display='block';
			}
		}


function Faq_tab(id) {
	var max = 3;		//맥스숫자
		for (var i = 1; i <= max; i++) {
			var obj1 = document.getElementById("Faq_tab_list1");
			var obj2 = document.getElementById("Faq_tab_list2");
			var obj3 = document.getElementById("Faq_tab_list3");
			var img1 = document.getElementById("Faq_tab_img1");
			var img2 = document.getElementById("Faq_tab_img2");
			var img3 = document.getElementById("Faq_tab_img3");
				if (id == 1) {
					obj1.style.display = "";
					obj2.style.display = "none";
					obj3.style.display = "none";
					img1.src="/common/images/visa/visa_tab02_01_on.gif";
					img2.src="/common/images/visa/visa_tab02_02_a.gif";
					img3.src="/common/images/visa/visa_tab02_03.gif";
				} else if (id == 2){
					obj1.style.display = "none";
					obj2.style.display = "";
					obj3.style.display = "none";
					img1.src="/common/images/visa/visa_tab02_01.gif";
					img2.src="/common/images/visa/visa_tab02_02_on.gif";
					img3.src="/common/images/visa/visa_tab02_03.gif";
				} else{
					obj1.style.display = "none";
					obj2.style.display = "none";
					obj3.style.display = "";
					img1.src="/common/images/visa/visa_tab02_01_a.gif";
					img2.src="/common/images/visa/visa_tab02_02.gif";
					img3.src="/common/images/visa/visa_tab02_03_on.gif";
				}
		}
	}