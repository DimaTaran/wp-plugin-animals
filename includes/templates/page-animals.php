<?php
/*
Template Name: Animals
*/

get_header();
?>

<div id="main-content site-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
                <h1 class="entry-title main_title"><?php the_title(); ?></h1>
                <?php if ( is_user_logged_in() ) include_once(plugin_dir_path(__FILE__) . '/new-form.html');
                    $arg_posts =  array(
                        'orderby'      => 'ID',
                        'order'        => 'DESC',
                        'posts_per_page' => 10,
                        'post_type' => 'animal',
                        'post_status' => 'publish',
                    );
                        $query = new WP_Query( $arg_posts );
                        if ( $query->have_posts() )
                        while ( $query->have_posts() ) : $query->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="format-standard hentry entry">

                    <?php if ( is_user_logged_in() ) include_once(plugin_dir_path(__FILE__) . '/edit-form.html'); ?>

                    <h1 class="entry-header entry-title post_title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h1>
                  	<div class="entry-content">
						<ul class="animals-info">
						<?php if($post->animals_color) : ?>
							<li><strong><?php esc_html_e('Animal Color: ', 'animals-domain'); ?><?php esc_html_e($post->animals_color, 'animals-domain'); ?></li>
						<?php endif; ?>
						<?php if($post->animals_age) : ?>
							<li><strong><?php esc_html_e('Animal Age: ', 'animals-domain'); ?> <?php esc_html_e($post->animals_age, 'animals-domain'); ?></li>
						<?php endif; ?>
					    </ul>
					</div> <!-- .entry-content -->
                   <?php if (is_user_logged_in())  { ?>

                    <div class="entry-title main_title">
                        <button class="del" data-id="<?php the_ID(); ?>">Delete</button> <button class="update open-button">Update</button>

                    </div>
                    <?php } ?>
                    <hr>
				</article> <!-- .et_pb_post -->

                <?php endwhile; wp_reset_postdata()?>
			</div> <!-- #left-area -->
			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->
<?php get_footer(); ?>



