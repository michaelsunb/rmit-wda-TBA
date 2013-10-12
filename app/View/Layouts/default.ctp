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
      echo $this->Html->script('validate.js');
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
         <form name="search" action="search.php" method="get">
           <ul>
               <li class='active'>
               <span style="padding-left:5px;">
                  <input type="text" name="searchBar"/>
               </span>
            </li>
            <li>
               <span class = 'button'>
                  <input name = "search" type="submit" value="Search"/>
               </span>
            </li>
           </ul>
         </form>
         <? if(!$authUser): ?>
         <?= $this->Form->create('User', array('id'=>'login', 'url'=>array('controller'=>'users','action'=>'login'))); ?>	
           <ul>	
            <li>
               <span style="padding-left:250px;">
                  <?= $this->Form->input('user', array('name'=>'user',
                     'value'=>'Username','label' => false, 'div' => false)); ?>
               </span>
            </li>
            <li>
               <span>
                  <?= $this->Form->input('pass', array('type'=>'password', 'name'=>'pass',
                     'value'=>'password','label' => false, 'div' => false)); ?>
               </span>
            </li>
            <li class='last'>
               <span class = 'button'>
                  <? $options = array('label'=>'Log-in','name'=>'login','div' => false);; ?>
                  <?= $this->Form->end($options); ?>
               </span>
            </li>			
            </ul>
          </form>
         <? else: ?>
            <span style="padding-left:550px;"><?= $this->Html->link(
                        'Log Out',array('controller' => 'users'
                            ,'action' => 'logout'));?></span>
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
               <div class="title">Search</div>
               <ul>
                  <li><a href="search.php">Search Page?</a></li>
               </ul>
            </div>
            <div class="category">
               <div class="title">User</div>
               <ul>
                  <li><a href="user.php">User Page</a></li>
                  <li><a href="loginRegisterPage.php">Login/Register</a></li>
               </ul>
            </div>
            <div class="category">
               <div class="title">About</div>
               <ul>
                  <li><a rel="nofollow" href="about_us.php">About Us</a></li>
               </ul>
            </div>
            <div class="category">
               <div class="title">Get in touch</div>
               <ul>
                  <li><span class="icons sprite-mail"></span>&nbsp;<a href="contact_us.php">Contact Us</a></li>
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
