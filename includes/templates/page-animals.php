<?php
/*
Template Name: Animals
*/

get_header();
?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
     <?php
            $arg_posts =  array(
                'orderby'      => 'name',
                'order'        => 'ASC',
                'posts_per_page' => 3,
                'post_type' => 'animal',
                'post_status' => 'publish',
            );
        $query = new WP_Query($arg_posts);
        ?>
                                <?php if ($query->have_posts() ) ?>
                <!---->
                <!--                --><?php //while ( $query->have_posts() ) : $query->the_post(); ?>
                <!--                    <div class="main-page-post">-->
                <!--                         <a href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a>-->
                <!--                    </div>-->



			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title main_title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h1>


					<div class="entry-content">

						<ul class="animals-info">
						<?php if($post->animals_color) : ?>
							<li><strong><?php esc_html_e('Animal Color: ', 'animals-domain'); ?><?php esc_html_e($post->animals_age, 'animals-domain'); ?></li>
						<?php endif; ?>
						<?php if($post->animals_age) : ?>
							<li><strong><?php esc_html_e('Animal Age: ', 'animals-domain'); ?> <?php esc_html_e($post->animals_age, 'animals-domain'); ?></li>
						<?php endif; ?>

					</ul>



					</div> <!-- .entry-content -->

				</article> <!-- .et_pb_post -->

                <?php endwhile; wp_reset_postdata()?>



			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->



</div> <!-- #main-content -->

<?php

get_footer();
?>



