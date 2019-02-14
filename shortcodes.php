<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function thetahealing_terapeutas_map($atts)
{
  wp_enqueue_style('terapeutas-mapa-css', plugins_url('mapas/style.css', __FILE__ ));
  wp_register_script( 
      'terapeutas-mapa-js', 
      plugins_url('mapas/script.js', __FILE__ ), 
      array('jquery')
  );
  wp_enqueue_script('terapeutas-mapa-js');

  $args = array (
    'post_type'       => array('terapeuta'),
    'post_status'     => array('publish'),
    'nopaging'        => true,
    'order'           => 'ASC',
    'orderby'         => 'post_title',
  );

  $query = new WP_Query( $args );

  $terapeutas = [];
  $ufs = [];
  if ($query->have_posts() ) {
    $posts = $query->posts;
    foreach ($posts as $post) {
      $terapeutas[] = $post;

      /*
      while(have_rows('cidadeuf', $post->ID)) {
        $row = get_row();
        if (empty($ufs[$row['uf']])) {
          $ufs[$row['uf']] = [];
        }

        $ufs[$row['uf']][] = $post->ID;
      }
      */
    }
  }

  // Restore original Post Data
  wp_reset_postdata();

  ob_start();
  include __DIR__ . '/mapas/index.php';
  return ob_get_clean();
}

add_shortcode('terapeutas_mapa', 'thetahealing_terapeutas_map');