var themeDir;

var allowedBounds;
var AmaxX;
var AmaxY;
var AminX;
var AminY;

function setupMaps(_themedir){
	//console.log(_themedir);
	
	themeDir = _themedir;
	
	initBounds();
	
	for(var i=0; i<mapObjects.length; i++){
		//console.log(jQuery(mapObjects[i].divID));
		initializeMap(mapObjects[i]);
	}
	var img;
	
	//hides all the map tiles (sloppy... should stop them from loading in the 1st place)
	$(".mapDiv").find("img").each(function(){
		img = $(this);
		if(img.height() == 256 && img.width() == 256){
			//img.css("opacity","0");
		}
	});
	
}

function initBounds(){
	
	allowedBounds = new GLatLngBounds(
			new GLatLng(40.71616774648679,-73.98880004882812),
			new GLatLng(40.746346606483826,-73.96202087402344)
	);

	AmaxX = allowedBounds.getNorthEast().lng();
	AmaxY = allowedBounds.getNorthEast().lat();
	AminX = allowedBounds.getSouthWest().lng();
	AminY = allowedBounds.getSouthWest().lat();	
	
}

function initializeMap(_mapDataObject) {
	
	if (GBrowserIsCompatible() && _mapDataObject && document.getElementById(_mapDataObject.divID)) {
	  
		var map = new GMap2(document.getElementById(_mapDataObject.divID));
		setData(map, _mapDataObject);
		checkBounds(map);
		
		var mt = map.getMapTypes();
		// Overwrite the getMinimumResolution() and getMaximumResolution() methods
		for (var i=0; i<mt.length; i++) {
			mt[i].getMinimumResolution = function() { return 13; };
			mt[i].getMaximumResolution = function() { return 14; };
		}
		
		// Add a move listener to restrict the bounds range
		GEvent.addListener(map, "move", function() {
			//console.log(map.getCenter());
			checkBounds(map);
		});
		
	    // ground overlay
		var overlay_boundaries = new GLatLngBounds(
										new GLatLng(40.693099,-74.025192),
										new GLatLng(40.769457,-73.925629)
									);
		//var overlay_boundaries = new GLatLngBounds(new GLatLng(), new GLatLng());
		var drawnMap = new GGroundOverlay(themeDir + "images/maptest.jpg", overlay_boundaries);
		map.addControl(new GSmallZoomControl3D());
		map.addOverlay(drawnMap);
	}
    
}

function setData(_map, _mapDataObject){
	_map.setCenter(new GLatLng(_mapDataObject.lat,_mapDataObject.lon), 13);
	
	var markerLatLong = new GLatLng(_mapDataObject.lat,_mapDataObject.lon);
	var marker = new GMarker(markerLatLong);
	_map.addOverlay(marker);
	
	GEvent.addListener(marker, "click", function() {
	    marker.openInfoWindowHtml("<strong>" + _mapDataObject.body + "</strong><br />" + _mapDataObject.caption);
	});

	
}


function checkBounds(_map) {
	// If the map position is out of range, move it back
	// Perform the check and return if OK
	if (allowedBounds.contains(_map.getCenter())) {
		return;
	}
	var C = _map.getCenter();
	var X = C.lng();
	var Y = C.lat();

	if (X < AminX) { X = AminX; }
	if (X > AmaxX) { X = AmaxX; }
	if (Y < AminY) { Y = AminY; }
	if (Y > AmaxY) { Y = AmaxY; }
	// alert ("Restricting "+Y+" "+X);
	_map.setCenter(new GLatLng(Y, X));
}
