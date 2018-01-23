<br>
<br>
<br>
<br>

    <div class="container">
        <div class="row">
              <div class="col-md-5">
                    <h2 class="aboutus-title">Contact Us</h2>
            </div>
        </div>
    </div>



  
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSqOoI0Dz0NsL3-lLYzBC2tS4PVfDZ0Jc&callback=initMap"></script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=init"></script> -->
<!-- <script type="text/javascript">
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
</script> -->
<script src="module/contact/controller/contact.js"></script>
<section id="contact">
  <div class="container">
    <div class="row">
    <div class="col-md-7" id="map" style="width:550px; height:350px;">
        
      </div>

      <div class="col-md-5">
          <h4><strong>Get in Touch</strong></h4>
        <form>
          <div class="form-group">
            <input type="text" class="form-control" name="" value="" placeholder="Name">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="" value="" placeholder="E-mail">
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" name="" value="" placeholder="Phone">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="" rows="3" placeholder="Message"></textarea>
          </div>
          <button class="btn btn-default" type="submit" name="button">
              <i class="fa fa-paper-plane-o" aria-hidden="true"></i> SEND
          </button>
        </form>
      </div>
    </div>
  </div>
</section>



<div class="container services_panel">
   <div class="row">
    <div class="row">
        <div class="col-md-3">
              <div class="panel text-center">
                <h3>Head Office</h3><br>
                <img src="view/img/company/company_1.jpg" class="center-block img-responsive img_contact"><br>
                <p>
                  1537 Flint Street <br>
                  Tumon, MP 96911<br>

                  Phone:670-898-2847 <br>
                  Email Address:info@domain.com<br>
                </p>
                <button class="btn center-block">Read More</button>
                <br>
              </div>
        </div>
        <div class="col-md-3">
              <div class="panel text-center">
                <h3>Zonal Office</h3><br>
                <img src="view/img/company/company_2.jpg" class="center-block img-responsive img_contact"><br>
                <p>
                  1537 Flint Street <br>
                  Tumon, MP 96911<br>

                  Phone:670-898-2847 <br>
                  Email Address:info@domain.com<br>
                </p>
                <button class="btn center-block">Read More</button>
                <br>
              </div>
        </div>
        <div class="col-md-3">
              <div class="panel text-center">
                <h3>Zone#2 Office</h3><br>
                <img src="view/img/company/company_3.jpg" class="center-block img-responsive img_contact"><br>
                <p>
                  1537 Flint Street <br>
                  Tumon, MP 96911<br>

                  Phone:670-898-2847 <br>
                  Email Address:info@domain.com<br>
                </p>
                <button class="btn center-block">Read More</button>
                <br>
              </div>
        </div>
        <div class="col-md-3">
              <div class="panel text-center">
                <h3>Zone#3 Office</h3><br>
                <img src="view/img/company/company_4.jpg" class="center-block img-responsive img_contact"><br>
                <p>
                  1537 Flint Street <br>
                  Tumon, MP 96911<br>

                  Phone:670-898-2847 <br>
                  Email Address:info@domain.com<br>
                </p>
                <button class="btn center-block">Read More</button>
                <br>
              </div>
        </div>
    </div>
  </div>
</div>