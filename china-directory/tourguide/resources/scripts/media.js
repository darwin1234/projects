var loadmedia 	 	= document.getElementById("loadmedia");
var addimagebtn  	= document.getElementById("addimage");
var imagefile	 	= document.getElementById("imagefile");
var imgcontainer 	= document.getElementById("imgcontainer");
var xhttp = new XMLHttpRequest();
var MediaUrl = "";
function radiobtn(url){
	MediaUrl = url;
}

var Media = {
	
	load: function(){
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			
				document.getElementById("imagelists").innerHTML = this.responseText;
			}
		}
		xhttp.open("POST", baseURL + "Welcome/Media",true);
		xhttp.send();
	},
	addimage: function(){
		imagefile.value = MediaUrl;
	},
	singlefile:function(){
		imgcontainer.innerHTML = "<img src='" + MediaUrl + "' style='width:200px;'>";
	},
	hiddenfile: function(){
		
	}
	
};
loadmedia.addEventListener("click", function(e){
	Media.load();	
});
addimagebtn.addEventListener("click", function(e){
	Media.addimage();
	Media.singlefile();
});

