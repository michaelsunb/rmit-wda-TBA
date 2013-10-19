<!DOCTYPE html>
<html>
<head>
   <?php echo $this->Html->charset(); ?>

   <title>Bandom</title>
	
   <?php
      echo $this->Html->meta('icon');
   ?>
   
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

   <!-- Styles Start --> 
   <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
   <?php
      echo $this->fetch('meta');
      echo $this->Html->css('styles.css');

		echo $scripts_for_layout;
		
		echo $this->Js->writeBuffer(array('cache'=>TRUE));
	?>
   
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
   <!-- Styles End -->
</head>
<body>
   <div class="header" style="width:100%; float:left">
      <div class="width900">
         <a href="<? echo Router::url('/', true); ?>">
            <div style="float:left; width: 400px;"> 
               <h2>Bandom</h2>
               <div class="header-left">
                  <h1>Bringing Fans to the Bands</h1>
               </div>         
            </div>
         </a>
      </div>
   </div>
   <div class="menubar">
      <div class="width900">
         <div id='cssmenu'>
         <?= $this->Form->create('Search', array('type' => 'get','url'=>array('controller'=>'bands','action'=>'search')
            )); ?>
           <ul>
               <li class='active'>
               <span style="padding-left:5px;">
                  <?= $this->Form->input('search', array('type'=>'text','label' => false, 'div' => false)); ?>
               </span>
            </li>
            <li>
               <span class='button'>
                  <? $options = array('label'=>'Search','div' => false); ?>
                  <?= $this->Form->end($options); ?>
               </span>
            </li>
           </ul>
         <? if(!$authUser): ?>
         <?= $this->Form->create('User', array('id'=>'login', 'url'=>array('controller'=>'users','action'=>'login'))); ?>
           <ul>	
            <li>
               <span style="padding-left:340px;color:white;">
                  <?= $this->Form->input('user', array('name'=>'user',
                     'size'=>'10','label' => false, 'div' => false,
                     'value'=>'Username')); ?>
               </span>
            </li>
            <li>
               <span style="color:white;">
                  <?= $this->Form->input('pass', array('type'=>'password', 'name'=>'pass',
                     'size'=>'10','label' => false, 'div' => false)); ?>
               </span>
            </li>
            <li class='last'>
               <span class = 'button'>
                  <? $options = array('label'=>'Log-in','name'=>'login','div' => false); ?>
                  <?= $this->Form->end($options); ?>
               </span>
            </li>
            </ul>
         <? else: ?>
            <ul>
               <li>
            <span style="padding-left:550px;"><?= $this->Html->link(
                  __('Log Out', true),array('controller' => 'users',
                  'action' => 'logout')
                  , array('style' => 'color:white;'));?></span>
               </li>
            </ul>
         <? endif; ?>
         </div>
      </div>
   </div>
   <div class="width900">
      <div class="shadow2">
         <div style="padding:5px;">   
            <div class="list-container">
               <?php echo $this->Session->flash(); ?>
               <?php echo $this->fetch('content'); ?>
            </div>
         </div>
      </div>
   </div>
<div class="footer" style="width:100%; float:left; margin-top:20px;">
	<div class="links">
		<div class="width900">
			<div class="category">
				<div class="title">User</div>
				<ul>
					<li><?php echo $this->Html->link('User Page', array('controller'=>'Users','action'=>'index')); ?></li>
					<li><?php echo $this->Html->link('Login/Register', array('controller'=>'Loginregister','action'=>'index')); ?></li>
				</ul>
			</div>
			<div class="category">
				<div class="title">Band</div>
				<ul>
					<li><?php echo $this->Html->link('Add Band', array('controller'=>'Bands','action'=>'create')); ?></li>
				</ul>
			</div>
			<div class="category">
				<div class="title">About</div>
				<ul>
					<li><?php echo $this->Html->link('About Us', array('controller'=>'Pages','action'=>'aboutus')); ?></li>
					<li><?php echo $this->Html->link('Contact Us', array('controller'=>'Pages','action'=>'contact')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="width900">
			<center>
			&copy; 2013 TBA -- Bandom
			</center>
		</div>
	</div>
</div>
</body>
</html>
