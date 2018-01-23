var map;
    var marker;
    function initMap(){
      var mapOptions={
        center: new google.maps.LatLng(39.4672835,-0.3774414),
        zoom: 15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      }
      map=new google.maps.Map(document.getElementById('map'), mapOptions);
      var place = new google.maps.LatLng(39.4672835,-0.3774414);
      marker=new google.maps.Marker({
        position:place,
        title: "Main Office",
        map: map
      });
      google.maps.event.addListener(marker, "click",showInfo);
    }
    
    function showInfo(){
      map.setZoom(16);
      map.setCenter(marker.getPosition());
      var infowindow=new google.maps.InfoWindow({
          content:"<h5>Main Office</h5>   <p>hola mundo</p>"
      });
      infowindow.open(map, marker);
    }