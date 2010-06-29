var themeDir;

var allowedBounds13;
var allowedBounds12;
var AmaxX;
var AmaxY;
var AminX;
var AminY;
var BmaxX;
var BmaxY;
var BminX;
var BminY;

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
//	
//	allowedBounds13 = new GLatLngBounds(
//			new GLatLng(40.59322988304919, -74.00836944580078),//((), (40.61616768039879, -73.97232055664062))
//			new GLatLng(40.86030420568381, -73.86022567749023)
//	);
//	AmaxX = allowedBounds13.getNorthEast().lng();
//	AmaxY = allowedBounds13.getNorthEast().lat();
//	AminX = allowedBounds13.getSouthWest().lng();
//	AminY = allowedBounds13.getSouthWest().lat();	
//	
	
	
	allowedBounds12 = new GLatLngBounds(
			//new GLatLng(40.59322988304919, -74.00836944580078),//(40.61603737424185, -73.97232055664062)
			//new GLatLng(40.86030420568381, -73.86022567749023)//(40.83745041598947, -73.89610290527344)
			new GLatLng(40.61603737424185, -73.97232055664062),
			new GLatLng(40.83745041598947, -73.89610290527344)
	);
	AmaxX = allowedBounds12.getNorthEast().lng();
	AmaxY = allowedBounds12.getNorthEast().lat();
	AminX = allowedBounds12.getSouthWest().lng();
	AminY = allowedBounds12.getSouthWest().lat();	
	
}

function initializeMap(_mapDataObject) {
	
	if (GBrowserIsCompatible() && _mapDataObject && document.getElementById(_mapDataObject.divID)) {
	  
		var map = new GMap2(document.getElementById(_mapDataObject.divID));
		setData(map, _mapDataObject);
		checkBounds(map);
		
		var mt = map.getMapTypes();
		// Overwrite the getMinimumResolution() and getMaximumResolution() methods
		for (var i=0; i<mt.length; i++) {
			mt[i].getMinimumResolution = function() { return 12; };
			mt[i].getMaximumResolution = function() { return 12; };
		}
		
		// Add a move listener to restrict the bounds range
		GEvent.addListener(map, "move", function() {
			//console.log(map.getZoom());
			checkBounds(map);
			//checkBounds(map, map.getZoom());
		});
		
	    // ground overlay
		var overlay_boundaries = new GLatLngBounds(
										new GLatLng(40.569845,-74.045448),
										new GLatLng(40.883722,-73.823404)
									);
		//console.log("new");
		//var overlay_boundaries = new GLatLngBounds(new GLatLng(), new GLatLng());
		var drawnMap = new GGroundOverlay(themeDir + "images/map_sized.jpg", overlay_boundaries);
		//map.addControl(new GSmallZoomControl3D());
		map.addOverlay(drawnMap);
		
	}
    
}

function setData(_map, _mapDataObject){
	_map.setCenter(new GLatLng(_mapDataObject.lat,_mapDataObject.lon), 12);
	
    // Create our "tiny" marker icon
    var customIcon = new GIcon(G_DEFAULT_ICON);
    	customIcon.image = themeDir + "images/pin1.png";
    	customIcon.iconSize = new GSize(62, 54);
    	customIcon.iconAnchor = new GPoint(10, 58);
    	customIcon.infoWindowAnchor = new GPoint(17, 39);
    	customIcon.imageMap = [0,0, 60,0, 60,54, 0,54];
    	
    // Set up our GMarkerOptions object
    var markerOptions = { icon:customIcon };
	var markerLatLong = new GLatLng(_mapDataObject.lat,_mapDataObject.lon);
	var marker = new GMarker(markerLatLong, markerOptions);
	_map.addOverlay(marker);
	
	// Create our "tiny" marker icon
	var customIconWK = new GIcon(G_DEFAULT_ICON);
	customIconWK.image = themeDir + "images/pin2.png";
	customIconWK.iconSize = new GSize(88, 59);
	customIconWK.iconAnchor = new GPoint(32, 55);
	customIconWK.infoWindowAnchor = new GPoint(44, 55);
	customIconWK.imageMap = [0,0, 75,0, 75,59, 0,59];
	
	// Set up our GMarkerOptions object
	var markerOptionsWK = { icon:customIconWK };
	var markerLatLongWK = new GLatLng(40.726004,-74.005478);
	var markerWK = new GMarker(markerLatLongWK, markerOptionsWK);
	
	
	_map.addOverlay(markerWK);
	
	GEvent.addListener(marker, "click", function() {
	    marker.openInfoWindowHtml("<strong>" + _mapDataObject.body + "</strong><br />" + _mapDataObject.caption);
	});
	
	GEvent.addListener(markerWK, "click", function() {
		markerWK.openInfoWindowHtml("<strong>Our Office! Hi Everyone!</strong>");
	});

	
}


function checkBounds(_map) {

	if (allowedBounds12.contains(_map.getCenter())) return;
	
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
