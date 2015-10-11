
<?php
/*
 * Template name: Шаблон работ
 */
?>
<?php get_header(); ?>

<article class="news container">

	<div class="col-md-12 text-center">
		<h2 class="titleGenre"><?php the_archive_title(); ?></h2>
	</div>
	<?php
	while ( have_posts() ) : the_post();
		?>

		<div class="row alert-success">

			<div class="col-md-4">
				<?php the_post_thumbnail( 'medium' ) ?>
			</div>

			<div class="col-md-8 alert ">
				<h4><?php the_title(); ?></h4>
				<span> Дата публикации :
					<?php the_date(); ?>
					<?php the_time(); ?>
				</span>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"> <?php the_taxonomies() ?> </h3>
					</div>
					<div class="panel-body">
						
						
						<?php the_excerpt(); ?>
					</div>
				</div>


                 
				<div class="more-box">
					<ul class="pager">
					
						<li class="next"><a  class="link" href="<?php the_permalink() ?>"> Просмотреть запись ...  &rarr; </a></li>
					</ul>
					
				</div>
			</div>
		</div>

	<?php endwhile; ?>

	<?php if ( $paged > 1 ) { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link( '&laquo; Previous Posts' ); ?></div>
			<div class="next"><?php previous_posts_link( 'Newer Posts &raquo;' ); ?></div>
		</nav>

	<?php } else { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link( '&laquo; Previous Posts' ); ?></div>
		</nav>

	<?php } ?>

	<?php wp_reset_postdata(); ?>

</article>

<?php get_footer(); ?>






