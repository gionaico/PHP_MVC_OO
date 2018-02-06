
<script src="module/homepage/view/js/create_search.js"></script>
<script src="module/homepage/view/js/homepage.js"></script>
<div class="container">
    
    <h2 class="aboutus-title">Search Results</h2>
    <div class="row">
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
                                <a type="submit" href="#" class="btn btn-primary " id="btn_search"><i class="glyphicon glyphicon-search"></i></a>
                            </span>
                            <!-- index.php?page=homepage&view=search -->
                            <datalist id="datalist_search">
                                <option value="dddd"></option>
                                
                            </datalist>
                        </div>
                    </div>
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

                <div class="form-group depend_prodType">
                    <p><strong>brand:&nbsp;&nbsp;</strong><i id="brand"></i></p>
                </div>

                <div class="form-group depend_prodType">
                    <p><strong>model:&nbsp;&nbsp;</strong><i id="model"></i></p>
                </div>

                <div class="form-group depend_prodType">
                    <p><strong>year:&nbsp;&nbsp;</strong><i id="year"></i></p>
                </div>

                <div class="form-group depend_prodType">
                    <p><strong>combustible:&nbsp;&nbsp;</strong><i id="combustible"></i></p>
                </div>

                <div class="form-group depend_prodType">
                    <p><strong>color:&nbsp;&nbsp;</strong><i id="color"></i></p>
                </div>



               
                

                
            </div>

             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>                
            </div>
        </div>
    </div>
</div>