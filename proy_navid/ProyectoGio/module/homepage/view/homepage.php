
<script type="text/javascript" src="module/homepage/view/js/homepage.js"></script>
    
       
<div class="container">
	<div class="row mi_slider">
        <div class="carousel slide"  id="carousel-1">
        	
        	<ol class="carousel-indicators">
				<li data-target="#carousel-1" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-1" data-slide-to="1"></li>
				<li data-target="#carousel-1" data-slide-to="2"></li>
			</ol>

            <div class="carousel-inner" role="listbox">
                <div class="item imgnormalizada active" >
                        <a href="#">
                            <img src="view/img/homepage/coche.jpg" class="img-responsive ">
                        </a>
                    <div class="carousel-caption">

						<h3>Lorem ipsum dolor sit amet.</h3>
						<p>Lorem ipsum dolor.</p>
					</div>
                </div>
                
                <div class="item imgnormalizada">
                    	<a href="#">
                    		<img src="view/img/homepage/motos.jpg" class="img-responsive ">
                    	</a>
                    <div class="carousel-caption">
						<h3>Lorem ipsum dolor sit amet.</h3>
						<p>Lorem ipsum dolor.</p>
					</div>
                </div>

                <div class="item imgnormalizada">
                    	<a href="#">
                    		<img src="view/img/homepage/camiones.jpg" class="img-responsive ">
                    	</a>
                    <div class="carousel-caption">
						<h3>Lorem ipsum dolor sit amet.</h3>
						<p>Lorem ipsum dolor.</p>
					</div>
                </div>
                
            </div>

            <a class="left carousel-control" href="#carousel-1" data-slide="prev">
            	<i class="glyphicon glyphicon-chevron-left"></i>
            </a>
            <a class="right carousel-control" href="#carousel-1" data-slide="next">
            	<i class="glyphicon glyphicon-chevron-right"></i>
            </a>

        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="form-group">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1"> <!-- col-md-offset-3 -->
                <select id="province_home" name="province_home" class="form-control input-md color_input" required="">
                    <option selected="">Select Province</option>
                </select>
            </div>
            <div class="col-md-3">
                <select id="city_home" name="city_home" class="form-control input-md color_input" required="">
                    <option selected="">Select City</option>
                </select>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input class="form-control color_input" id="search_home" list="datalist_search" name="search_home" placeholder="Search for" required/>
                    <span class="input-group-btn">
                        <a type="submit" href="?page=homepage&view=search" class="btn btn-primary " id="btn_search"><i class="glyphicon glyphicon-search"></i></a>
                    </span>
                    <datalist id="datalist_search">
                        <option value="dddd"></option>
                        
                    </datalist>
                </div>
            </div>
        </div>
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


<div class="container" id="resultado">
    hola mundo
</div>


<div class="form-group ">
    <div class="container paddingTB60" id="dummies">
        <?php 
            foreach ($rdo as $row) {
                
                echo '<div class="row" id="f1">';

                echo '</div>';
            }
         ?>
        <div class="row" id="f1">
            <div class="col-md-3">
                <div class="team-img thumbnail">
                    <img src="view/img/servicies/servicies1.jpg">
                    <div class="team-content">    
                        <h3>Mazda</h3>
                        <div class="border-team"></div>
                            <p><strong>Model: </strong><?php echo $row['title'] ; ?></p>
                            <p><strong>Year: </strong>2003</p>
                            <p><strong>Color: </strong>Green-lemon</p>
                            <p><strong>Cobustible: </strong>Gasoil</p>
                            <p><strong>Owner type: </strong>Agency</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-img thumbnail">
                    <img src="view/img/servicies/servicies1.jpg">
                    <div class="team-content">    
                        <h3>Mazda</h3>
                        <div class="border-team"></div>
                            <p><strong>Model: </strong>sgs</p>
                            <p><strong>Year: </strong>2003</p>
                            <p><strong>Color: </strong>Green-lemon</p>
                            <p><strong>Cobustible: </strong>Gasoil</p>
                            <p><strong>Owner type: </strong>Agency</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-img thumbnail">
                    <img src="view/img/servicies/servicies1.jpg">
                    <div class="team-content">    
                        <h3>Mazda</h3>
                        <div class="border-team"></div>
                            <p><strong>Model: </strong>sgs</p>
                            <p><strong>Year: </strong>2003</p>
                            <p><strong>Color: </strong>Green-lemon</p>
                            <p><strong>Cobustible: </strong>Gasoil</p>
                            <p><strong>Owner type: </strong>Agency</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-img thumbnail">
                    <img src="view/img/servicies/servicies1.jpg">
                    <div class="team-content">    
                        <h3>Mazda</h3>
                        <div class="border-team"></div>
                            <p><strong>Model: </strong>sgs</p>
                            <p><strong>Year: </strong>2003</p>
                            <p><strong>Color: </strong>Green-lemon</p>
                            <p><strong>Cobustible: </strong>Gasoil</p>
                            <p><strong>Owner type: </strong>Agency</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="f2">
            <div class="col-md-3">
                <div class="team-img thumbnail">
                    <img src="view/img/servicies/servicies1.jpg">
                    <div class="team-content">    
                        <h3>Mazda</h3>
                        <div class="border-team"></div>
                            <p><strong>Model: </strong>sgs</p>
                            <p><strong>Year: </strong>2003</p>
                            <p><strong>Color: </strong>Green-lemon</p>
                            <p><strong>Cobustible: </strong>Gasoil</p>
                            <p><strong>Owner type: </strong>Agency</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-img thumbnail">
                    <img src="view/img/servicies/servicies1.jpg">
                    <div class="team-content">    
                        <h3>Mazda</h3>
                        <div class="border-team"></div>
                            <p><strong>Model: </strong>sgs</p>
                            <p><strong>Year: </strong>2003</p>
                            <p><strong>Color: </strong>Green-lemon</p>
                            <p><strong>Cobustible: </strong>Gasoil</p>
                            <p><strong>Owner type: </strong>Agency</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-img thumbnail">
                    <img src="view/img/servicies/servicies1.jpg">
                    <div class="team-content">    
                        <h3>Mazda</h3>
                        <div class="border-team"></div>
                            <p><strong>Model: </strong>sgs</p>
                            <p><strong>Year: </strong>2003</p>
                            <p><strong>Color: </strong>Green-lemon</p>
                            <p><strong>Cobustible: </strong>Gasoil</p>
                            <p><strong>Owner type: </strong>Agency</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="team-img thumbnail">
                    <img src="view/img/servicies/servicies1.jpg">
                    <div class="team-content">    
                        <h3>Mazda</h3>
                        <div class="border-team"></div>
                            <p><strong>Model: </strong>sgs</p>
                            <p><strong>Year: </strong>2003</p>
                            <p><strong>Color: </strong>Green-lemon</p>
                            <p><strong>Cobustible: </strong>Gasoil</p>
                            <p><strong>Owner type: </strong>Agency</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="col-md-12" >
              <button type="button" id="submit_dummies" name="submit" class="btn center-block dv_submit btn-primary"   >Charge More Dummies</button>
    </div>



 