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