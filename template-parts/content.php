<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HackCville_5.0
 */

$pioneer = 1;
?>


<div class="flex-1-of-2">
	<a class="image-link" href="<?php the_permalink(); ?>">
		<img src="<?php echo $f_i; ?>">
	</a>
</div>
<div class="flex-1-of-2">
	<a href="<?php the_permalink(); ?>">
		<h3><?php the_title() ?></h3>
	</a>
	<div class="excerpt">
		<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id)); ?>
	</div>
	<!-- <a href="<?php the_permalink(); ?>" class="">
		Read more &rarr;
	</a> -->
</div>
			

	
