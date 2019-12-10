<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
		<?php if ( have_rows('banner_content') ) : ?>
			<?php /* Start the Loop */ ?>
			<div class="main-carousel">    

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

		<div class="banner__image-wrapper">
			<img class="banner__image" src="<?php the_sub_field('banner_image'); ?>"/>
		</div>
	</section>
<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>
</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			


		<!-- THIS IS THE LOOP FOR FIRST PART OF VOLUNTEER -->

<?php
			
						if( have_rows('volunteer', ) ):   ?>

							<div class="volunteer-first-loop">						

							<?php	while ( have_rows('volunteer' ) ) : the_row();?>

					<div class="volunteer-about-main">

						<div class="volunteer-title"> <h3><?php  the_sub_field('isf_volunteer');?> </h3></div>
						
						
						<div class="volunteer-about"> <h5><?php  the_sub_field('isf_about');?> </h5></div>

						<div class="volunteer-info"> <h5><?php  the_sub_field('isf_more_information');?> </h5></div>
					
					</div>

							<?php endwhile;?>

							</div>
						<?php else : endif; ?>

							<!-- END OF VOLUNTEER FIRST LOOP -->


							<!-- VOLUNTEER SECOND LOOP -->

							<?php
			
			if( have_rows('responsibilities') ):   ?>

				<div class="volunteer-second-loop">						

				<?php	while ( have_rows('responsibilities' ) ) : the_row();?>

				<div class="responsibilities-about">

				<img class="responsibilities-img" src="<?php the_sub_field('responsibilities_picture'); ?>"/>


				<div class ="responsibilities-title-vs-info">
						<div class="responsibilities-title"> <h3><?php  the_sub_field('responsibilities_title');?> </h3></div>
						<div class="responsibilities-info"> <h5><?php  the_sub_field('responsibilities_content');?> </h5></div>
		
				</div>

			</div>	

				<?php endwhile;?>

				</div>
			<?php else : endif; ?>



					<!-- END OF THE SECOND LOOP VOLUNTEER -->

<div class ="combine-qualifications-benefits">


							<!-- THIS IS THE THIRD LOOP -->

							<?php
			
							if( have_rows('qualificatons') ):   ?>

								<div class="volunteer-third-loop">						

								<?php	while ( have_rows('qualificatons' ) ) : the_row();?>

								<div class="qualificatons-about">

								<div class="qualificatons-title"> <h3><?php  the_sub_field('qualificatons_title');?> </h3></div>
							
							
							<div class="qualificatons-info"> <h5><?php  the_sub_field('qualifications_content');?> </h5></div>

							<div class="qualificatons-list"> <h5><?php  the_sub_field('qualificatons_list');?> </h5></div>
						


							</div>	

								<?php endwhile;?>

								</div>
							<?php else : endif; ?>
						

							<!-- END OF THE THIRD LOOP -->




				<!-- THIS IS THE FOURTH LOOP -->
						<?php
			
			if( have_rows('benefits') ):   ?>

				<div class="volunteer-four-loop">						

				<?php	while ( have_rows('benefits' ) ) : the_row();?>

				<div class="benefits-about">

				<div class="benefits-title"> <h3><?php  the_sub_field('benefits_title');?> </h3></div>
			
			
			<div class="benefits-info"> <h5><?php  the_sub_field('benefits_content');?> </h5></div>

		
		
			</div>	

				<?php endwhile;?>

				</div>
			<?php else : endif; ?>
						

	</div>
						<!-- END OF FOURTH LOOP -->


			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
