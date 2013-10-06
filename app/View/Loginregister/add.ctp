<div class="list-container-side">
   <!--Form for registering -->	
   <?php echo $this->Form->create('User', array('url' => array('controller'=>'loginregister','action' => 'add'))); ?>
   <h2 style="padding-top:0px"><?= __('Add User'); ?></h2>
   <p>
      <h4 style="padding-top:0px">Email</h4>
      <?= $this->Form->input('user_email', array('label' => false)); ?>
      <span id="registerEmailError" style="color:red"></span>
   </p>
   <p>
      <h4 style="padding-top:0px">Username</h4>
      <?= $this->Form->input('screen_name', array('label' => false)); ?>
      <span id="registerUsernameError" style="color:red"></span>
   </p>
   <p>
      <h4 style="padding-top:0px">Password</h4>
      <?= $this->Form->input('password', array('label' => false)); ?>
      <span id="registerPasswordError" style="color:red"></span>
   </p>
   <p>
      <h4 style="padding-top:0px">Confirm Password</h4>
      <?= $this->Form->input('registerPasswordConfirm', array('label' => false)); ?>
   </p>
   <?= $this->Form->end(__('Register')); ?>
</div>