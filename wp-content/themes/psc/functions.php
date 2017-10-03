<?php
// Define menus
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


// Breadcrumbs
// Breadcrumbs
function custom_breadcrumbs() {
  // Settings
  $separator         = '&raquo;';
  $breadcrumbs_id    = 'breadcrumbs';
  $breadcrumbs_class = 'breadcrumbs';
  $home_title        = 'Home';

  // Get the query & post information
  global $post,$wp_query;
     
  // Do not display on the homepage
  if ( !is_front_page() ) {
    // Build the breadcrumbs
    echo '<ul id="' . $breadcrumbs_id . '" class="' . $breadcrumbs_class . '">';
       
    // Home page
    echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
    echo '<li class="separator separator-home"> ' . $separator . ' </li>';
       
    if ( is_page() ) {
      // Standard page
      if( $post->post_parent ){
        // If child page, get parents 
        $anc = get_post_ancestors( $post->ID );
           
        // Get parents in the right order
        $anc = array_reverse($anc);
           
        // Parent page loop
        if ( !isset( $parents ) ) $parents = null;
        foreach ( $anc as $ancestor ) {
          $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
          $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
        }
           
        // Display parent pages
        echo $parents;
           
        // Current page
        echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
      } else {
        // Just display current page if not parents
        echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
      }
    } else if ( is_search() ) {
      // Search results page
      echo '<li class="item-current item-current-' . get_search_query() . '">Search results for: ' . get_search_query() . '</li>';
    } elseif ( is_404() ) {
      // 404 page
      echo '<li>' . 'Error 404' . '</li>';
    }
   
    echo '</ul>';
  }
}


// Add widgets
function psc_widgets() {
  register_sidebar(array(
    'name'          => 'Logo',
    'id'            => 'logo',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span style="display: none;">',
    'after_title'   => '</span>'
  ));
  register_sidebar(array(
    'name'          => 'Header Tagline',
    'id'            => 'header_tagline',
    'before_widget' => '<div id="tagline">',
    'after_widget'  => '</div>',
    'before_title'  => '<span style="display: none;">',
    'after_title'   => '</span>'
  ));
  register_sidebar(array(
    'name'          => 'Made in USA',
    'id'            => 'usa',
    'before_widget' => '<div id="usa">',
    'after_widget'  => '</div>',
    'before_title'  => '<span style="display: none;">',
    'after_title'   => '</span>'
  ));
}
add_action( 'widgets_init', 'psc_widgets' );


// Redirect Contact Form 7 to thank you page on submit
function to_thank_you(){ ?>
  <script>
    document.addEventListener('wpcf7mailsent', function( event ) {
      location = '<?php echo home_url(); ?>/thank-you';
    }, false );
  </script>
<?php } 
add_action('wp_footer', 'to_thank_you');


// Wrap tables in DIVs so they will scroll responsively
function wrap_table($content) {
  $pattern = '~<table.*?</table>~';
    return preg_replace_callback($pattern, function($matches) {
        return '<div>' . $matches[0] . '</div>';
    }, $content);
}
add_filter('the_content', 'wrap_table');


function fg_search_filter($query) {
  if ($query->is_search) {
    $query->set('post_type', array('post','page'));
  }
  return $query;
}
add_filter('pre_get_posts','fg_search_filter');
?>