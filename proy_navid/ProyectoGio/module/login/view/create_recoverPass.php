
<script src="module/login/view/js/recoverPass.js" type="text/javascript"></script>
<div class="container">
	<div class="row">
          <div class="col-md-5">
                <h2 class="aboutus-title">Recover password</h2>
        </div>
    </div>

	<div class="row">		
		<div class="col-md-offset-2 col-md-7 " id="campoUserName">	

			<div class="list-group">
				  <div href="#" class="list-group-item" style="height: 100px;">
				  	<div class="col-md-9">
				  		<div class="col-md-12">
							<label  for="myUserName">User name:</label>				  			
				  		</div>
				  		
				  		<div class="col-md-12">				  			
							<input type="text" class="col-md-12" id="myUserName" name="">
				  		</div>

						<div class="col-md-12">
						 	<span id="sp_myUserName"></span>								
						</div>
					  					  		
				  	</div>
				  	<div class="col-md-3">
				  		<br>
				  		<button id="btn_sendCode" class="btn btn-default">Send code</button>
				  	</div>
				  </div>
				  
			</div>
			
			<div class="">
				<a href="index.php" class="btn btn-success">Go home</a>
			</div>
		</div>


		<div class="col-md-offset-2 col-md-7 " id="verifyCode" style="display: none">	

			<div class="list-group">
				  <div href="#" class="list-group-item" style="height: 120px;">
				  	<p>Please check your email we have sent a code to recover your password.</p>
				  	<div class="col-md-9">
				  		<div class="col-md-12">
							<label  for="myCode">Code:</label>				  			
				  		</div>
				  		
				  		<div class="col-md-12">				  			
							<input type="password" class="col-md-12" id="myCode" name="">
				  		</div>

						<div class="col-md-12">
						 	<span id="sp_myCode"></span>								
						</div>
					  					  		
				  	</div>
				  	<div class="col-md-3">
				  		<br>
				  		<button id="btn_verifyCode" class="btn btn-primary">Verify code</button>
				  	</div>
				  </div>
				  
			</div>
			
			<div class="">
				<a href="index.php" class="btn btn-success">Go home</a>
			</div>
		</div>





		<div class="col-md-offset-2 col-md-7 " id="IntroNewPass" style="display: none">	

			<div class="list-group">

				  <div href="#" class="list-group-item" style="height: 350px;">
				  	<p>If you want to change the password associated with us as customer account, you may do so below. Make sure that you click the Save Changes button when you have finished. <br><br>Format:<br>- Min 1 letter mayus (A-Z)<br>- Min 1 letter minus (a-z) <br>- Min 1 numbrer <br>- Min 1 strage caracter ( -, +, _) </p>
				  	<div class="row">
				  		<div class="col-md-6">
							<label  for="recoverPassw">New password:</label><br>				  			
							<input type="password" class="col-md-12" id="recoverPassw" name=""><br>
						 	<span id="sp_recoverPassw"></span>								
				  		</div>
				  		
				  		<div class="col-md-6">
							<label  for="re_recoverPassw">Re-enter new password:</label><br>				  			
							<input type="password" class="col-md-12" id="re_recoverPassw" name=""><br>
						 	<span id="sp_re_recoverPassw"></span>								
				  		</div>
					  					  		
				  	</div>

				  	

				  	<div class="row">
				  		<div class="col-md-12">
				  			<br>
				  			<button id="changePasswo" class="btn btn-warning col-md-12">Change password</button>
				  		</div>
				  	</div>
				  </div>
				  
			</div>
			
			<div class="">
				<a href="index.php" class="btn btn-success">Go home</a>
			</div>
		</div>


			


	</div>

</div>