   <!-- libreria Dropzone -->

  <script type="text/javascript" src="view/dropzone/downloads/dropzone.min.js"></script>
  <script type="text/javascript" src="module/products/view/js/products.js">  </script>
  <link rel="stylesheet" type="text/css" href="view/dropzone/downloads/css/dropzone.css">
   <!-- libreria Dropzone -->






  <br> <br><br><br><br>

  <form class="form-horizontal " method="POST" id="form" autocomplete="on">
    <fieldset>
  
      <!-- Form Name -->
        <div class="container">
         
          <div class="col-md-12">

              <div class="form-group ">
                <div class="col-md-12">
                     <h2 class="aboutus-title">ADD PRODUCT</h2>
                 </div>
              </div>
        
              <div class="col-md-12" id="div_dropzone">
                    <div class="form-group">
                        <label class="control-label" >Images:</label>
                        <div class="color_input">
                           <div id="dropzone" class="dropzone "></div>
                        </div>            
                        <div id="progress">
                                 <div id="bar"></div>
                                 <div id="percent">0%</div >
                        </div>
                        <div class="msg"></div>
                        <span id="sp_dropzone"></span>
                    </div>
              </div>

              <div class="col-md-5">

                  <div class="form-group ">
                    <label class="control-label " for="un">User name</label>  
                    <input id="un" name="un" type="text" placeholder="Please use numbers, leters and -_" value="" class="form-control input-md color_input" required="required" value="">
                    <span id="sp_un" ></span>
                  </div>

                  <div class="form-group ">
                    <label class="control-label" for="pbt">Publication Title</label>  
                    <input id="pbt" name="pbt" type="text" placeholder="EX: New Dishwasher"   class="form-control input-md color_input" required="" value="">
                    <span id="sp_pbt"></span>
                  </div>

                  <div class="form-group ">
                    <label class="control-label" for="country">Country:</label>  
                    <select id="country" name="country" class="form-control input-md color_input" required="">
                        <option selected="">Select country</option>
                    </select>
                    <span id="sp_country"></span>
                  </div>

                  <div class="form-group ">
                    <label class="control-label" for="province">Province:</label>  
                    <select id="province" name="province" class="form-control input-md color_input" required="">
                        <option selected="">Select province</option>
                    </select>
                    <span id="sp_province"></span>
                  </div>

                  <div class="form-group ">
                    <label class="control-label" for="city">City:</label>  
                    <select id="city" name="city" class="form-control input-md color_input" required="">
                        <option selected="">Select city</option>
                    </select>
                    <span id="sp_birth_date"></span>
                  </div>
  
                  <div class="form-group ">
                    <label class="control-label" for="add1">Address 1:</label>  
                    <input id="add1" name="add1" type="text" placeholder="Street Old Kent 180"   class="form-control input-md color_input" required="" value="">
                    <span id="sp_add1"></span>
                  </div>


                  <div class="form-group ">
                    <label class="control-label" for="phone">Number Phone:</label>
                    <input id="phone" name="phone" type="tel" placeholder="9 Numbers. Ex: 602145478"  class="form-control input-md color_input" required="" value="">
                    <span id="sp_phone"></span>
                  </div>


                  <div class="form-group ">
                    <label class="control-label" for="email">Email:</label>
                    <input id="email" name="email" type="email" placeholder="joe_24@mail.com" class="form-control input-md color_input" required="" value="">
                    <span id="sp_email"></span>
                  </div>


                  <div class="form-group ">
                    <label class="control-label" for="product_type">Product Type:</label>  
                    <select id="product_type" name="product_type" class="form-control input-md color_input" required="">
                        <option selected="">Product Type:</option>
                        <option>Sale Vehicle</option>
                        <option>Car spare parts</option>
                        <option>Servicies for Vehicles</option>
                        </script>
                    </select>
                    <span id="sp_product_type"></span>
                  </div>


              </div>


        <!-- //////////////////////////////////////////////////////////////////// -->
              <div class="col-md-2">
              </div>
        <!-- //////////////////////////////////////////////////////////////////// -->


              <div class="col-md-5">
                  


                  <div class="form-group sale_vehicle" id="div_brand" >
                    <label class="control-label" for="brand">Brand:</label>  
                    <select id="brand" name="brand" class="form-control input-md color_input"  disabled="true">
                        <option selected="">Select Brand</option>
                        <script>
                          var coches_brand= new Array("Mercedez","Mazda", "Toyora", "Bmw", "Ford", "Fiat", "Volvo", "Chevrolet", "Audi");
                          for(var i = 0; i < coches_brand.length-1; i++){
                            document.write('<option value="'+coches_brand[i]+'">'+coches_brand[i]+'</option>');
                          }
                        </script>
                        
                    </select>
                    <span id="sp_brand"></span>
                  </div>

                  <div class="form-group sale_vehicle" id="div_brand" >
                    <label class="control-label" for="brand">Model:</label>  
                    <select id="model" name="model" class="form-control input-md color_input"  disabled="true">
                        <option selected="">Select Model</option>
                        <script>
                          var coches_model= new Array("Mondeo","Alaska", "Fiesta", "Corola", "Bravo", "Uno", "Ranch", "Ibiza", "Monaco");
                          for(var i = 0; i < coches_model.length-1; i++){
                            document.write('<option value="'+coches_model[i]+'">'+coches_model[i]+'</option>');
                          }
                        </script>
                        
                    </select>
                    <span id="sp_model"></span>
                  </div>

                  <div class="form-group sale_vehicle" id="div_year" >
                    <label class="control-label" for="year">Year:</label>  
                    <select id="year" name="year" class="form-control input-md color_input"  disabled="true">
                      <option selected="">Select Year</option>
                        <script>
                          var myDate = new Date();
                          var year = myDate.getFullYear();
                          for(var i = 1950; i < year+1; i++){
                            document.write('<option value="'+i+'">'+i+'</option>');
                          }
                        </script>
                    </select>
                    <span id="sp_year"></span>
                  </div>
                  
                  <div class="form-group sale_vehicle" id="div_combustible" >
                    <label class="control-label" for="combustible">Combustible:</label>  
                    <select id="combustible" name="combustible" class="form-control input-md color_input"  disabled="true">
                        <option selected="">Select Combustible</option>
                        <option>Petrol</option>
                        <option>Gasoil</option>
                        <option>Hibrid</option>
                        <option>Electric</option>
                    </select>
                    <span id="sp_combustible"></span>
                  </div>


                  <div class="form-group sale_vehicle" id="div_color" >
                    <label class="control-label" for="color">Color:</label>  
                    <select id="color" name="color" class="form-control input-md color_input"  disabled="true">
                        <option selected="">Select Color</option>
                        <script>
                          var coches_color= new Array("Black","White", "Golden", "Silver", "Red", "Blue", "Green", "Yellow", "Purple");
                          for(var i = 0; i < coches_color.length-1; i++){
                            document.write('<option value="'+coches_color[i]+'">'+coches_color[i]+'</option>');
                          }
                        </script>
                        
                    </select>
                    <span id="sp_color"></span>
                  </div>


                  <div class="form-group ">
                    <label class="control-label" for="message">Description Product:</label>
                    <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit 350 caracters</p></span> 
                    <textarea class="form-control color_input" type="textarea" name="message" id="message" placeholder="Message" maxlength="350" rows="7"></textarea>
                    <span id="sp_message"></span> 
                  </div>

                  


                     
              </div> 
        </div>
        
        <div class="col-md-12">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4 dv_submit" >
                <button type="button" id="submit" name="submit" class="btn center-block dv_submit btn-warning"   >SUBMIT</button>
            </div>
            <div class="col-md-4">
                <span id="sp_submit""></span>
            </div>
        </div>

     </div>
      


   </fieldset>
  </form>