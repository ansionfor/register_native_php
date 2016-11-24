
function succeedhandle_generic(url, msg, value){
	Public.UpdateVote(msg, value, url);
}

function errorhandle_generic(msg, value){
	Public.UpdateVote(msg, value);
}

function succeedhandle_(url, msg, value){
	Public.UpdateVote(msg, value, url);
}

function errorhandle_(msg, value){
	Public.UpdateVote(msg, value);
}


var Public = {
    id : function (id){
        return !id ? null : document.getElementById(id);
    },
	
	batch : function(id, actid, sid) {
		if(!sid){
            var chks = document.getElementsByName(id);
		}else{
			var chks = jQuery('#'+sid+' input[name="appid[]"]');
		}
        var app = new Array();
        for (i = 0; i < chks.length; i++) {
            if (chks[i].checked == true) {
                app.push(chks[i].value);
            }
        }
        if (app.length > 0) {
            appid = app.join('|');
            showWindow('generic', 'plugin.php?id=polls:vote&actid=' + actid + '&batch=1&appid=' + appid, 'get', 0);
			return false;
        }else{
		    alert('\u8bf7\u9009\u62e9\u8981\u7ed9\u54ea\u4e9b\u6295\u7968\uff01');	
			return false;
		}
    },
	postnum : 0,
	voteajax : function (my,ids){
		var submit_span = this.id('submit_span').innerHTML;
		this.id('submit_span').innerHTML = '<img src="'+SITEURL+'source/plugin/polls/static/images/loading.gif">';
		var formhash = document.getElementById('formhash').value;
	    var chks = my.getElementsByTagName('input');
		var app = new Array();
        for (var i = 0; i < chks.length; i++) {
			if(chks[i].name == ids){
				app.push(chks[i].value);
			}else if(chks[i].name == 'seccodehash'){
				var seccodehash = chks[i].value;
			}
		}
		this.postnum = app.length;
		if(document.getElementById('seccheck')){
			try {
			    var secverify = this.id('seccodeverify_'+seccodehash).value;
			} catch (ext) {
				
			}
			jQuery.ajax({
                //async: false,
                dataType: 'text',
                url: 'misc.php?mod=seccode&action=check&inajax=1&modid=plugin::polls&idhash=' + seccodehash + '&secverify=' + (BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(secverify) : secverify),
                success: function (s){ 
				var s = s.match(/\[CDATA\[(.*?)\]]/);
				    if(s[1] != 'succeed') {
						Public.id('msg').innerHTML = '\u9a8c\u8bc1\u7801\u9519\u8bef';
						Public.id('submit_span').innerHTML = submit_span;
				    }else{
						for (i = 0; i < app.length; i++) {
							Public.ajaxpost(my.action,app[i],formhash);
						}
					}
				}
		    });
		}else{
			for (i = 0; i < app.length; i++) {
				Public.ajaxpost(my.action,app[i],formhash);
			}
		}
		return false;
    },
	cnum : 0,
	ajaxpost : function (url,appid,formhash){
		this.id('app_'+appid).innerHTML = '<img src="'+SITEURL+'source/plugin/polls/static/images/load.gif">';
		jQuery.ajax({
            //async: false,
            dataType: 'text',
			type : 'post',
		    url : url+'&batch=1&appid='+appid+'&submit=1&inajax=1&formhash='+formhash,
		    success : function(data) {
				Public.cnum++;
				var data = data.match(/\[CDATA\[(.*?)\]]/);
				Public.id('app_'+appid).innerHTML = data[1];
				if(Public.cnum>=Public.postnum){
				    Public.id('submit_span').innerHTML = '<input type="button" class="pn pnc" value=" \u5173\u95ed "  onclick="hideWindow(\'generic\');"/>';
				}
				return data[1];
		    }
	    });
	},
	
	page : 1,
	LoadMore : function(obj, box, z, url, allpage, keep) {
        var text = obj.innerHTML;
		obj.innerHTML = '<img src="source/plugin/polls/static/images/loading.gif"/>';
		this.page++;
		if(this.page>allpage){
			obj.innerHTML = '\u6ca1\u6709\u4e86';
			return false;
		}
		url = url+'&page='+this.page;
		jQuery.get(url, function(data) {
			var html = jQuery(data).find("#"+box).html();
			try {
			    container = jQuery('#' + box);
				container.imagesLoaded( function(){
					var result = jQuery(html).filter(z);
			    for (var i = 0; i < result.length; i++) {
					curitem = jQuery(result[i]);
			        container.append(curitem);
				    container.masonry('appended', curitem, true);
				    curitem.animate({
                        opacity: 1
                    });
			    }
				});
			} catch (ext) {
				Public.id(box).innerHTML += html;
				if(keep && z){
				    node = jQuery(Public.id(box).innerHTML).filter(z);
					if(node.length > keep){
						for (var i = 0; i < node.length - keep; i++) {
							//jQuery("#"+box).find(z)[i].remove();
							rem = jQuery("#"+box).find(z)[i];
							jQuery(rem).slideUp(800, function() {
                                jQuery("#"+box).find(z)[0].remove();
                            });
						}
					}
				}
			}
			obj.innerHTML = text;	
		});
        return false;
    },
	
	_qrcode : function (obj,url){
        //url = encodeURIComponent(url);
	var qrcode = new QRCode(obj.parentNode, {
        text: url,
        width: obj.width,
        height: obj.height,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
        });
		obj.parentNode.removeChild(obj);
    },
	
	filter : function(obj,box){
		jQuery(obj).siblings().removeClass('curr');
		obj.className = 'curr';
		jQuery('#filter-show').children().hide();
		jQuery('#'+box).show();
		setcookie('filter', box);
    },
	
	countdown : function(time, d, id){
		var dl = d ? new Array('\u5929','\u65f6','\u5206','\u79d2') : new Array('','','','');
		document.write('<span id="CountMsg_'+id+'" class="HotDate"> <b>00</b> <b>00</b> <b>00</b> <b>00</b> </span>');
		var EndTime = new Date(time);
		EndTime.setHours(23,59,59,0);
		if(EndTime>new Date()){
			setInterval(function(){
				var NowTime = new Date();
				var t = EndTime.getTime() - NowTime.getTime();
				d = Math.floor(t/1000/60/60/24);
				h = Math.floor(t/1000/60/60%24);
				m = Math.floor(t/1000/60%60);
				s = Math.floor(t/1000%60);
				document.getElementById('CountMsg_'+id).innerHTML = "<b>"+d+dl[0]+"</b> <b>"+h+dl[1]+"</b> <b>"+m+dl[2]+"</b> <b>"+s+dl[3]+"</b>";
			},1000);
		}else{
			document.getElementById('CountMsg_'+id).innerHTML = "<b>\u5df2\u622a\u6b62</b>";
		}
	},
	
	wave : function(color, size, js, sx){
		js = js ? js : 2;
		sx = sx ? sx : 0;
		document.write('<canvas id="CanvasWave" height="'+size+'px" style="width:100%;"></canvas>');
		var canvas = document.getElementById("CanvasWave"); 
		var context = canvas.getContext("2d"); 
		    context.canvas.width = window.innerWidth*2;
			context.canvas.height = (size+js)*2;
		    context.fillStyle = color;
		var radius = size*2;
		var s = canvas.offsetWidth / size;
		var x = 0;
		var startAngel = 0*Math.PI;
		var endAngel = 2*Math.PI;
		context.shadowColor = "#666";
		context.shadowOffsetX = 2;
        context.shadowOffsetY = 0.5;
        context.shadowBlur = js;
		context.beginPath(); 
		for(var i = 0; i<s;i++){
			context.arc(x+i*radius*2,sx,radius,startAngel,endAngel,false); 	
		}
		context.fill();
		context.closePath();
	},
	
	UpdateVote : function(msg, value, url){
		if(value.vote){
			try {
				if(this.id('Amount')){
					this.id('Amount').innerHTML = value.vote;
				}else if(this.id('Amount_'+value.appid)){
					this.id('Amount_'+value.appid).innerHTML = value.vote;
				}
			} catch (ext) {
				
			}
		}
		if(value.tips){
			if (this.isExitsFunction('showDialog')) {
				showDialog(value.tips, 'notice', null, null, 0, null, null, null, null);
				hideWindow('generic');
			}else{
				popup.open(value.tips, 'alert');
			}
	    }
		
	},
	
	isExitsFunction : function (funcName) {
		try {
			if (typeof(eval(funcName)) == "function") {
				return true;
			}
		} catch(e) {}
		return false;
	},
	
	upload : function (obj,url) {

		var ObjBox = obj.parentNode;
		var Objhtml = ObjBox.innerHTML;
		
		if(typeof FileReader != 'undefined' && obj.files[0]) {//note 支持html5上传新特性
		    var file = obj.files[0];
			var fileSize = 0;
			if (file.size > 1024 * 1024){
				fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
			}else{
				fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';  
			}
			ObjBox.innerHTML = '<div class="upbox">'
			+'<p class="FileName"><span><font>0</font> / '+fileSize+'</span><i>0%</i></p>'
			+'<p class="ProgressBar"><b></b></p>'
			+'</div>';
			
			var fd = new FormData();
			fd.append(obj.name, file);
			var xhr = new XMLHttpRequest();
			xhr.upload.addEventListener("progress", uploadProgress, false);
			xhr.addEventListener("load", uploadComplete, false);
			xhr.addEventListener("error", uploadFailed, false);
			xhr.addEventListener("abort", uploadFailed, false);
			xhr.open("POST", url+'&field='+obj.name);
			xhr.send(fd);
		}
		
		function uploadProgress(evt) {
			if (evt.lengthComputable) {
				var percentComplete = Math.round(evt.loaded * 100 / evt.total);
				ObjBox.getElementsByTagName('i')[0].innerHTML = percentComplete.toString() + '%';
				ObjBox.getElementsByTagName('b')[0].style.width = percentComplete.toString() + '%';
				var fileSize = 0;
				if (evt.loaded > 1024 * 1024){
					fileSize = (Math.round(evt.loaded * 100 / (1024 * 1024)) / 100).toString() + 'MB';
				}else{
					fileSize = (Math.round(evt.loaded * 100 / 1024) / 100).toString() + 'KB';  
				}
				ObjBox.getElementsByTagName('font')[0].innerHTML = fileSize;
			}
		}

		function uploadComplete (evt){
			var data = JSON.parse(evt.target.responseText);
			if(data.aid){
				ObjBox.getElementsByTagName('span')[0].innerHTML = '<input name="'+obj.name+'" type="hidden" value="[attach='+data.aid+'|'+data.type+']"/><input name="pic[title][' + data.aid + ']" type="hidden" value="' + data.title + '" /></li> \u4e0a\u4f20\u5b8c\u6210';
			}else{
				ObjBox.getElementsByTagName('b')[0].style.backgroundColor='#ff0000';
				ObjBox.getElementsByTagName('i')[0].innerHTML = '0%';
				ObjBox.getElementsByTagName('span')[0].innerHTML = data.message;
			}
			
		}
		
		function uploadFailed(evt) {
			 ObjBox.getElementsByTagName('span')[0].innerHTML = '{lang polls:UpgradeBrowser}';
		}
	
	}
	
	
	
};




