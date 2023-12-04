<?php
/*
    AUTHOR(S): Jose Cortes

    DESCRIPTION:
        - This snippet is for the featured articles section of the Housing Hub page.
        - This snippet is meant to be used in conjunction with the archive-bulldog-living.php[subsequent-articles.php, upcoming-events.php, RA-Events] snippet.

    TODO:
        - Add a safeguard for when only 1 or 2 posts are returned.
        - Add styles for everything.

    NOTES:
        - The featured articles section is a custom post type called 'bulldog-living'.
*/
?>
<!-- Featured Articles -->
<section class="Container-for-Articles-and-Title">
    <div class="Container-for-Articles">
        <?php
        // Set up the arguments to query the most recent 1-3 posts of the custom post type 'bulldog-living'
        $args = array(
            'post_type' => 'bulldog_living',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'orderby' => 'date'
        );

        /* Run the query */
        $query = new WP_Query($args);

        /* Check if there are posts matching the query */
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : 'https://fresnostatehousing.org/wp-content/uploads/2023/06/Victoy-E-scaled.jpg';
        ?>
                <article class="featured-article" style="background-image: url('<?php echo $thumbnail_url ?>');">
                    <div class="Article-Date">
						<span><?php echo get_the_date() ?></span>
					</div> <!-- Article-Date -->

                    <div class="Article-Content">
                        <div class="Article-Ti-Desc">
                            <h2 class="Article-Title"><?php echo wp_trim_words(get_the_title(), 10, '...') ?></h2>
                            <?php if (has_excerpt()) : ?>
                                <p class="Article-Description"><?php echo wp_trim_words(get_the_excerpt(), 50, '...') ?></p>
                            <?php endif; ?>
                        </div> <!-- Article-Ti-Desc -->
                        <a href="<?php the_permalink(); ?>" class="Article-ReadMore">
                            <span class="Link-Text">Read More</span>
                        </a> <!-- Article-ReadMore -->
                </article> <!-- featured-article -->
            <?php endwhile; ?>
            <?php wp_reset_postdata(); // Reset the global post object 
            ?>
        <?php else : ?>
            <p>No featured articles found.</p>
        <?php endif; ?>

    </div> <!-- Container-for-Articles -->
		<div class="dots"></div> <!-- dots-->
</section> <!-- Container-for-Articles-and-Title -->
	<script>
		let slideIndex = 0;
		let timer;

		function showSlides() {
   			let slides = document.querySelectorAll(".featured-article");
    		let dots = document.querySelectorAll(".dot");

    		for (let i = 0; i < slides.length; i++) {
        		slides[i].style.display = "none";  
    		}

    		slideIndex++;

    		if (slideIndex > slides.length) {
        		slideIndex = 1;
    		}    

    		for (let i = 0; i < dots.length; i++) {
        		dots[i].classList.remove("active");
    		}

    		slides[slideIndex-1].style.display = "flex";  
    		dots[slideIndex-1].classList.add("active");

    		timer = setTimeout(showSlides, 5000); // Change slide every 5 seconds
		}

		function createDots() {
    		let slides = document.querySelectorAll(".featured-article");
    		let dotsContainer = document.querySelector(".dots");

    		for (let i = 0; i < slides.length; i++) {
        		let dot = document.createElement("span");
        		dot.classList.add("dot");
        
        		// Adding the click event listener to the dot
        		dot.addEventListener("click", function() {
            		goToSlide(i);
        		});
        
        		dotsContainer.appendChild(dot);
    		}
		}
		
		function goToSlide(index) {
    		slideIndex = index;
    		clearTimeout(timer);  // Clear the current timer
    		showSlides();         // Display the slide
		}

		function addHoverListeners() {
    		let slides = document.querySelectorAll(".featured-article");
    		for (let i = 0; i < slides.length; i++) {
        		slides[i].addEventListener("mouseover", function() {
            		clearTimeout(timer);
        		});
        		slides[i].addEventListener("mouseout", function() {
            		timer = setTimeout(showSlides, 5000); // Restart the slide transition
        		});
    		}
		}

		createDots();
		showSlides();
		addHoverListeners();
	</script>