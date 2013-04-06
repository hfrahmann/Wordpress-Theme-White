<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <div class="hf-archive-title">
        <h4>
            <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
            <?php /* If this is a category archive */ if (is_category()) { ?>
                                    <?php printf('Kategorie: &#8216;%s&#8217;', single_cat_title('', false)); ?>
            <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                                    <?php printf('Einträge mit dem Tag &#8216;%s&#8217;', single_tag_title('', false) ); ?>
            <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                                    <?php printf('Archiv für den %s', get_the_time('j. F, Y')); ?>
            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                                    <?php printf('Archiv für %s', get_the_time('F, Y')); ?>
            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                                    <?php printf('Archiv für das Jahr %s', get_the_time('Y')); ?>
            <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                                    Autor-Archiv
            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                                    Archiv
            <?php } ?>
        </h4>
    </div>

<?php while (have_posts()) : the_post(); ?>

<div class="hf-pagepost">
    <div class="hf-post-details">
        <span class="post-detail-date">
            <span class="date_year"><?php the_time("Y") ?></span>
            <span class="date_day"><?php the_time("d") ?></span>
            <span class="date_slash">/</span>
            <span class="date_month"><?php the_time("m") ?></span>
        </span>
        <hr />
        <span class="post-detail-category">
            <span class="info_title">Kategorie</span>
            <span class="info_value"><?php echo get_the_category_list("<br />"); ?></span>
        </span>
        <hr />
        <span class="post-detail-tags">
            <span class="info_title">Tags</span>
            <span class="info_value"><?php the_tags("" . ' ', '<br />', '<br />'); ?></span>
        </span>
        <hr />
        <?php comments_popup_link("Keine Kommentare","Ein Kommentar","% Kommentare", 'hf-commentlink',"<!--closed-->"); ?>
    </div>
    <div class="hf-post-content">
        <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <?php the_content("Weiterlesen"); ?>
    </div>
    <div style="clear:both;"></div>
</div>

<?php endwhile; ?>

<?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } else { ?>
    <div class="hf-paging">
        <span style="float:left;"><?php next_posts_link("&laquo; Ältere Einträge") ?></span>
        <span style="float:right;"><?php previous_posts_link("Neuere Einträge &raquo;") ?></span>
        <div style="clear:left;"></div>
    </div>
    <?php } ?>

<?php else : ?>

    <h1>Kein Eintrag vorhanden</h1>
    <center>Es sind keine Einträge für diese Kategorie vorhanden.</center>
    <?php //get_search_form(); ?>

<?php endif; ?>

<?php get_footer(); ?>