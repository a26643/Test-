<?php
 /*
Template Name: Links to Alumni page
*/
get_header(); ?>

<div class="container container_12">
	<div class="table grid_12 Links to Alumini Links to Alumini_left"> 
	<h1 class="title top_rounded_2"> <?php the_title(); ?> </h1>
	<?php 
		$count_posts	=	wp_count_posts('Links to Alumini');
		$paged			=	( get_query_var('paged') ) ? get_query_var('paged') : 1;
		query_posts(
			array(
				'post_type'		=>	'Links to Alumini',
				'posts_per_page'=>15,
				'order'			=>	'asc',
				'paged'			=>	$paged
			)
		); 
		$max_paged		=	ceil($count_posts->publish/10);
	?>
	<div class="student_sidebar">
	<?php dynamic_sidebar('Links to Alumini page widget'); ?>
	</div>
	<table id="Links to Aluminitable">
		<thead>
			<tr class="headding_table">
				<td><?php _e('Alumini','vz_front_terms'); ?></td>
				<td><?php _e('Name','vz_front_terms'); ?></td>
				<td><?php _e('Batch','vz_front_terms'); ?></td>
				<td><?php _e('Current Organisation','vz_front_terms'); ?></td>
				<td><?php _e('LinkedIn Profile URL','vz_front_terms'); ?></td>
				
			</tr>
		</thead>
		<tbody>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php 
					$designation		=	get_field('designation'); 
					$contact_no			=	get_field('contact_no'); 
					$profile_email		=	get_field('profile_email);
					?>
				<tr>
					<td><?php the_post_thumbnail(); ?></td>
					<td><?php the_title(); ?></td>
					<td><?php echo $designation; ?></td>
					<td><?php echo $contact_no.'<br>'.$profile_email; ?></td>
				</tr>
		<?php endwhile; endif; ?>
		</tbody>
	</table>
	</div>
	<?php if($max_paged>1) : ?>
		<div class="grid_12">
			<div class="block-pagination">
				<div class="by_number alignleft">
					<?php for($i=1;$i<=$max_paged;$i++) : ?>
						<a href="<?php echo get_pagenum_link( $i ); ?>" class="<?php echo($i==$paged) ? 'active' : '' ; ?> alignleft"> <?php echo $i; ?> </a>
					<?php endfor; ?>
				</div>
				<div class="by_arrows alignright">
					<?php previous_posts_link(__('Prev','vz_front_terms')); ?>
					<?php next_posts_link(__('Next','vz_front_terms')); ?> 							
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>