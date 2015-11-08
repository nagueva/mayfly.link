<?php get_header(); ?>
<?php
if ( !defined('DONOTCACHEPAGE') ){
  define('DONOTCACHEPAGE',true);
}
?>
    <section class="main-section">
      <div class="row fluid">
        <div class="columns">
        <?php
        $latest = get_posts("post_type=post&numberposts=1");
        $query = new WP_Query(array('orderby'=>'rand','post_type'=>'post','post__not_in'=>array($latest[0]->ID)));
          while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php post_class(); ?>>
            <?php $post_time = get_the_date(); ?>
              <h1>
                <a href="<?php echo get_post_meta($post->ID, 'url', true); ?>">
                  <?php the_title(); ?>
                  <span class="excerpt"><?php the_excerpt(); ?></span>
                  <span class="button round">Check this!</span>
                </a>
              </h1>
            </div><!-- /.hentry -->
          <?php endwhile; ?>
        </div><!-- /.row -->
      </div><!-- /.columns -->
    </section>
<?php get_footer(); ?>