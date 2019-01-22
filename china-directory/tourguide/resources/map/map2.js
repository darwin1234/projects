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
//leafletMap.panTo([16.615982,120.316523]);
	leafletMap.on('click', function(event){
		//console.log(event);
});
	
leafletMap.on('load', function(event){
		//console.log(event);
});