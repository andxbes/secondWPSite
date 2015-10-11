<?php $T_P = get_template_directory_uri(); ?>

<!DOCTYPE html>
<html <?= language_attributes() ?>>
    <head>
        <title><?= the_title() ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
		
        <style> <?php the_ThemeOptions(); ?> </style>


    </head>
    <body <?php body_class(); ?>>
		<?php wp_admin_bar_header() ?>
        <header class="fullscrtoWidth container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" id="logoPlace" href="#"></a>
					</div>
					<div style="" aria-expanded="true" id="navbar" class="navbar-collapse collapse ">
						<!--наше ul меню-->
						<?php topMenu(); ?>
					</div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			</nav>
        </header>

		
	
