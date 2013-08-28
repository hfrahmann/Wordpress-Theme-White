<?php get_header(); ?>

<?php if (have_posts()) : the_post(); ?>

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
    </div>
    <div class="hf-post-content">
        <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <?php the_content("Weiterlesen"); ?>
    </div>
    <div style="clear:both;"></div>
</div>


<?php comments_template(); ?>

<?php endif; ?>


<?php get_footer(); ?>