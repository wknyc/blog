function initializeMap(_mapDataObject, element) {
	
	if (GBrowserIsCompatible() && _mapDataObject && document.getElementById(element)) {
	  
		
		var map = new GMap2(document.getElementById(element));
		setData(map, _mapDataObject);
		
		var mt = map.getMapTypes();
		// Overwrite the getMinimumResolution() and getMaximumResolution() methods
		for (var i=0; i<mt.length; i++) {
			mt[i].getMinimumResolution = function() { return 12; };
			mt[i].getMaximumResolution = function() { return 14; };
		}
		
		
		// Add a move listener to restrict the bounds range
		GEvent.addListener(map, "move", function() {
			checkBounds(map);
		});
	
	    
	    // ground overlay
		var overlay_boundaries = new GLatLngBounds(new GLatLng(40.693099,-74.025192), new GLatLng(40.769457,-73.925629));
		var drawnMap = new GGroundOverlay("maptest.jpg", overlay_boundaries);
		
		map.addControl(new GSmallMapControl());
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
	var allowedBounds = new GLatLngBounds(new GLatLng(40.693099, -74.025192),
			new GLatLng(40.769457, -73.925629));
	// Perform the check and return if OK
	if (allowedBounds.contains(_map.getCenter())) {
		return;
	}
	// It's not OK, so find the nearest allowed point and move there
	var C = _map.getCenter();
	var X = C.lng();
	var Y = C.lat();

	var AmaxX = allowedBounds.getNorthEast().lng();
	var AmaxY = allowedBounds.getNorthEast().lat();
	var AminX = allowedBounds.getSouthWest().lng();
	var AminY = allowedBounds.getSouthWest().lat();

	if (X < AminX) {
		X = AminX;
	}
	if (X > AmaxX) {
		X = AmaxX;
	}
	if (Y < AminY) {
		Y = AminY;
	}
	if (Y > AmaxY) {
		Y = AmaxY;
	}
	// alert ("Restricting "+Y+" "+X);
	_map.setCenter(new GLatLng(Y, X));
}
