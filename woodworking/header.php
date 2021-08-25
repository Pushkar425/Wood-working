<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woodworking by FCT</title>
    <link href="<?php bloginfo('template_url');?>/'style.css'" rel="stylesheet" type="text/css" media="screen" />
    <?php wp_head();?>
</head>
<body <?php body_class();?>>
<div id="wrapper">
	<div id="wrapper-bgbtm">
		<div id="header">
			<?php $logoimg = get_header_image();?>
			<div id="logo">
				<?php if($logoimg){?>
					<a href="#"><img src="<?php echo $logoimg;?>"></a>

				<?php } else{?>
				<h1><a href="#">Wood Working</a></h1>
				<p>template design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a></p>
				<?php }?>
			</div>
		</div>
    		<div id="menu">
				<?php wp_nav_menu(array('theme_location'=>'primary-menu'))?>

			</div>


			