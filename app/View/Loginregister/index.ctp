      <?php // include '../../include/headcontent.php'; ?>
      <title>Bandom -- Login/Register</title>
      <meta name="keywords" content="">
      <meta name="description" content="">    
	  
	<?php echo $this->Html->script('validate'); ?>
	<?php //include '../../include/header.php'; ?>
	<?php //include '../../include/menu.php'; ?>
      
	<div class="width900">
         <div class="shadow2">
            <div style="padding:5px;">              
               <div class="list-container">     
					<div class="list-container-side">
					<!--Form for logging in -->
						 <h2 style="padding-top:0px">Login</h2>					
					<!--form simply reloads the page - where should this form direct the user?-->
						<form id="login" method="get" action="<?php echo Router::url('/', true) . 'loginregister'; ?>">
						<!--Each input field has an error-message section below it. The javascript creates messages from them with the innerHTML variable-->
							<p>
								<h4 style="padding-top:0px">User Name</h4>	 
								<input type="text" id="loginUsername" name="loginUsername"/>
								<span id="loginUsernameError" style="color:red"></span>
							</p>
							<p>
								<h4 style="padding-top:0px">Password </h4>
								<input type="password" id="loginPassword" name="loginPassword"/>
								<span id="loginPasswordError" style="color:red"></span>
							</p>
							<p>
								<!--loginJs is visible when javascript is enabled-->
								<input type="button" id="loginJs" value="Login" onclick="loginUser()" style="display:none"/>
								<!--loginPhp is visible when javascript is disabled-->
                                                                 <input type="submit" id="loginPhp" value="Login"/>

							</p>
						</form>
					</div>            
					<div class="list-container-side">
                    <!--Form for registering -->	
                     	<h2 style="padding-top:0px">Register</h2>
					<!--form simply reloads the page - where should this form direct the user?-->
						<form id="register" method="post" action="<?php echo Router::url('/', true) . 'loginregister'; ?>">
						<!--Each input field has an error-message section below it. The javascript creates messages from them with the innerHTML variable-->
							<p>
								<h4 style="padding-top:0px">Email</h4>
								 <input type="text" id="registerEmail" name="registerEmail"/>
								<span id="registerEmailError" style="color:red"></span>
							</p>
							<p>
								<h4 style="padding-top:0px">Username</h4>
								 <input type="text" id="registerUsername" name="registerUsername"/>
								<span id="registerUsernameError" style="color:red"></span>
							</p>
							<p>
								<h4 style="padding-top:0px">Password</h4>
								<input type="password" id="registerPassword" name="registerPassword"/>
								<span id="registerPasswordError" style="color:red"></span>
							</p>
							<p>
								<h4 style="padding-top:0px">Confirm Password</h4>
								<input type="password" id="registerPasswordConfirm" name="registerPasswordConfirm"/>
								<span id="registerPasswordConfirmError" style="color:red"></span>
							</p>
							<p>
								<!--registerJs is visible when javascript is enabled-->
								<input type="button" id="registerJs" value="Register" onclick="registerUser()"; style="display:none"/>
								<!--registerPhp is visible when javascript is disabled-->
								 <input type="submit" id="registerPhp" value="Register"/>
							</p>
						</form>
                  	</div>
               </div>
            </div>
         </div>
      </div>
