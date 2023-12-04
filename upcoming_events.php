<?php
/*
    AUTHOR(S): Jose Cortes

    DESCRIPTION:
        - This snippet is for the upcoming events section of the Housing Hub page.
        - This snippet is meant to be used in conjunction with the archive-bulldog-living.php[featured-articles.php, subsequent-articles.php, RA-Events] snippet.

    TODO:
        - Add the ability to change the number of events displayed
        - Styles are needed for everything

    NOTES:
        - The upcoming events section is a post type called 'event'.
*/
	// Get today's date to filter the query
    $today = date('Y-m-d H:i:s');
	
    // Set up the arguments to query the most recent 6 posts of the post type 'event'
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 6,
        'order' => 'DESC',
        'orderby' => 'meta_value',
        'meta_key' => '_start_eventtimestamp',
        'meta_query' => array(
            array(
                'key' => '_start_eventtimestamp',
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
	<!-- Upcoming Events -->
	<section class="Container-for-Upcoming-Events">
    <h2 class="Upcoming-Events-Title">Upcoming Events</h2> <!-- Upcoming-Events-Title -->
	<?php
        while ($query->have_posts()) : $query->the_post();
            $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : 'https://fresnostatehousing.org/wp-content/uploads/2023/06/Victoy-E-scaled.jpg';
    ?>
            <article class="Upcoming-Event">
                <div class="Upcoming-Event-Thumbnail">
                    <img src="<?php echo $thumbnail_url ?>" />
                </div>
                <!-- Upcoming-Event-Thumbnail -->
                <div class="Upcoming-Event-Content">
					<div class="Upcoming-Event-Ti-Da-Des">
                    	<div class="Upcoming-Event-Ti-Da">
                        	<h2 class="Upcoming-Event-Title">
                            	<?php echo wp_trim_words(get_the_title(), 10, '...') ?>
							</h2><!-- Upcoming-Event-Title -->
                        <?php
	$start_eventtimestamp = get_post_meta(get_the_ID(), '_start_eventtimestamp', true);
if($start_eventtimestamp) :
?>
    <span class="Upcoming-Event-Date">
        <?php echo date('F j, Y', strtotime($start_eventtimestamp)); /*'F j, Y \a\t g:i a'*/ ?>
    </span>
<?php endif; ?>
                        <!-- Upcoming-Event-Date -->
                    </div>
                    <!-- Upcoming-Event-Ti-Da -->
					<?php
						$pod = pods( 'event', get_the_ID() );
						$event_description = $pod->field( 'event_description' );
					?>
                    <?php if ($event_description) : ?>
                        <p class="Upcoming-Event-Description">
                            <?php echo wp_trim_words($event_description, 30, '...') ?>
                        </p>
                        <!-- Upcoming-Event-Description -->
                    <?php endif; ?>
					</div> <!-- Upcoming-Event-Ti-Da-Des -->
                    <a href="<?php the_permalink() ?>" class="Upcoming-Event-Link">
						<span><i class="fa-solid fa-chevron-right"></i></span>
                    </a>
                    <!-- Upcoming-Event-Link -->
                </div>
                <!-- Upcoming-Event-Content -->
            </article>
            <!-- Upcoming-Event -->
        <?php
        endwhile;
        wp_reset_postdata(); // Reset the global post object
        ?>
    <?php else : ?>
    <?php endif; ?>
</section> <!-- Container-for-Upcoming-Events -->