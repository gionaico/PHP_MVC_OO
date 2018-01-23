   <!-- libreria Dropzone -->
  <script type="text/javascript" src="view/dropzone/downloads/dropzone.min.js"></script>
  <link rel="stylesheet" type="text/css" href="view/dropzone/downloads/css/dropzone.css">
  <script type="text/javascript" src="module/sing_in/view/createUpdate_user/model/user.js">  </script>






  <br> <br><br><br><br>

  <form class="form-horizontal form" autocomplete="on" method="POST" id="create" name="create_form">
    <fieldset>
  
      <!-- Form Name -->
        <div class="container">
              <div class="form-group ">
                <div class="col-md-3">
                     <h2 class="aboutus-title" id="form_type" >Form Register</h2>

                 </div>
              </div>
        
          <!-- //////////////////////////////////////////////////////////////////// -->
          <div class="col-md-1">
          </div>
          <!-- //////////////////////////////////////////////////////////////////// -->
          <div class="col-md-4">

              <div class="form-group ">
                <label class="control-label " for="un">Userrr name</label>  
                <input id="un" name="un" type="text" placeholder="Please use numbers, leters and -_" value="" class="form-control input-md color_input" required="required" value="">
                <span id="sp_un" ></span>
              </div>

              <div class="form-group ">
                <label class="control-label " for="fn">First name1:</label>  
                <input id="fn" name="fn" type="text" placeholder="Use just letters" class="form-control input-md color_input"  required="" value="">
                <span id="sp_fn" ></span>
              </div>

              <div class="form-group ">
                <label class="control-label" for="ln">Last name:</label>  
                <input id="ln" name="ln" type="text" placeholder="Use just letters" class="form-control input-md color_input"  required="" value="">
                <span id="sp_ln"></span>
              </div>

              <div class="form-group ">
                <label class="control-label" for="dni">DNI:</label>  
                <input id="dni" name="dni" type="text" placeholder="8 numbers, 1 Capital letter whithout spaces. Ex: 48116641S" class="form-control input-md color_input" required="" value="">
                <span id="sp_dni"></span>
              </div>

              <div class="form-group ">
                <label class="control-label" for="dni">Date of Birth:</label>  
                <input id="birth_date" name="birth_date" type="text" placeholder="mm/dd/yyyy" class="form-control input-md color_input" required="" value="">
                <span id="sp_birth_date"></span>
              </div>

              <div class="form-group ">
                <label class="control-label " for="genere">Genere:</label>  
                <div> 
                    <label class="radio-inline" for="genere-0">
                      <input type="radio" name="genere" class="genere" value="Man" checked> Man
                    </label> 
                    <label class="radio-inline" for="genere-1">
                      <input type="radio" name="genere" class="genere" value="Woman"> Woman
                    </label>
                </div>
              </div>

              <div class="form-group ">
                <label class="control-label" for="country">Country:</label>  
                <select id="country" name="country" class="form-control input-md color_input" required="">
                    <option selected="">Select country</option>
                    <option>Spain</option>
                    <option>Portugal</option>
                    <option>Italy</option>
                </select>
                <span id="sp_birth_date"></span>
              </div>



          </div>
    <!-- //////////////////////////////////////////////////////////////////// -->
          <div class="col-md-2">
          </div>
    <!-- //////////////////////////////////////////////////////////////////// -->
          <div class="col-md-4">

              <div class="form-group ">
                <label class="control-label" for="add1">Address 1:</label>  
                <input id="add1" name="add1" type="text" placeholder="Street Old Kent 180"   class="form-control input-md color_input" required="" value="">
                <span id="sp_add1"></span>
              </div>
              
              <div class="form-group ">
                <label class="control-label" for="zip">Zip Code:</label>  
                <input id="zip" name="zip" type="text" placeholder="4 Numbers. Ex: 46000" class="form-control input-md color_input" required="" value="">
                <span id="sp_zip"></span>
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
                <label class="control-label" for="password">Password:</label>
                <input id="password" name="password" type="password" placeholder="Min 8 carcaters.1 capital and extrange caracters as - ? _" class="form-control input-md color_input" required=""  value="">
                <span id="sp_password"></span>
              </div>

              <div class="form-group ">
                <label class="control-label" for="cmpny">Company:</label>
                <input id="cmpny" name="cmpny" type="text"  placeholder="You can use numbesrs and letters" class="form-control input-md color_input" required="" value="">
                <span id="sp_cmpny"></span>
              </div>

              <div class="form-group ">
                <label class="control-label">Hobbies:</label>
                <div id="div_hobbies">
                    <label class="checkbox-inline"  >
                          <input class="gio_checkbox " type="checkbox" name= "hobbies"  value="Motorbike"/>Motorbikes
                    </label> 
                    <label class="checkbox-inline"  >
                          <input class="gio_checkbox " type="checkbox" name= "hobbies" value="Trucks"/>Trucks
                    </label>
                    <label class="checkbox-inline"  >
                          <input class="gio_checkbox " type="checkbox" name= "hobbies" value="Cars"/>Cars
                    </label>
                </div>
                <span id="sp_cmpny"></span>
              </div>

    <!--           <div class="form-group ">
                <label class="control-label" for="message">Observations:</label>
                <textarea class="form-control color_input" type="textarea" name="message" id="message" placeholder="Message" maxlength="350" rows="7"></textarea>
                <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit 350 caracters</p></span>  
              </div> -->
<!-- 
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
              </div> -->

                 
          </div> 
        </div>
      </div>

      <div class="form-group">
          <label class="col-md-4 control-label" for="submit"></label>
          <div class="col-md-4 dv_submit" >
              <button type="button" id="submit" name="submit" class="btn center-block dv_submit btn-warning"   >SUBMIT</button>
          </div>
          <div class="col-md-4">
              <span id="sp_submit""></span>
          </div>
      </div>

   </fieldset>
  </form>




































 <!--  <div class="form-group ">
    <label class="col-md-4 control-label " for="un">Userrr name:</label>  
    <div class="col-md-4">
      <input id="un" name="un" type="text" placeholder="Please use numbers, leters and -_" value="" class="form-control input-md" required="required" value="">
    </div>
    <div class="col-md-4" id="div_un">
        <span id="sp_un" ></span>
    </div>
  </div>


  <div class="form-group">
    <label class="col-md-4 control-label " for="fn">First name1:</label>  
    <div class="col-md-4">
        <input id="fn" name="fn" type="text" placeholder="Use just letters" class="form-control input-md color_input"  required="" value="">
    </div>
     <div class="col-md-4" id="div_fn">
            
      <span id="sp_fn"></span>
    </div>
  </div>
  


    <div class="form-group">
      <label class="col-md-4 control-label" for="ln">Last name:</label>  
      <div class="col-md-4">
          <input id="ln" name="ln" type="text" placeholder="Use just letters" class="form-control input-md color_input"  required="" value="">
      </div>
       <div class="col-md-4" id="div_fn">
          
      <span id="sp_ln"></span>
    </div>
    </div>
    



    <div class="form-group">
      <label class="col-md-4 control-label" for="dni">DNI:</label>  
      <div class="col-md-4">
      <input id="dni" name="dni" type="text" placeholder="8 numbers, 1 Capital letter whithout spaces. Ex: 48116641S" class="form-control input-md color_input" required="" value="">
      </div>
      <div class="col-md-4" id="div_dni">
          
      <span id="sp_dni"></span>
    </div>
    </div>



    <div class="form-group">
      <label class="col-md-4 control-label" for="dni">Date of Birth:</label>  
      <div class="col-md-4">
      <input id="birth_date" name="birth_date" type="text" placeholder="mm/dd/yyyy" class="form-control input-md" required="" value="">
      </div>
      <div class="col-md-4" id="div_dni">
          
      <span id="sp_birth_date"></span>
    </div>
    </div>



    <div class="form-group">
      <label class="col-md-4 control-label " for="genere">Genere:</label>
      <div class="col-md-4"> 
        <label class="radio-inline" for="genere-0">
          <input type="radio" name="genere" class="genere" value="Man" checked>
          Man
        </label> 
        <label class="radio-inline" for="genere-1">
          <input type="radio" name="genere" class="genere" value="Woman">
          Woman
        </label>
      </div>
    </div>



    <div class="form-group">
      <label class="col-md-4 control-label" for="country">Country:</label>
      <div class="col-md-4">
        <select id="country" name="country" class="form-control input-md" required="">
          <option selected>Select country</option>
          <option>Spain</option>
          <option>Portugal</option>
          <option>Italy</option>
        </select>
        
      </div>
       <div class="col-md-4" id="div_country">
                 
        </div> 
    </div>



    <div class="form-group">
      <label class="col-md-4 control-label" for="add1">Address 1:</label>  
      <div class="col-md-4">
      <input id="add1" name="add1" type="text" placeholder="Street Old Kent 180"   class="form-control input-md" required="" value="">
        
      </div>
      <div class="col-md-4" id="div_add1">
          
      <span id="sp_add1"></span>
    </div>      
    </div>



    <div class="form-group">
      <label class="col-md-4 control-label" for="zip">Zip Code:</label>  
      <div class="col-md-4">
      <input id="zip" name="zip" type="text" placeholder="4 Numbers. Ex: 46000" class="form-control input-md" required="" value="">
        
      </div>
      <div class="col-md-4" id="div_zip">
            
      <span id="sp_zip"></span>
    </div>
    </div>



    <div class="form-group">
      <label class="col-md-4 control-label" for="phone">Number Phone:</label>  
      <div class="col-md-4">
      <input id="phone" name="phone" type="tel" placeholder="9 Numbers. Ex: 602145478"  class="form-control input-md" required="" value="">
        
      </div>
      <div class="col-md-4" id="div_phone">
            
      <span id="sp_phone"></span>
    </div>
    </div>
    


    <div class="form-group">
      <label class="col-md-4 control-label" for="email">Email:</label>  
      <div class="col-md-4">
      <input id="email" name="email" type="email" placeholder="joe_24@mail.com" class="form-control input-md" required="" value="">
        
      </div>
      <div class="col-md-4" id="div_email">
            
      <span id="sp_email"></span>
    </div>
    </div>


    <div class="form-group">
      <label class="col-md-4 control-label" for="password">Password:</label>  
      <div class="col-md-4">
      <input id="password" name="password" type="password" placeholder="Min 8 carcaters.1 capital and extrange caracters as - ? _" class="form-control input-md" required=""  value="">
        
      </div>
      <div class="col-md-4" id="div_password">
            
      <span id="sp_password"></span>
    </div>
    </div>


    <div class="form-group">
      <label class="col-md-4 control-label" for="cmpny">Company:</label>  
      <div class="col-md-4">
      <input id="cmpny" name="cmpny" type="text"  placeholder="You can use numbesrs and letters" class="form-control input-md" required="" value="">
        
      </div>
      <div class="col-md-4" id="div_cmpny">
            
      <span id="sp_cmpny"></span>
    </div>
    </div>
    


    <div class="form-group">
      <label class="col-md-4 control-label">Hobbies:</label>
      <div class="col-md-4"> 
        <label class="checkbox-inline"  >
            <input class="gio_checkbox" type="checkbox" name= "hobbies"  value="Motorbike"/>Motorbikes
        </label> 
        <label class="checkbox-inline"  >
            <input class="gio_checkbox" type="checkbox" name= "hobbies" value="Trucks"/>Trucks
        </label>
        <label class="checkbox-inline"  >
            <input class="gio_checkbox" type="checkbox" name= "hobbies" value="Cars"/>Cars
        </label>
      </div>
      <div class="col-md-4 " id="div_hobbies">
        
              <span id="sp_hobbies"></span>
  
    </div>
    </div>

    

    <div class="form-group">
        <label class="col-md-4 control-label" for="message">Observations:</label>
        <div class="col-md-4">
            <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Message" maxlength="350" rows="7"></textarea>
            <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit 350 caracters</p></span>  
        </div>                  
    </div>  

    <div class="form-group">
        <label class="col-md-4 control-label" >Images:</label>

        <div class="col-md-4">
          <div id="dropzone" class="dropzone"></div>
        </div>
        <div class="col-md-4">
              <span id="sp_dropzone"></span>
        </div>
    </div>

    <div class="form-group" >
       <label class="col-md-4 control-label" ></label>
       <div class="col-md-4" >
          <div id="progress">
               <div id="bar"></div>
               <div id="percent">0%</div >
          </div>
      </div>

       <div class="col-md-4" >
         <div class="msg"></div>
      </div>

    </div>



  
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-4 dv_submit" >
      <button type="button" id="submit" name="submit" class="btn center-block dv_submit"   >SUBMIT</button>
    </div>
    <div class="col-md-4">
        <span id="sp_submit""></span>
    </div>
  </div> -->
  