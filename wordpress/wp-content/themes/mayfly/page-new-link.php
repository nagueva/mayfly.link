<?php
$status_msg = array(
    'publish' => 'Cool! Your link was published.',
    'future' => 'Okie dokie, your link was scheduled.',
    'error' => 'Sorry, but all the fields are required.'
);
if(is_user_logged_in()&&!empty($_POST)){

    $title = $_POST['mayfly-title'];
    $excerpt = $_POST['mayfly-excerpt'];
    $url = $_POST['mayfly-url'];

    if(!empty($title)&&!empty($excerpt)&&!empty($url)){
        $current_user = wp_get_current_user();
        
        $scheduled = new WP_Query('post_status=future&order=DESC&showposts=1&author='.$current_user->ID);
        $published = new WP_Query('post_status=publish&order=DESC&showposts=1&author='.$current_user->ID);
        if ($scheduled->have_posts()) {
            while ($scheduled->have_posts()) : $scheduled->the_post();
                $time = get_the_time('Y-m-d H:i:s');
            endwhile;
        } else if ($published->have_posts()){
            while ($published->have_posts()) : $published->the_post();
                $time = get_the_time('Y-m-d H:i:s');
            endwhile;
        } else {
            $time = date('Y-m-d H:i:s');
        }
        if(strtotime($time) < strtotime('today')){
            $time = date('Y-m-d H:i:s');
            $status = 'publish';
        } else {
            $time = date("Y-m-d H:i:s", strtotime($time.'+1 day'));
            $status = 'future';
        }
        
        $new_post = array(
            'post_title' => $title,
            'post_excerpt' => $excerpt,
            'post_status' => $status,
            'post_date' => $time,
            'post_date_gmt' => $time,
            'post_author' => $current_user->ID
        );
        
        $post_id = wp_insert_post($new_post);
        add_post_meta($post_id, 'url', $url, true);

        $title = '';
        $excerpt = '';
        $url = '';

    } else {
        $status = 'error';
    }

}
?>
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
              <div class="row">
                <div class="columns large-10 large-offset-1">
                    <?php if(isset($status)){ ?>
                    <div data-alert class="alert-box <?php if($status=='error'){echo 'warning';} else {echo 'success';} ?> round">
                        <?php echo $status_msg[$status]; ?>
                        <a href="#" class="close">&times;</a>
                    </div>
                    <?php } ?>
                  <form id="new-link" action="<?php the_permalink(); ?>" method="post">
                      <input type="text" name="mayfly-title" id="mayfly-title" value="<?php echo $title; ?>" placeholder="Title of your mayfly link">
                      <textarea name="mayfly-excerpt" id="mayfly-excerpt" placeholder="A small description"><?php echo $excerpt; ?></textarea>
                      <input type="url" name="mayfly-url" id="mayfly-url" value="<?php echo $url; ?>" placeholder="The URL (http://example.com)">
                      <input type="submit" value="Post link" class="large button">
                  </form>
                </div><!-- /.columns -->
              </div><!-- /.row -->
            </div><!-- /.hentry -->
          <?php endwhile; ?>
        </div><!-- /.row -->
      </div><!-- /.columns -->
    </section>
<?php get_footer(); ?>