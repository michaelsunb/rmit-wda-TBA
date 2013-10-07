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
   <?php echo $this->Form->create('User', array('url' => array('controller'=>'loginregister','action' => 'add'))); ?>
   <h2 style="padding-top:0px"><?= __('Add User'); ?></h2>
   <p>
      <h4 style="padding-top:0px">Email</h4>
      <?= $this->Form->input('user_email', array('id'=>'registerEmail','name'=>'registerEmail','label' => false)); ?>
      <span id="registerEmailError" style="color:red"></span>
   </p>
   <p>
      <h4 style="padding-top:0px">Username</h4>
      <?= $this->Form->input('screen_name', array('id'=>'registerUsername','name'=>'registerUsername','label' => false)); ?>
      <span id="registerUsernameError" style="color:red"></span>
   </p>
   <p>
      <h4 style="padding-top:0px">Password</h4>
      <?= $this->Form->input('password', array('id'=>'registerPassword','name'=>'registerPassword','label' => false)); ?>
      <span id="registerPasswordError" style="color:red"></span>
   </p>
   <p>
      <h4 style="padding-top:0px">Confirm Password</h4>
      <?= $this->Form->input('registerPasswordConfirm', array('type'=>'password',
                                                              'id'=>'registerPasswordConfirm',
                                                              'name'=>'registerPasswordConfirm',
                                                              'label' => false)); ?>
      <span id="registerPasswordConfirmError" style="color:red"></span>
   </p>
   <!--registerJs is visible when javascript is enabled-->
   <input type="button" id="registerJs" value="Register" onclick="registerUser();" style="display:none"/>
   <!--registerPhp is visible when javascript is disabled-->
   <?= $this->Form->input('Register', array('type'=>'submit','id'=>'registerPhp','label' => false)); ?>
   <?= $this->Form->end(); ?>
</div>
