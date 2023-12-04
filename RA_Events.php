<?php
/*
    AUTHOR(S): Jose Cortes

    DESCRIPTION:
        - This snippet is for the RA events section of the Housing Hub page.
        - This snippet is meant to be used in conjunction with the archive-bulldog-living.php[featured-articles.php, subsequent-articles.php, upcoming-events.php] snippet.

    TODO:

    NOTES:
        - The RA events section is a post type called 'ra_event'.
*/
	// Get today's date to filter the query
    $today = date('Y-m-d H:i:s');
	
    // Set up the arguments to query the most recent 6 posts of the post type 'event'
    $args = array(
    'post_type' => 'ra_event',
    'posts_per_page' => 6,
    'order' => 'ASC',
	'orderby' => 'meta_value',
    'meta_key' => 'start_date_and_time',
    'meta_query' => array(
        array(
            'key' => 'end_date_and_time',
            'value' => $today,
            'compare' => '>=',
            'type' => 'DATETIME'
        )
    )
);

    /* Run the query */
    $query = new WP_Query($args);

    /* Check if there are posts matching the query */
    if ($query->have_posts()) :
	?>
	<section class="Container-for-RA-Events">
    <h2 class="RA-Events-Title">RA Events</h2> <!-- RA-Events-Title -->
	<!-- RA Events -->
	<?php
        while ($query->have_posts()) : $query->the_post();
            $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : 'https://fresnostatehousing.org/wp-content/uploads/2023/06/Victoy-E-scaled.jpg';
    ?>
            <article class="RA-Event">
                <!--
				<div class="RA-Event-Thumbnail">
                    <img src="<?php // echo $thumbnail_url ?>" />
                </div>
				-->
                <!-- RA-Event-Thumbnail -->
                <div class="RA-Event-Content">
					<div class="RA-Event-Ti-Da-Des">
                    	<div class="RA-Event-Ti-Da">
                        	<h2 class="RA-Event-Title">
                            	<?php echo wp_trim_words(get_the_title(), 10, '...') ?>
                        	</h2> <!-- RA-Event-Title -->
							<?php
	$start_date_and_timestamp = get_post_meta(get_the_ID(), 'start_date_and_time', true);
if($start_date_and_timestamp) :
?>
                        	<span class="RA-Event-Date"> <?php echo date('F j, Y     h:i A', strtotime($start_date_and_timestamp)); /*'F j, Y \a\t g:i a'*/ ?> </span>
							<?php endif; ?>
                        	<!-- RA-Event-Date -->
                    	</div>
                    	<!-- RA-Event-Ti-Da -->
                    	<?php if (has_excerpt()) : ?>
                        	<p class="RA-Event-Description">
                            	<?php echo wp_trim_words(get_the_excerpt(), 50, '...') ?>
                        	</p>
                        	<!-- RA-Event-Description -->
                    	<?php endif; ?>
                	</div> <!-- RA-Event-Ti-Da-Des -->
					<a href="<?php the_permalink() ?>" class="RA-Event-Link">
                        	<span><i class="fa-solid fa-chevron-right"></i></span>
                    	</a> <!-- RA-Event-Link -->
				</div> <!-- RA-Event-Content -->
            </article>
            <!-- RA-Event -->
        <?php
        endwhile;
        wp_reset_postdata(); // Reset the global post object
        ?>
    <?php else : ?>
    <?php endif; ?>
</section>
<!-- Container-for-RA-Events -->
<script>
	document.addEventListener('DOMContentLoaded', function(){
		let isNotMobile = window.innerWidth >= 768;
		
		if (isNotMobile) {
			let imagesToSquare = document.querySelectorAll('.Upcoming-Event-Thumbnail img, .RA-Event-Thumbnail img');
			imagesToSquare.forEach(img => {
				img.height = img.width;
				img.classList.add('square-image');
			});
		}
	});
	// Also handle the resize event to account for changing from desktop to mobile view or vice versa
	window.addEventListener('resize', function () {
		let isNotMobile = window.innerWidth >= 768;
		let imagesToSquare = document.querySelectorAll('.Upcoming-Event-Thumbnail img, .RA-Event-Thumbnail img');
		if (isNotMobile) {
			imagesToSquare.forEach(img => {
				img.height = img.width;
				img.classList.add('square-image');
			});
		} else {
			imagesToSquare.forEach(img => {
				img.style.height = 'auto';
				img.classList.remove('square-image');
			});
		}
	});
</script>