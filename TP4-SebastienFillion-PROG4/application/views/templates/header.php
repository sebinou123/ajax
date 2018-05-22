<html>
<head>
  <title>Free HTML5 Templates</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/MenuHorizontal2.css');?>" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/modernizr-1.5.min.js');?>"></script>
</head>

<body>
  <div id="main">		

    <header>
	  <div id="strapline">
	    <div id="welcome_slogan">
	      <h3>Simulateur de <span>lapinou</span></h3>
	    </div><!--close welcome_slogan-->
      </div><!--close strapline-->	  
	  <nav>
	  <?php $user = $this->ion_auth->user()->row();?>
	    <div id="menubar">
          <ul id="nav">
            <li class="current"><?= anchor('', 'Accueil')?></li>
             <?php if($this->ion_auth->logged_in()):?> 
            <li><?= anchor('simulation/visualiser', 'Visualiser')?>
            </li>
               <?php endif; ?>
               <?php if($this->ion_auth->is_admin()):?> 
             <li><?= anchor('simulation/loadXML', 'Charger')?></li> 
              <?php endif; ?>
             <?php if($this->ion_auth->is_admin()):?> 
            <li><?= anchor('auth', 'Gérer')?></li> 
            <?php endif; ?>
            <?php if(!$this->ion_auth->logged_in()):?> 
            <li><?= anchor('auth/login', 'Connecter')?></li> 
            <?php endif; ?>
             <?php if($this->ion_auth->logged_in()):?> 
            <li><?= anchor('auth/logout', 'Déconnecter : ' . $user->username)?></li> 
            <?php endif; ?>
          </ul>
        </div><!--close menubar-->	
      </nav>
    </header>
    
	<div id="site_content">		
	  
	

      <div class="slideshow">
	    <ul class="slideshow">
          <li class="show"><img width="680" height="250" src="<?php echo base_url('assets/images/home_1.jpg');?>" alt="&quot;Enter your caption here&quot;" /></li>
          <li><img width="680" height="250" src="<?php echo base_url('assets/images/home_2.jpg');?>" alt="&quot;Enter your caption here&quot;" /></li>
        </ul> 
	  </div>
	  <div id="content">
        <div class="content_item">
        <?php if(isset($title)):?> 
		 <h1><?php echo $title ?></h1>
           <?php endif; ?>
		 
		
	
        
                