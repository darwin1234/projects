var xhttp 	= new XMLHttpRequest();
var Nearby	= document.getElementById("Nearby");
window.onload = function(){
	
	window.leafletMap = L.map(document.getElementById('map'), {
		zoomControl: false,
		boxZoom: false,
		doubleClickZoom: false,
		zoom: 8,
		minZoom: 8,
		maxZoom: 18
	});
	//L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	L.tileLayer('https://worldtiles2.waze.com/tiles/{z}/{x}/{y}.png', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
		minZoom: 8,
		maxZoom: 18
	}).addTo(leafletMap);
	leafletMap.panTo([39.906217, 116.3912757]); //beijing
	leafletMap.on('click', function(event){
		//console.log(event);
	});
	
	leafletMap.on('load', function(event){
		//console.log(event);
	});
	
	
	
	
	//markerr();

};


Nearby.addEventListener("click", function(e){
	 if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showPosition);
	  }else { 
        //x.innerHTML = "Geolocation is not supported by this browser.";
	 }
	
	
	e.preventDefault();
});

function showPosition(position){
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var data = JSON.parse(this.responseText);
			//console.log(data);
			for(var i =0; i<data.length; i++){
				marker(data[i]['dslat'],data[i]['dslong'],data[i]['business_name'],data[i]['business_image']);
				console.log(data[i]['business_latitude']);
			}
			
		}
	};	
	xhttp.open("POST", "http://tourguide.local/map", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("lat=" + position.coords.latitude + "&lng="+ position.coords.longitude);
}
	
	

function marker(lat,lng,title,img) {
	window.testMarker = L.marker([lat, lng], { icon: L.icon({
		iconUrl: 'http://icons.iconarchive.com/icons/paomedia/small-n-flat/256/map-marker-icon.png',
		iconSize: [43, 64],
		iconAnchor: [22, 64],
		popupAnchor: [0, -64]
	})} ).addTo(leafletMap); // add to, adds marker to the map
	testMarker.myPopupInfo = L.popup({autoClose: false, closeOnClick: true, autoPan: false});
	testMarker.myPopupInfo.setContent("<p><img src='"+img+"' style='width:200px;'>" + " " +"<h3>"+ title+ "</h3>" + "<a href='#'>VIEW</a></p>");
	testMarker.bindPopup(testMarker.myPopupInfo);
	testMarker.on('click', function(e){
		//alert('marker');
		//testMarker.bindPopup(title);
		testMarker.openPopup();
	
	});
}

function lists(){
	
}


// remove marker
// window.testMarker.remove();