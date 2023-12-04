<?php
/*
    AUTHOR(S): Jose Cortes

    DESCRIPTION:
        - This snippet is for the subsequent articles section of the Housing Hub page.
        - This snippet is meant to be used in conjunction with the archive-bulldog-living.php[featured-articles.php, upcoming-events.php, RA-Events] snippet.

    TODO:
        - Add the ability to change the number of articles displayed
        - Styles are needed for everything

    NOTES:
        - The subsequent articles section is a custom post type called 'bulldog_living'.
*/
?>
<!-- Subsequent Articles -->
<section class="Container-for-Sub-Articles">
    <?php
    // Set up the arguments to query the most recent 4-9 posts of the custom post type 'bulldog_living'
    $args = array(
        'post_type' => 'bulldog_living',
        'posts_per_page' => 6,
        'offset' => 3, // Offset the query by 3 posts to avoid duplicates
        'order' => 'DESC',
        'orderby' => 'date'
    );

    /* Run the query */
    $query = new WP_Query($args);

    /* Check if there are posts matching the query */
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : 'https://fresnostatehousing.org/wp-content/uploads/2023/06/Victoy-E-scaled.jpg';
    ?>
            <article class="Sub-Article">
                <div class="Sub-Article-Thumbnail">
                    <img src="<?php echo $thumbnail_url ?>" />
                </div>
                <!-- Sub-Article-Thumbnail -->
                <div class="Sub-Article-Content">
					<div class="Sub-Article-Ti-Des">
                    	<div class="Sub-Article-Ti-Da">
                        	<h2 class="Sub-Article-Title">
                            	<?php echo wp_trim_words(get_the_title(), 10, '...') ?>
                        	</h2>
                        	<!-- Sub-Article-Title -->
                        	<span class="Sub-Article-Date"> <?php echo get_the_date() ?> </span>
                        	<!-- Sub-Article-Date -->
                    	</div>
                    	<!-- Sub-Article-Ti-Da -->
                    	<?php if (has_excerpt()) : ?>
                        	<p class="Sub-Article-Description">
                            	<?php echo wp_trim_words(get_the_excerpt(), 45, '...') ?>
                        	</p>
                        	<!-- Sub-Article-Description -->
                    	<?php endif; ?>
					</div> <!-- Sub-Article-Ti-Des -->
                    <a href="<?php the_permalink() ?>" class="Sub-Article-Link">
                        <span>Read More</span>
                    </a> <!-- Sub-Article-Link -->
				</div> <!-- Sub-Article-Content -->
            </article>
            <!-- Sub-Article -->
        <?php endwhile; ?>
        <?php wp_reset_postdata(); // Reset the global post object
        ?>
    <?php else : ?>
        <p>No subsequent articles found.</p>
    <?php endif; ?>
</section> <!-- Container-for-Sub-Articles -->