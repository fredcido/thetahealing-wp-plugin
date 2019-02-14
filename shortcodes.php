<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function thetahealing_terapeutas_map($atts)
{
  wp_enqueue_style('terapeutas-mapa-css', plugins_url('mapas/style.css', __FILE__ ));
  wp_enqueue_script('terapeutas-mapa-js', plugins_url('mapas/script.js', __FILE__ ), array('jquery'));

  $args = array (
    'post_type'       => array('terapeuta'),
    'post_status'     => array('publish'),
    'nopaging'        => true,
    'order'           => 'ASC',
    'orderby'         => 'post_title',
  );

  $posts = new WP_Query( $args );

  $terapeutas = [];
  $ufs = [];
  if ($posts->have_posts() ) {
    while ($posts->have_posts()) {
      $posts->the_post();
      $post = $posts->post;
      $terapeutas[] = $post;

      while(have_rows('cidadeuf', $post->ID)) {
        the_row();
        $row = get_row();
        if (empty($ufs[$row['uf']])) {
          $ufs[$row['uf']] = [];
        }

        $ufs[$row['uf']][] = $post->ID;
      }
    }
  }

  // Restore original Post Data
  wp_reset_postdata();

  ob_start();
  include __DIR__ . '/mapas/index.php';
  return ob_get_clean();
}

add_shortcode('terapeutas_mapa', 'thetahealing_terapeutas_map');