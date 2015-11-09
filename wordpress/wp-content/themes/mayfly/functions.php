<?php
function bgColor($id){
  $bgcolors = array(
    '000',
    '369',
    '396',
    '639',
    '693',
    '936',
    'db5800',
    'db0058',
    '1e6359',
    '59631e'
  );
  if(!$id){$id = get_the_ID();}
  $group = str_split($id);
  $n = count($group);
  $i = 0;
  foreach ($group as $value) {
      $i = $i + $value;
  }
  $current_user = wp_get_current_user();
  global $post;
  $author_id = $post->post_author;
  if($i>=10){
    bgColor($i);
  } else if(is_home()||is_single()&&$current_user->ID==$author_id){
      $i = (int)($i);
      echo '<style type="text/css">body{background:#'.$bgcolors[$i].'}</style>';
  }
}
function page_excerpt() {
  add_post_type_support('page', array('excerpt'));
}
function force_404() {
  if(!is_admin()){
    if(!is_home()&&!is_page('about')&&!is_page('random')){
      $current_user = wp_get_current_user();
      global $post;
      $author_id = $post->post_author;
      if(is_single()&&$current_user->ID!=$author_id){
        status_header(404);
        nocache_headers();
        include(get_query_template('404'));
        die();//motherfucker
      }
    }
  }
}
function remove_private_title($title) {
  return "%s";
}
remove_filter( 'the_excerpt', 'wpautop' );
add_action('init', 'page_excerpt');
add_action( 'wp', 'force_404' );
add_action('wp_head', 'bgColor');
add_filter( 'private_title_format', 'remove_private_title' );
?>