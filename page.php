<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="hf-pagepost">
    <div class="hf-post-details"></div>
    <div class="hf-post-content">
        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>
    </div>

    <div style="clear:both;"></div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>