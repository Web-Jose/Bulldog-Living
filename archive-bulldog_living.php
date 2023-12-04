<?php get_header(); ?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	
section.Container-for-Articles-and-Title{
    max-width: 960px;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
	gap: 1em;
	margin: 1rem 0;
	justify-content: center;
}
	
section.Container-for-Sub-Articles, section.Container-for-Upcoming-Events, section.Container-for-RA-Events{
    max-width: 960px;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
	gap: 1em;
	margin: 1rem 0;
}
	
article.featured-article {
    height: 516px;
    background-size: cover;
    background-repeat: no-repeat;
    flex-direction: row;
    justify-content: space-between;
    padding: 1em;
	max-width: 936px;
	animation: slide 15s infinite;
    display: none;
	border-radius: 3em;
	box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
}

.Article-Date {
    background: white;
    padding: 1em;
    border-radius: 2em;
    height: max-content;
}

.Article-Date span {
    font-family: 'Montserrat', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    color: black;
}

.Article-Content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-end;
	width: 50%;
}
	
h2.Article-Title, h2.Sub-Article-Title {
    font-family: 'Montserrat', sans-serif;
    font-size: 2rem;
    line-height: 1;
    color: black;
    font-weight: 700;
}

.Article-Ti-Desc {
    background: white;
    padding: 1em;
    border-radius: 2em;
}

.Article-ReadMore {
    background: #C41230;
    padding: 1em;
    border-radius: 2em;
	transition: all 0.3s ease-in-out;
}

span.Link-Text {
	display: flex;
	justify-content: flex-end;
    font-family: 'Montserrat', sans-serif;
    font-size: 1rem;
    line-height: 1;
    color: white;
    font-weight: 700;
	transition: all 0.3s ease-in-out;
}

.Article-ReadMore:hover {
    background: #13284c;
}
	
.dots {
    display: flex;
    justify-content: center;
    align-items: center;
	position:relative;
	z-index:1;
}

.dot {
    height: 15px;
    width: 15px;
    margin: 0 5px;
    background-color: #b8bfc9;
	display: inline-block;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.3s ease;
	cursor: pointer;
}

.dot.active {
    background-color: #13284c;
}

.Upcoming-Event-Thumbnail, .RA-Event-Thumbnail {
    width: 100%;
	overflow: hidden;
    border-radius: 0.25em;
}

article.Upcoming-Event, article.RA-Event {
    display: flex;
    flex-direction: column;
    padding: .75em;
    gap: .5em;
    width: calc(((100% - 2em) - (0.75em * 6)) / 3);
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    border-radius: 1em;
	background: #f3f5f6;
}

.Upcoming-Event-Content, .RA-Event-Content {
    display: flex;
    flex-direction: column;
	flex-grow: 1;
    justify-content: space-between;
	gap: 0.5em;
}

.Upcoming-Event-Thumbnail img, .RA-Event-Thumbnail img {
    width: 100%;
	object-fit: cover;
}

h2.Upcoming-Events-Title, h2.RA-Events-Title {
    width: 100%;
	font-family: 'Montserrat', sans-serif;
    font-size: 2rem;
    line-height: 1;
    color: black;
    font-weight: 700;
}

.Sub-Article-Link {
	background: #C41230;
    padding: 1em;
    border-radius: 2em;
	transition: all 0.3s ease-in-out;
	align-self: flex-end;
}
	
.Sub-Article-Link:hover {
    background: #13284c;
}
	
article.Sub-Article {
    display: flex;
    flex-direction: row;
	gap: 1%;
	align-items: stretch;
	padding: 0.5em;
	border-radius: 2em;
	box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
	background: #f3f5f6;
	width: 100%;
}

.Sub-Article-Thumbnail {
    width: 25%;
	border-radius: 18px 0 0 18px;
    overflow: hidden;
}
	
.Sub-Article-Thumbnail img {
    width: 100%;
	height: 100%;
    object-fit: cover;
}

.Sub-Article-Ti-Da {
    display: flex;
    justify-content: space-between;
	align-items: baseline;
}

.Sub-Article-Content {
    width: 74%;
    display: flex;
    flex-direction: column;
	flex-grow: 1;
    justify-content: space-between;
	gap: 1em;
}
	
.Sub-Article-Ti-Des {
	display: flex;
    flex-direction: column;
    gap: 1em;	
}

span.Sub-Article-Date {
    font-family: 'Montserrat', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    color: black;
}
	
.Upcoming-Event-Link, .RA-Event-Link {
	background: #C41230;
    width: 2.5em;
    height: 2.5em;
    border-radius: 50%;
    transition: all 0.3s ease-in-out;
    align-self: flex-end;
    text-align: center;
    line-height: 2.5em;
}

.Sub-Article-Link span, .Upcoming-Event-Link span, .RA-Event-Link span{
	font-family: 'Montserrat', sans-serif;
    font-size: 1rem;
    color: white;
    font-weight: 700;
	transition: all 0.3s ease-in-out;
}
	
.Upcoming-Event-Link:hover, .RA-Event-Link:hover {
    background: #13284c;
}
	
p.Article-Description, p.Sub-Article-Description {
    font-family: 'Karla', sans-serif;
    font-size: 1.5em;
    line-height: 1;
	margin: 0;
}
	
p.Upcoming-Event-Description, p.RA-Event-Description {
    font-family: 'Karla', sans-serif;
    font-size: 1.25em;
    line-height: 1;
	margin: 0;
}
	
span.Upcoming-Event-Date, span.RA-Event-Date {
    font-family: 'Karla', sans-serif;
    font-size: 1.25em;
    line-height: 1;
    font-weight: 700;
}
	
.Upcoming-Event-Ti-Da-Des, .Upcoming-Event-Ti-Da, .RA-Event-Ti-Da, .RA-Event-Ti-Da-Des {
    display: flex;
    flex-direction: column;
    gap: 0.5em;
}
	
h2.Upcoming-Event-Title, h2.RA-Event-Title {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.25rem;
    font-weight: 700;
    color: black;
}
	
@media only screen and (max-width: 768px) {
    article.featured-article {
        height: 382px;
    }
	
	article.Upcoming-Event {
    	width: calc(((100% - 2em) - (0.75em * 4)) / 2);
	}
	
	article.RA-Event {
    	width: calc(((100% - 2em) - (0.75em * 4)) / 2);
	}
}

@media only screen and (max-width: 425px) {
    article.featured-article {
        height: 201px;
    }
	
	article.Article-Content {
		width: 100%;
	}
	
	article.Article-Date {
    	display: none;
	}
	
	h2.Article-Title, h2.Sub-Article-Title {
		font-size:1.5rem;
	}
	
	p.Article-Description {
		display: none;
	}
	
	article.Upcoming-Event {
    	width: 100%;
	}
	
	article.RA-Event {
    	width: 100%;
	}
	
	article.Sub-Article {
		flex-direction: column;
	}
	
	.Sub-Article-Thumbnail {
		width: 100%;
		border-radius: 18px 18px;
	}
	
	.Sub-Article-Content {
		width: 100%;
		gap: 0.5em;
	}
	
	.Sub-Article-Ti-Des {
		gap: 0.5em;
	}
	
	.Sub-Article-Ti-Da {
		flex-direction: column;
		gap: 0.5em;
	}
}

@media only screen and (max-width: 375px) {
    article.featured-article {
        height: 175px;
    }
}

@media only screen and (max-width: 320px) {
    article.featured-article {
        height: 145px;
    }
}

</style>

<script src="https://kit.fontawesome.com/6b31c68f8b.js" crossorigin="anonymous"></script>

<?php
// Load saved values in Academia Theme Options
$academia_options = academia_get_global_options();
?>

<div id="content">
    <div class="wrapper wrapper-content-main">
        <div class="academia-column academia-column-main academia-column-marginright">
            <?php get_template_part('breadcrumbs'); ?>

            <?php get_template_part('featured_articles'); ?>

            <?php get_template_part('subsequent_articles'); ?>

            <?php get_template_part('upcoming_events'); ?>

            <?php get_template_part('RA_Events'); ?>

            <div class="cleaner">&nbsp;</div>

        </div><!-- .academia-column .academia-column-main .academia-column-marginright -->

        <aside class="academia-column academia-column-aside academia-column-last">

            <?php get_sidebar(); ?>

            <div class="cleaner">&nbsp;</div>

        </aside><!-- .academia-column .academia-column-aside .academia-column-last -->

        <div class="cleaner">&nbsp;</div>

    </div><!-- .wrapper .wrapper-content-main -->

</div><!-- #content -->

<?php get_footer(); ?>