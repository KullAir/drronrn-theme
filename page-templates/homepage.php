<?php
/**
 * Template Name: Homepage
 *
 * Template for displaying Homepage.
 *
 * @package understrap
 */

get_header();

?>

<div class="wrapper" id="full-width-page-wrapper">
	<div  id="content" class="container-fluid">
		<div class="row home-page-header clearfix">


			<div class=" col-lg-7">
				<div class="post-thumb-wrap">
					<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
				</div>
			</div>
			<div class=" col-lg-5 bg-secondary slogen-container">				
				<div class="home-title-wrap">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<div class= "sub-title h2" ><?php echo get_post_meta(get_the_ID(),'sub_title',true); ?></div>
				</div>
			</div>




		</div>	
		
		
	
		<div class="row"><!-- .row end -->
				
			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">
					

					<?php while ( have_posts() ) : the_post(); ?>

						<?php  get_template_part( 'loop-templates/content', 'home' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>
					
					

				</main><!-- #main -->
			</div><!-- col-md-12 content-area end -->

		</div><!-- .row end -->
		
			
	</div><!-- Container end -->
	<?php do_action("homepage_actions"); ?>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
<!--- /div><skrollr-wrapper end -->
