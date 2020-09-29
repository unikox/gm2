/**
 * Created by kox on 30.09.2020.
 */

var map;

DG.then(function () {
    map = DG.map('map', {
        center: [52.251016, 104.248422],
        zoom: 16
    });

    DG.marker([52.251016, 104.248422]).addTo(map).bindPopup('Гимназия № 2 ');
   // var polygonComponents = 'POLYGON((82.91699 55.042136, 82.917522 55.040187, 82.918063 55.040235, 82.917540 55.042184,82.91699 55.042136))';
   // var polygonComponents = 'POLYGON((104.248422 52.251016, 104.248422 52.251016, 104.248422 52.251016, 104.248422 52.251016,104.248422 52.251016)';
    //52.250875, 104.248272
    //52.251016, 104.248422
    DG.Wkt.geoJsonLayer(polygonComponents).addTo(map);
});
