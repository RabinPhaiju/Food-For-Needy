<!DOCTYPE html>
<head>    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    
        <script>
            L_NO_TOUCH = false;
            L_DISABLE_3D = false;
        </script>
    
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.6.0/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.css"/>
    <link rel="stylesheet" href="https://rawcdn.githack.com/python-visualization/folium/master/folium/templates/leaflet.awesome.rotate.css"/>
    <style>html, body {width: 100%;height: 100%;margin: 0;padding: 0;}</style>
    <style>#map {position:absolute;top:0;bottom:0;right:0;left:0;}</style>
    
            <meta name="viewport" content="width=device-width,
                initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
            <style>
                #map_8a88e4d965c348a5a61ad41dba73615e {
                    position: relative;
                    width: 100.0%;
                    height: 100.0%;
                    left: 0.0%;
                    top: 0.0%;
                }
                
            </style>
        
</head>
<body>    
    
            <div class="folium-map" id="map_8a88e4d965c348a5a61ad41dba73615e" ></div>
            <?php
            $sql = "SELECT * from register";
             require_once("DBConnect.php");
             $result = $conn-> query($sql);
             $lan = array();
             $log = array();
             $username = array();
             if($result-> num_rows >0){
                while($row = $result-> fetch_assoc()){
                    array_push($lan,$row["lan"]);
                    array_push($log,$row['log']);
                    array_push($username,$row['username']);
                    ?>  <?php }} ?>
        
</body>
<script>    
    
            var map_8a88e4d965c348a5a61ad41dba73615e = L.map(
                "map_8a88e4d965c348a5a61ad41dba73615e",
                {
                    center: [27.672375, 85.432870],
                    crs: L.CRS.EPSG3857,
                    zoom: 13,
                    zoomControl: true,
                    preferCanvas: false,
                    locations: [27.7127, 85.3214],
                }
            );

            

        
    
            var tile_layer_2ca4cd7e4602439d999a9309a9688271 = L.tileLayer(
                "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
                {"attribution": "Data by \u0026copy; \u003ca href=\"http://openstreetmap.org\"\u003eOpenStreetMap\u003c/a\u003e, under \u003ca href=\"http://www.openstreetmap.org/copyright\"\u003eODbL\u003c/a\u003e.", "detectRetina": false, "maxNativeZoom": 18, "maxZoom": 18, "minZoom": 0, "noWrap": false, "opacity": 1, "subdomains": "abc", "tms": false}
            ).addTo(map_8a88e4d965c348a5a61ad41dba73615e);
        
    
            var feature_group_0eee7ffe91de41b6b4d8d272f8a276da = L.featureGroup(
                {}
            ).addTo(map_8a88e4d965c348a5a61ad41dba73615e);
        
            <?php
            $js_array_lan = json_encode($lan);
            echo "var lan_array = ". $js_array_lan . ";\n";

            $js_array_log = json_encode($log);
            echo "var log_array = ". $js_array_log . ";\n";

            $js_array_username = json_encode($username);
            echo "var username_array = ". $js_array_username . ";\n";
            ?>


                var i;
                for (i = 0; i < lan_array.length; i++) {
                    var marker_7624e561dbdb426bb087461cde497d25 = L.marker(
                        [lan_array[i], log_array[i]],{}).addTo(feature_group_0eee7ffe91de41b6b4d8d272f8a276da);
                    var icon_e09a54deabaa4705963338b59341d95f = L.AwesomeMarkers.icon(
                        {"extraClasses": "fa-rotate-0", "icon": "info-sign", "iconColor": "white", "markerColor": "red", "prefix": "glyphicon"});
                    marker_7624e561dbdb426bb087461cde497d25.setIcon(icon_e09a54deabaa4705963338b59341d95f);
                var popup_da8ebb576cbf479bb15b945d118c3e0c = L.popup({"maxWidth": "100%"});
                    var html_3f23d410461345549f158d0af8715bf8 = $(`<div id="html_3f23d410461345549f158d0af8715bf8" style="width: 100.0%; height: 100.0%;">` + username_array[i] + `</div>`)[0];
                    popup_da8ebb576cbf479bb15b945d118c3e0c.setContent(html_3f23d410461345549f158d0af8715bf8);
                marker_7624e561dbdb426bb087461cde497d25.bindPopup(popup_da8ebb576cbf479bb15b945d118c3e0c);

           
            }

</script>