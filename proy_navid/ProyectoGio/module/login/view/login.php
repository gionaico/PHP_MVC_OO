<script src="module/login/view/js/login.js"></script>
<br>
<br>
<br>


<div class="modal fade"  id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" hidden>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2"><span class="glyphicon glyphicon-user"></span><strong> LOGIN </strong><i id="user_l"></i> </h4>
            </div>
            <div class="modal-body" id="container">
                
                <div class="form-group infoInLogin" id="info_logPro" style="display: none;">
                    <p class="text-center">Before to intro your product, please you have to make login. If you are not registered, please register bofore to make login.</p>
                </div>

                <div class="form-group infoInLogin" id="info_pay" style="display: none;">
                    <p class="text-center">Before to pay your product, please you have to make login. If you are not registered, please register bofore to make login.</p>
                </div>

                <div class="form-group ">
                    <label class="control-label " for="user_log">Userr name</label>  
                    <input id="user_log" name="user_log" type="text" placeholder="usuario98" value="" class="form-control input-md color_input" required="required" value="">
                    <span id="sp_user_log" ></span>
                </div>

                <div class="form-group ">
                    <label class="control-label" for="password_log">Password:</label>
                    <input id="password_log" name="password_log" type="password" class="form-control input-md color_input" placeholder="****************" required=""  value="">
                    <span class="help-block"><p id="characterLeft" class="help-block ">Use Capital letters, lower case and signs as /, +, _, -</p></span> 
                    
                </div>

                <a href="#" title="">Forgot your password?</a><br><br>
                <a href="index.php?page=sing_in&op=create" title=""><button type="button" class="btn btn-primary user_delete_ok" id="register">Register Now</button></a>
            </div>

             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="submit_login">Login</button>
            </div>
        </div>
    </div>
</div>