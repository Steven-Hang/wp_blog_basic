<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>[Travel Blog]</title>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head();?>
</head>

<body <?php body_class();?>>
	
<nav class="navbar">
			<a class="header" href="/"> TITLE - THE GREATEST </a>
			
					<?php wp_nav_menu (
							array(
									'theme_location' => 'top-menu'
							));?>

					<div class="menusearch">
							<?php get_search_form(); ?>
					</div>
	</nav>


