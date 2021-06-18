<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Clean_Commerce
 */

?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content-wrapper">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php
            $archive_image           = clean_commerce_get_option( 'archive_image' );
            $archive_image_alignment = clean_commerce_get_option( 'archive_image_alignment' );
            ?>
            <?php if ( 'disable' !== $archive_image ) : ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( esc_attr( $archive_image ), array( 'class' => 'align'. esc_attr( $archive_image_alignment ) ) ); ?></a>
            <?php endif; ?>
        <?php endif; ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div><!-- .entry-content-wrapper -->

</li><!-- #post-## -->

