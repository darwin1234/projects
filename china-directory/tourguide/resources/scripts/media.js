var loadmedia 	 	= document.getElementById("loadmedia");
var addimagebtn  	= document.getElementById("addimage");
var imagefile	 	= document.getElementById("imagefile");
var imgcontainer 	= document.getElementById("imgcontainer");
var mainupload		= document.getElementById("mainupload");
var xhttp = new XMLHttpRequest();
var MediaUrl = "";
var HTML = "";
var imgsrc ="";
function radiobtn(url){
	MediaUrl = url;
}

var Media = {
	
	load: function(){
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var files =  JSON.parse(this.responseText);
				for(var i = 0; i< files.length; i++){
					imgsrc  = files[i].image_path
					HTML += "<div style='position:relative; float:left; width:240px; height:200px; background:url("+imgsrc+"); background-size:cover; margin:2px;'>";
					HTML += "<h5 style='bottom:0; padding-top:20px; display:block; color:#fff; background:#000; padding:0; margin:0; position:absolute; bottom:0; width:100%; height:40px;'>";
					HTML += files[i].image_name;
					HTML += "<input type='radio' value='' name='file' onclick='radiobtn("+imgsrc+");'>";
					HTML += "</h5>";
					HTML += "</div>";
				}
				document.getElementById("files").innerHTML = HTML;
			
			}
		}
		xhttp.open("POST", baseURL + "administrator/files",true);
		xhttp.send();
	},
	addimage: function(){
		imagefile.value = MediaUrl;
	},
	singlefile:function(){
		imgcontainer.innerHTML = "<img src='" + MediaUrl + "' style='width:200px;'>";
	},
	hiddenfile: function(){
		
	},
	mainupload: function(){
		alert(1);
	}
	
};
Media.load();
loadmedia.addEventListener("click", function(e){
	Media.load();	
});
addimagebtn.addEventListener("click", function(e){
	Media.addimage();
	Media.singlefile();

});
mainupload.addEventListener("submit", function(e){
	alert(1);
	//Media.mainupload();
	e.preventDefault();
});


