jQuery(document).ready(function($) {
var map;
var kog = new google.maps.LatLng(40.736925,-74.068589);

var MY_MAPTYPE_ID = 'custom_style';

function initialize() {

    var featureOpts = [{
        featureType: "water",
        stylers: [{
            color: "#eeeeee"
        }, {
            visibility: "on"
        }]
    }, {
        featureType: "landscape",
        stylers: [{
            color: "#fefefe"
        }]
    }, {
        featureType: "administrative",
        elementType: "geometry.stroke",
        stylers: [{
            color: "#eeeeee"
        }, {
            weight: 0.4
        }]
    }, {
        featureType: "poi",
        stylers: [{
            color: "#eeeeee"
        }]
    }, {
        featureType: "road",
        elementType: "geometry.fill",
        stylers: [{
            color: "#eeeeee"
        }]
    }, {
        featureType: "road",
        elementType: "geometry.stroke",
        stylers: [{
            color: "#eeeeee"
        }, {
            weight: 0.1
        }, {
            visibility: "off"
        }]
    }, {
        featureType: "road",
        elementType: "labels.text.stroke",
        stylers: [{
            color: "#cccccc"
        }, {
            weight: 4
        }]
    }, {
        featureType: "road",
        elementType: "labels.text",
        stylers: [{
            color: "#cccccc"
        }, {
            weight: 0.5
        }]
    }, {
        elementType: "labels.text",
        stylers: [{
            color: "#777777"
        }, {
            weight: 0.4
        }]
    }, {
        featureType: "administrative",
        elementType: "labels.text",
        stylers: [{
            visibility: "on"
        }, {
            weight: 0.4
        }, {
            color: "#cccccc"
        }]
    }, {
        featureType: "road.highway",
        elementType: "geometry",
        stylers: [{
            color: "#cccccc"
        }]
    }, {
        featureType: "road",
        elementType: "labels.icon",
        stylers: [{
            visibility: "off"
        }]
    }, {
        featureType: "transit",
        elementType: "labels.icon",
        stylers: [{
            visibility: "off"
        }]
    }, {
        featureType: "administrative",
        elementType: "labels.icon",
        stylers: [{
            visibility: "off"
        }]
    }, {
        featureType: "poi",
        elementType: "labels.icon",
        stylers: [{
            visibility: "off"
        }]
    }, {
        featureType: "transit.line",
        elementType: "geometry",
        stylers: [{
            visibility: "on"
        }, {
            color: "#a0a0a0"
        }]
    }, {
        featureType: "poi.medical",
        elementType: "labels",
        stylers: [{
            color: "#636363"
        }, {
            visibility: "off"
        }]
    }, {
        featureType: "poi.place_of_worship",
        elementType: "labels",
        stylers: [{
            visibility: "off"
        }]
    }, {
        featureType: "poi.attraction",
        elementType: "labels",
        stylers: [{
            visibility: "off"
        }]
    }, {
        featureType: "poi.business",
        elementType: "labels",
        stylers: [{
            visibility: "off"
        }]
    }];


    var mapOptions = {
        scrollwheel: false,
        zoom: 16,
        center: kog,
        streetViewControl: false,
        mapTypeControl: false,

        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
        },
        mapTypeId: MY_MAPTYPE_ID
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var styledMapOptions = {
        name: 'Custom Style'
    };

    var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

    var marker = new google.maps.Marker({
        position: kog,
        map: map,
        title: "RMP"
    });

    map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}

google.maps.event.addDomListener(window, 'load', initialize);

google.maps.event.addDomListener(window, "resize", function () {
    $('#map-canvas').css({
        height: $(window).height() - 210
    });
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");

    map.setCenter(center);
});
});