var locations = [
    ['Bangkala Barat', -5.532453, 119.513673, 5],
    ['Bangakala', -5.581472, 119.565930, 4],
    ['Tamalatea', -5.629444, 119.681031, 3],
    ['Binamu', -5.677559, 119.749665, 2],
    ['Bontoramba', -5.598353, 119.686482, 1]
];

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 10,
  center: new google.maps.LatLng(-5.63333000, 119.73333000),
  mapTypeId: google.maps.MapTypeId.ROADMAP
});

var infowindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < locations.length; i++) {  
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    map: map,
    title: locations[i][0],
    animation: google.maps.Animation.DROP,
  });
  
  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      infowindow.setContent(
        '<div id="content">' +
            '<div id="siteNotice">' +
            "</div>" +
            '<h1 id="firstHeading" class="firstHeading">' + locations[i][0] + '</h1>' +
            '<div id="bodyContent">' +
                "<p><b>" + locations[i][0] + "</b>, about marker.</p>" +
                "<ul>" +
                  "<li>list</li>" +
                  "<li>list</li>" +
                  "<li>list</li>" +
                "</ul>" +
            "</div>" +
        "</div>"
      );
      infowindow.open(map, marker);
    }
  })(marker, i));
}