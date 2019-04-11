<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<?php wp_head();?>
</head>
<header>
	<div class="banner">  
		<div class="banner-area">
			<span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><h1 id="site_name"><?php bloginfo( 'name' )?></h1></a></span>
			<span class="blinking-cursor">|</span>
		</div>  
	</div>
	
	<nav class="nav-area" role="navigation">
	
		<ul>	
		<?php wp_list_categories('title_li='); ?>
		<?php get_search_form(); ?> 	
		</ul>		
			
	</nav>
	
	  
</header>
<body <?php body_class();?>>

