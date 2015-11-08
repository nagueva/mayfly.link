<?php get_header(); ?>
    <section class="main-section">
      <div class="row fluid">
        <div class="columns">
          <?php while ( have_posts() ) : the_post(); ?>
            <div <?php post_class(); ?>>
              <h1>
                <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                  <span class="excerpt"><?php the_excerpt(); ?></span>
                </a>
              </h1>
              <div class="entry-content">
                <?php the_content(); ?>
              </div><!-- /.entry-content -->
            </div><!-- /.hentry -->
          <?php endwhile; ?>
        </div><!-- /.row -->
      </div><!-- /.columns -->
    </section>
<?php get_footer(); ?>