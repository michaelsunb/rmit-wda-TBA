<?echo $this->Html->script('validateLoginReg'); ?>
<div class="list-container-side">
   <!--Form for logging in -->
   <h2 style="padding-top:0px">Login</h2>					
   <!--form simply reloads the page - where should this form direct the user?-->
   <?= $this->Form->create('User', array('id'=>'login', 'url'=>array('controller'=>'users','action'=>'login'))); ?>
      <!--Each input field has an error-message section below it. The javascript creates messages from them with the innerHTML variable-->
      <p>
         <h4 style="padding-top:0px">User Name</h4>	 
         <?= $this->Form->input('username', array('id'=>'loginUsername','label' => false)); ?>
         <span id="loginUsernameError" style="color:red"></span>
      </p>
      <p>
         <h4 style="padding-top:0px">Password </h4>
         <?= $this->Form->input('password', array('id'=>'loginPassword','label' => false)); ?>
         <span id="loginPasswordError" style="color:red"></span>
      </p>
      <p>
         <!--loginJs is visible when javascript is enabled-->
         <?= $this->Form->input('Log in', array('type'=>'button','id'=>'loginJs', 'onclick' => 'return loginUser();',
             'label' => false, 'style' => array('display: none'))); ?> 
         <!--loginPhp is visible when javascript is disabled-->
         <?= $this->Form->input('Log in', array('type'=>'submit','id'=>'loginPhp','label' => false)); ?>
         <?php echo $this->Form->end(); ?>
      </p>
   </form>
</div>
<div class="list-container-side">
   <!--Form for registering -->	
   <?php echo $this->Form->create('User', array('id'=>'register', 'url' => array('controller'=>'loginregister','action' => 'add'))); ?>
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
   <?= $this->Form->input('Register', array('type'=>'button','id'=>'registerJs', 'onclick' => 'return registerUser();',
                'label' => false, 'style' => array('display: none'))); ?> 
   <!--registerPhp is visible when javascript is disabled-->
   <?= $this->Form->input('Register', array('type'=>'submit','id'=>'registerPhp','label' => false)); ?>
   <?= $this->Form->end(); ?>
</div>
