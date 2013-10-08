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