<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Get Visitor's Location Using HTML5 Geolocation</title>
<script>
    function showPosition() {
        
        var arr_Destination = [
            {title:'MTower',lat:13.694827,lng:100.606188},
            {title:'Paragon',lat:13.7477777029,lng:100.534815},
        /*  {title:'Place C',lat:ddddd,lng:ddddd},
            {title:'Place D',lat:ddddd,lng:ddddd},
            {title:'Place E',lat:ddddd,lng:ddddd},
            {title:'Place F',lat:ddddd,lng:ddddd},*/
        ];

        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                
                for( i = 0;i<arr_Destination.length;i++){ 
                    

                    positionInfo = positionInfo + " " + arr_Destination[i].title + " = " + distance(position.coords.latitude,arr_Destination[i].lat,position.coords.longitude,arr_Destination[i].lng,"K");
                }
                
                document.getElementById("result").innerHTML = positionInfo;
            });

        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }

    function distance(lat1, lon1, lat2, lon2, unit) {
        var radlat1 = Math.PI * lat1/180
        var radlat2 = Math.PI * lat2/180
        var radlon1 = Math.PI * lon1/180
        var radlon2 = Math.PI * lon2/180
        var theta = lon1-lon2
        var radtheta = Math.PI * theta/180
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist)
        dist = dist * 180/Math.PI
        dist = dist * 60 * 1.1515
        if (unit=="K") { dist = dist * 1.609344 }
        if (unit=="N") { dist = dist * 0.8684 }
    return dist
}

</script>
</head>
<body>
    <div id="result">
        <!--Position information will be inserted here-->
    </div>
    <button type="button" onclick="showPosition();">Show Position</button>
</body>
</html>