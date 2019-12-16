<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
		<?php if ( have_rows('banner_content') ) : ?>
			<?php /* Start the Loop */ ?>
			<div class="fp-main-carousel hide-mobile">    

				<?php while ( have_rows('banner_content') ) : the_row(); ?>
				<section class="banner carousel-cell">

				<div class="banner__content">
					<h1 class="banner__title"><?php the_sub_field('banner_title');?></h1>
					<p class="banner__description p__white"><?php the_sub_field('banner_description');?></p>
				
							<?php if ( have_rows('banner_button')):?>
							<?php while ( have_rows('banner_button')) : the_row(); ?>
							<button class="banner__btn">
							<a class="banner__btn-label" href="<?php the_sub_field('banner_button_url');?>"><?php the_sub_field('banner_button_label');?></a>
							</button>
							<?php endwhile; ?>
							<?php else : ?>
							<?php endif; ?>
				</div>

				<div class="banner__image-wrapper  hide-mobile">
					<img class="banner__image banner_imgfit" src="<?php the_sub_field('banner_image'); ?>"/>
				</div>
				</section>
					<?php endwhile; ?>
					<?php else : ?>
					<?php endif; ?>
		</div>
	
		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
				</header><!-- .entry-header -->

				<div class="entry-content">

					<section class="year-events">
						<div class="year_round-head">
							<h2 class="year-events-h1">Year Round Events</h2>
							<h2 class="year-events-h2">ISF+</h2>
						</div>
						<p class="year-content"><?php the_field('page_about');?></p>
					</section>	

					<section class="festival-events">
						<h3 class="events-title h3__left-border-pink">Check Out Our Events</h3>
						<!-- category links -->
						<div class="categories-info">
						<div class="wrapper__category"><button value="all" class="category-active category-all-btn-yearround">View All</button></div>
						<?php
							$terms = get_terms( array(
                                'taxonomy' => 'event-taxonomy', 'create_isf_categories',
                                'hide_empty' => 0,
							) ); ?>
                            <?php foreach ( $terms as $term ) :
                                echo '<div class="wrapper__category"><button class="category-btn" value='. $term->term_id .'>' . $term->name.  '</button></div>'; 
							endforeach;?>							

							</div>



			</section>
			<section class="wrapper__upcoming-events grid-column-3" id="content-output-isfplus">
							<?php 
				$args = array( 'post_type' => 'isf_event', 'order' => 'ASC', 'posts_per_page' => 6);
   				$event_posts = get_posts( $args ); // returns an array of posts
			    ?>

			<?php foreach ( $event_posts as $post ) : setup_postdata( $post ); ?>
                   <?php /* Content from your array of post results goes here */ ?>
                   <article class="wrapper__single-event">

                       <div class="wrapper__image-event">
                            <img src="<?php the_field('event_image'); ?>">
                            <div class="thumbnail__date">
                                <?php $date = new DateTime(get_field('event_date')); ?>
                                <p class="thumbnail__date-month"><?php echo $date->format('M'); ?></p>
                                <p class="thumbnail__date-day"><?php echo $date->format('d'); ?></p>
                            </div>
                        </div>
                        
                        <div class="wrapper__info-event">
                            <p class="title__event"><?php the_title(); ?></p>
                            <p><?php the_field('event_date'); ?></p>
                            <?php if ( have_rows('event_time')):?>
                                <?php while ( have_rows('event_time')) : the_row(); ?>
                                    <?php the_sub_field('start_time');?> - <?php the_sub_field('end_time');?>
                                <?php endwhile; ?>
                                <?php else : ?>
                                <?php endif; ?>
						</div>
						
						<div class="wrapper__btn-info">
							<?php if( have_rows('ticket_button') ):?>
								<?php while ( have_rows('ticket_button') ) : the_row(); ?>
									<button class="events-btn">
									<a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('label'); ?></a>
									</button>
									<?php
										endwhile;
										else :
										endif;
									?>
						</div>

                        </article>
                    <?php endforeach; wp_reset_postdata(); ?>
			<?php endwhile; // End of the loop. ?>
			
			<section>
						<h3 class="events-title h3__left-border-pink">Past Events</h3>


					
						<?php 
				


				$args = array( 'post_type' => 'isf_event', 'order' => 'ASC', 'posts_per_page' => 3,
					'meta_query' => array(
						'meta_key' => 'event_date',
						'type' => 'DATETIME',
						'meta_value' =>  date('Ymd'),
						'meta_compare' => '<'
					)
				);

				   $event_posts = get_posts( $args ); // returns an array of posts
				   

			    ?>

			<?php foreach ( $event_posts as $post ) : setup_postdata( $post ); ?>
                   <?php /* Content from your array of post results goes here */ ?>
                   <article class="wrapper__single-event">
				   <?php // var_dump(get_field('event_date')); ?>
				
                       <div class="wrapper__image-event">
                            <img src="<?php the_field('event_image'); ?>">
                            <div class="thumbnail__date">
                                <?php $date = new DateTime(get_field('event_date')); ?>
                                <p class="thumbnail__date-month"><?php echo $date->format('M'); ?></p>
                                <p class="thumbnail__date-day"><?php echo $date->format('d'); ?></p>
                            </div>
                        </div>
                        
                        <div class="wrapper__info-event">
                            <p class="title__event"><?php the_title(); ?></p>
                            <div>
        
                            </div>
                        </div>

                       

                        </article>
                    <?php endforeach; wp_reset_postdata(); ?>



						</section>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
