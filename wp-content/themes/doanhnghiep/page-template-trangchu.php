<?php 

/*

Template Name: page-template-trangchu

*/

get_header(); 

?>	

<div class="page-wrapper">

	<div id="content">

		<div class="g_content">

			<div class="content_left">

				

				<div class="video_logo">

					<div class="container">

						<div class="row">

							<div class="col-sm-8">

								<div class="content_post_admin">

									<?php 

		$my_postid = 39;//This is page id or post id

		$content_post = get_post($my_postid);

		$content = $content_post->post_content;

		$content = apply_filters('the_content', $content);

		$content = str_replace(']]>', ']]&gt;', $content);

		echo $content;

		?>

	</div>

</div>

<div class="col-sm-4">

	<div class="logo_single">

		<a href="<?php echo get_permalink(47); ?>" class="absolute_link"></a>

		<figure><?php if(has_custom_logo()){ the_custom_logo();} ?></figure>

		<div class="textwidget">

			<h4><?php if(get_locale() == 'en_US'){echo get_the_title(52);} else{ echo get_the_title(47);} ?></h4>

			<p><?php if(get_locale() == 'en_US'){echo 'Read more';} else { echo 'Xem thêm';}  ?></p>

		</div>

	</div>

	<div class="partners">

		<ul>

			<?php

			$args = array(  

				'post_type' => 'partners',

				'post_status' => 'publish',

				'posts_per_page' => 20, 

				'orderby' => 'title', 

				'order' => 'ASC'

			);



			$loop_partner = new WP_Query( $args ); 



			while ( $loop_partner->have_posts() ) : $loop_partner->the_post(); 

    	//echo the_title();

				?> <li class="pw"> <figure class="thumbnail"> <a href="<?php echo get_the_excerpt(); ?>" target="_blank"><?php the_post_thumbnail();?></a> </figure> </li> <?php

			endwhile;

			wp_reset_postdata(); 

			?>

		</ul>

	</div>

</div>

</div>

</div>

</div>

<div class="list_post_news">

	<div class="container">

		<?php if(get_locale() == 'en_US'){?> <h2 class="title_tg_top">New Posts</h2>

	<?php }  else if(get_locale() == 'vi'){ ?><h2 class="title_tg_top">Bài viết mới nhất</h2> <?php } ?>

	<div class="row">

		<?php 

		$arg_cmt_post_q = array(

			'posts_per_page' => 3,

			'orderby' => 'post_date',

			'order' => 'DESC',

			'post_type' => 'post',

			'post_status' => 'publish'

		);

		$cmt_post_q = new WP_Query();

		$cmt_post_q->query($arg_cmt_post_q);

		?>

		<?php if(have_posts()) : ?>

			<ul class="most-commented">

				<?php

				while ($cmt_post_q->have_posts()) : $cmt_post_q->the_post(); ?>

					<li class="col-sm-4">

						<div class="post_cmt_wrapper pw">

							<div class="wrap_thumb">

								<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>

								<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 

									<a href="<?php the_permalink();?>"></a>

								</figure>	

							</div>



							<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> </h3>

							<div class="excerpt">

								<p><?php echo excerpt(50); ?></p>

							</div>

							<div class="read_more">

								<a href="<?php the_permalink(); ?>"><?php if(get_locale() == 'en_US'){echo 'Read more >';} else { echo 'Xem thêm >';}  ?></a>

							</div>

						</div>



					</li>

				<?php endwhile; ?>

			<?php endif; ?> 

		</ul>

	</div>

</div>

</div>



</div><!-- content_left -->

</div>



</div>

</div>

<?php get_footer(); ?>

