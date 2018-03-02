
<script type="text/javascript" src="module/homepage/view/js/homepage.js"></script>
    <style>
        .item img {width:100%; max-height:550px;display: block;}
        .caraous-title {
            position: absolute;
            top: 81%;
            left: 25px;
            right: auto;
            width: 96.66666666666666%;
            color: #000;
        }
        .caraous-title h1 {color:#FFF;font-size:45px; font-weight:600;}
        .caraous-title h3 {margin-bottom:30px;color:#fff;font-size:18px; letter-spacing:1px;}
        .caraous-title span {color:#aa1f43;}
        .caraous-img-box img {width:50%;}
        /* Button */
        .site-btn{padding:12px 25px 12px 25px;border-radius:2px;background:#DF314D;border-color:transparent;font-size:14px;}
        .site-btn:hover{background:#C9223D ;border:transparent;}
        .site-btn2{padding:12px 25px 12px 25px;border-radius:2px;background:#05681e;border-color:transparent;font-size:14px;}
        .site-btn2:hover{background:rgb(128, 197, 71); ;border:transparent;}

    </style>
       
<div id="myCarousel" class="carousel slide" data-interval="false">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="view/img/homepage/coche.jpg" style="width:100%" class="img-responsive">
      <div class="container">
        <div class="caraous-title text-center">
            <div class="col-md-12">
                <h1><span>CARS </span>for any ocassion</h1>
            </div>        
        </div>
      </div>
    </div>
    <div class="item">
      <img src="view/img/homepage/motos.jpg" class="img-responsive">
      <div class="container">
        <div class="caraous-title text-center">
            <div class="col-md-12">
                    <h1><span>MOTORBIKES</span> for all styles</h1>                              
            </div>        
        </div>
      </div>
    </div>
    <div class="item">
      <img src="view/img/homepage/camiones.jpg" class="img-responsive">
      <div class="container">
        <div class="caraous-title text-center">
            <div class="col-md-12">
                    <h1><span>TRUCKS</span> of all kinds</h1>                      
            </div>        
        </div>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>
<br>
<br>
<br>
<div class="form-group">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1"> <!-- col-md-offset-3 -->
                <select id="province_home" name="province_home" class="form-control input-md color_input sombra" required="">
                    <option selected="">Select Province</option>
                </select>
            </div>
            <div class="col-md-3">
                <select id="city_home" name="city_home" class="form-control input-md color_input sombra" required="">
                    <option selected="">Select City</option>
                </select>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control color_input sombra" id="search_home" list="datalist_search"  placeholder="Search for">
                    <datalist id="datalist_search">
                        <option value="abel"></option>
                    </datalist>
                    <span class="input-group-btn">
                        <a type="submit" href="#" class="btn btn-primary " id="btn_search"><i class="glyphicon glyphicon-search"></i></a>
                    </span>
                   <!--  <input class="form-control color_input sombra" id="search_home" list="datalist_search " name="search_home" placeholder="Search for" required/>
                    <datalist id="datalist_search">
                        <option value="dddd">xxx</option>
                        <option value="sssss">sssss</option>
                    </datalist>
                    <span class="input-group-btn">
                        <a type="submit" href="#" class="btn btn-primary " id="btn_search"><i class="glyphicon glyphicon-search"></i></a>
                    </span> -->
                    <!-- index.php?page=homepage&view=search -->
                </div>
            </div>
        </div>
    </div>
</div>






<div class="form-group ">
    <div class="container paddingTB60" id="dummies">
        
    </div>
</div>
<div class="form-group ">
    
    <div class="container">
        <br><br>
        <div class="row" >
            <div class="form-group ">
                <button type="button" id="bt_dataTable" name="submit" class="btn btn-success pull-left"    >Charge DataTable</button>            
            </div>

            <!-- <div class="form-group ">
                <button type="button" id="bt_dataTab" name="submit" class="btn btn-warning pull-left"  href="javascript:mostrar();"  >Close DataTable</button>            
            </div> -->
        </div>
        <br><br>
        <div class="row">            
            <div class="form-group table-responsive" id="div_datatable" style="display:none">
                <table class="table table-hover display" id="tableProducts">
                    <thead>                        
                        <tr style="background: silver;" >
                            <th><b>PUBLICATION DATE</b></th>
                            <th><b>TITLE</b></th>
                            <th><b>PROD TYPE</b></th>
                            <th><b>CITY</b></th>
                            <th><b>COUNTRY</b></th>
                            <th><b>PROVINCE</b></th>
                            <th><b>USER</b></th>
                            <th><b>TELEPHONE</b></th>
                            <th><b>EMAIL</b></th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <?php
                            if ($rdo->num_rows === 0){
                                echo '<tr>';
                                echo '<td align="center"  colspan="3">There is not Dates</td>';
                                echo '</tr>';
                            }else{
                                foreach ($rdo as $row) {
                                    echo '<tr>';
                                        echo '<td>'. $row['date_today'] . '</td>';
                                        echo '<td>'. $row['title'] . '</td>';
                                        echo '<td>'. $row['product_type'] . '</td>';
                                        echo '<td>'. $row['city'] . '</td>';
                                        echo '<td>'. $row['country'] . '</td>';
                                        echo '<td>'. $row['province'] . '</td>';
                                        echo '<td>'. $row['user_name'] . '</td>';
                                        echo '<td>'. $row['phone'] . '</td>';
                                        echo '<td>'. $row['email'] . '</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
    <div class="col-md-12" >
              <button type="button" id="submit_dummies" name="submit" class="btn center-block dv_submit btn-primary"   >Charge More Dummies</button>
    </div>



 