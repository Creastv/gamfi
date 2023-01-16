<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



if ( $query->have_posts() ) { ?>

	<div class="row">
		<div class="col-md-12 text-right">
			<div class="top-res"></div>
			Znaleziono <?php echo $query->found_posts; ?> wyników<br />
			<hr>
		</div>
	</div>
    <div class='row search-filter-results-list'>
	<?php while ($query->have_posts()) { $query->the_post();
		$post_type = get_post_type( get_the_ID() );
		$namePost = str_replace("-", " ", $post_type); ?>

		<article id="post-<?php the_ID(); ?>" class="post-article col-md-6 col-lg-4" >
			<div class="content-post">
				<a href="<?php the_permalink(); ?>">
					<?php echo '<span class="label-pt">' . $namePost. '</span>';?>

					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('medium');
					} else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/src/img/thumbnail-default.jpg" />';
					} ?>
				</a>
				<div class="content">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-post-meta">
						<div class="entry-author-meta">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
								<?php the_author(); ?>
							</a>
						</div>
						<div class="post-date">
							<span class="far fa-calendar meta-icon"></span>
							<?php echo get_the_date(); ?>
						</div>
					</div>
				</div>
			</div>
		</article>
	<?php } ?>
    </div>
<?php } else { ?>
	<div class='search-filter-results-list' data-search-filter-action='infinite-scroll-end'>
		<h1>Nic nie znaleziono</span>
	</div>
<?php } ?>