<?php get_header(); ?>
    <section class="main-section">
      <div class="row fluid">
        <div class="columns">
          <?php while ( have_posts() ) : the_post(); ?>
            <div <?php post_class(); ?>>
              <h1>
                <a href="<?php echo get_post_meta($post->ID, 'url', true); ?>">
                  <?php the_title(); ?>
                  <span class="excerpt"><?php the_excerpt(); ?></span>
<?php if(!is_home()){?>
                  <span class="button round">Check this!</span>
<?php } ?>
                </a>
              </h1>
            </div><!-- /.hentry -->
          <?php endwhile; ?>
        </div><!-- /.row -->
      </div><!-- /.columns -->
    </section>
<?php get_footer(); ?>