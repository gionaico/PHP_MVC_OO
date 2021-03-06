
<script src="module/homepage/view/js/create_search.js"></script>
<script src="module/homepage/view/js/homepage.js"></script>
<div class="container">
    
    <h2 class="aboutus-title">Search Results</h2>
    <div class="row">
        <div class="form-group">
            <div class="container">
                <div class="col-md-10 contFiltro">
                    
                
                <div class="row">
                    <div class="col-md-4"> <!-- col-md-offset-3 -->
                        <select id="province_home" name="province_home" class="form-control input-md color_input sombra" required="">
                            <option selected="">Select Province</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="city_home" name="city_home" class="form-control input-md color_input sombra" required="">
                            <option selected="">Select City</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <select id="product_type" name="product_type" class="form-control input-md color_input sombra">
                            <option selected="">Product Type:</option>
                            <option>Sale Vehicle</option>
                            <option>Car spare parts</option>
                            <option>Servicies for Vehicles</option>
                            <!-- </script> -->
                        </select>                                                    
                    </div>

                    
                </div>
                <br>
                <div class="row">
                    


                    <div class="col-md-4  ">
                         <label for="amount">Maximum price:</label>
                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; width:100px; font-weight:bold;">
                          
                        <div id="slider-range-min"></div>
                    </div>

                    <div class="col-md-8 center-block">
                        <div class="center-block " >
                            <label for="botones">Publication Date</label>
                            <br>
                            
                            <div class="btn-group" id="botones">
                              <button type="button" class="btn btn-warning publication_date" id="1" >Today</button>
                              <button type="button" class="btn btn-primary publication_date" id="2" >This week</button>
                              <button type="button" class="btn btn-success publication_date" id="3" >This month</button>
                              <button type="button" class="btn btn-danger publication_date" id="4" >This year</button>
                              
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-2">
                        <select id="order" name="order" class="form-control input-md color_input sombra">
                            <option selected="">Order by</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest Arrivals</option>                              
                        </select>                                                   
                    </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- <div class="row"> -->
        <!-- <button id="gio" class='btn btn-primary prodToBasket' type='button'>Add to<span class='glyphicon glyphicon-shopping-cart'></span>    </button> -->
    <!-- </div> -->
    <div id="resultado">
        
    </div>
</div>






<div class="modal fade"  id="modal_productsDetails" tabindex="-1" role="dialog" aria-labelledby="modal_prodDetails" hidden>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal_prodDetails"><span class="glyphicon glyphicon-pushpin"></span><strong> Product Details</strong><i ></i> </h4>
            </div>
            <div class="modal-body" id="container">
                
                <div class="form-group ">
                    <strong>Description:&nbsp;&nbsp;</strong><p id="description"></p>
                </div>
				
				<div class="form-group ">
                    <p ><strong>Title:&nbsp;&nbsp;</strong><i id="title"></i></p>
                </div>

                <div class="form-group ">
                    <p><strong>country:&nbsp;&nbsp;</strong><i id="country"></i></p>
                </div>

                <div class="form-group ">
                    <p><strong>province:&nbsp;&nbsp;</strong><i id="province"></i></p>
                </div>

                <div class="form-group ">
                    <p><strong>city:&nbsp;&nbsp;</strong><i id="city"></i></p>
                </div>

                <div class="form-group ">
                    <p><strong>address:&nbsp;&nbsp;</strong><i id="address"></i></p>
                </div>

                <div class="form-group ">
                    <p><strong>phone:&nbsp;&nbsp;</strong><i id="phone"></i></p>
                </div>

                <div class="form-group ">
                    <p><strong>email:&nbsp;&nbsp;</strong><i id="email"></i></p>
                </div>
                
            </div>

             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>                
            </div>
        </div>
    </div>
</div>