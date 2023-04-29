<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Megla Grid
 */
if ( ! is_singular( ) ) : ?>
<div class="col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="single-blog-style1">
			<?php if ( has_post_thumbnail () ): ?>
			<div class="img-holder">
                <div class="inner">
                    <?php megla_post_thumbnail(); ?>
                </div>
                <div class="category-box">
                    <div class="dot-box"></div>
                    <p><?php megla_grid_category(); ?></p>
                </div>
            </div>
            <?php endif; ?>
            <div class="text-holder">
                 <?php
						the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					?>
                <div class="text">
                    <?php the_excerpt(); ?>
                </div>
                <div class="bottom-box">
                    <div class="btn-box">

                        <?php
		           	echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'" class="icon-right-arrow-1"><span>'.'<i class="fa fa-long-arrow-right"></i>'.esc_html__('Read More','megla-grid').'</span></a>'; 
		            ?>

                    </div>
                    <div class="meta-info">
                        <ul>
                            <li><?php megla_posted_on(); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
		</div>
	</article>	
</div>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php megla_post_thumbnail(); ?>
	<div class="single-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );

			endif; 

			if ( 'post' === get_post_type() ) : ?>
				<div class="footer-meta">

					<?php 
						megla_posted_by();
						megla_posted_on(); 
					?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'megla-grid' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'megla-grid' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php megla_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>