<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="entry-content">


					<?php		
					the_content();
					?>
					
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>	
</article><!-- #post-## -->
