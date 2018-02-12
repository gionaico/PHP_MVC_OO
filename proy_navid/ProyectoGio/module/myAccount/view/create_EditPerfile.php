<script type="text/javascript" src="module/myAccount/view/js/EditPerfile.js"></script>

<div class="container">
	<div class="row">
          <div class="col-md-5">
                <h2 class="aboutus-title">Edit Perfile</h2>
        </div>
    </div>

	<div class="row">		
		<div class="col-md-offset-3 col-md-6 " id="infInicial">	

			<div class="list-group">
				  <div href="#" class="list-group-item" style="height: 80px;">
				  	<div class="col-md-10">
					  	<strong>Name:</strong>
					  	<p id="pName"></p>
				  		
				  	</div>
				  	<div class="col-md-2">
				  		<button id="btn_name" class="btn btn-default">Edit</button>
				  	</div>
				  </div>
				  
				  <div href="#" class="list-group-item" style="height: 80px;">
					<div class="col-md-10">
					  	<strong>Email:</strong>
					  	<p id="pEmail"></p>
				  	</div>
				  	<div class="col-md-2">
				  		<button id="btn_email" class="btn btn-default">Edit</button>
				  	</div>
				  </div>
				  
				  <div href="#" class="list-group-item" style="height: 80px;">
					<div class="col-md-10">  	
					  	<strong>Mobile Phone Number:</strong>
					  	<p id="pMobile"></p>
				  	</div>
				  	<div class="col-md-2">
				  		<button id="btn_mobile" class="btn btn-default">Edit</button>
				  	</div>
				  </div>

				  <div href="#" class="list-group-item" style="height: 80px;">
					<div class="col-md-10">  	
					  	<strong>Password:</strong>
					  	<p id="pPassword"></p>
				  	</div>
				  	<div class="col-md-2">
				  		<button id="btn_pass" class="btn btn-default">Edit</button>
				  	</div>
				  </div>
			</div>
			
			<div class="">
				<a href="index.php?page=myAccount&view=myAccount" class="btn btn-success">Done</a>
			</div>
		</div>



			<div class="col-md-offset-3 col-md-6 " id="divEdname" style="display:none">						
				<div class="list-group">
					  <div href="#" class="list-group-item" style="height: 250px;">					  	
						  	<p>If you want to change the name associated with your Us as customer account, you may do so below. Make sure that you click the Save Changes button when you have finished.</p>
						  	<br>
						  	<div class="row">
						  		<div class="col-md-5">
								  	<strong>New Name:</strong>
								  	<input type="" id="new_name" name="">
								  	<span id="sp_new_name"></span>
						  			
						  		</div>

						  		<div class="col-md-5">
						  			<strong>New last Name:</strong>
								  	<input type="" id="new_lastName" name="">
								  	<span id="sp_new_lastName"></span>
						  		</div>
						  	</div>
					  		<br>
					  	
					  	
					  		<button id="saveName" class="btn btn-warning" style="color:black; border-color: black;">Save Changes</button>
					  	
					  </div>
				  </div>
			</div>



			<div class="col-md-offset-3 col-md-6 " id="divEdEmail" style="display:none">				
				<div class="list-group">
					  <div href="#" class="list-group-item" style="height: 210px;">					  	
						  	<p>If you want to change the name associated with your Us as customer account, you may do so below. Make sure that you click the Save Changes button when you have finished.</p>
						  	<br>
						  	<strong>New Email:</strong>
						  	<input type="" id="new_email" name="">
						  	<span id="sp_new_email"></span>				  			
					  		<br><br>					  						  	
					  		<button id="saveEmail" class="btn btn-warning" style="color:black; border-color: black;">Save Changes</button>					  	
					  </div>
				  </div>
			</div>
	


			<div class="col-md-offset-3 col-md-6 " id="divPass" style="">						
				<div class="list-group">
					  <div href="#" class="list-group-item" style="height: 400px;">					  	
						  	<p>If you want to change the password associated with your Us as customer account, you may do so below. Make sure that you click the Save Changes button when you have finished. <br><br>Format:<br>- Min 1 letter mayus (A-Z)<br>- Min 1 letter minus (a-z) <br>- Min 1 numbrer <br>- Min 1 strage caracter ( -, +, _) </p>

						  	<br>
						  	<div class="row">
						  		<div class="col-md-5">
								  	<strong>Current password:</strong>
								  	<input type="password" id="current_pass" name="">
								  	<span id="sp_current_pass"></span>
						  			
						  		</div>

						  		<div class="col-md-5">
						  			<strong>New password</strong>
								  	<input type="password" id="new_pass" name="">
								  	<span class="sp_new_pass"></span>
						  		</div>
						  	</div>
					  		<br>

						  	<div class="row">
						  		<div class="col-md-offset-5 col-md-5">
						  			<strong>Re-enter new password</strong>
								  	<input type="password" id="Re_enterNew_pass" name="">
								  	<span class="sp_new_pass"></span>
						  		</div>
						  	</div>
					  	
					  	
					  		<button id="savePass" class="btn btn-warning" style="color:black; border-color: black;">Save Changes</button>
					  	
					  </div>
				  </div>
			</div>




	</div>

</div>