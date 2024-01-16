<?php

/**
 * Template Name: Page d'Accueil
 */
get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) : the_post();
        the_content(); // Elementor injectera son contenu ici
    endwhile;
    ?>

    <?php
    // Requête personnalisée pour récupérer vos photos
    $args = array(
        'post_type' => 'photos', // Assurez-vous que c'est le bon CPT
        'posts_per_page' => -1   // -1 pour afficher toutes les photos
    );
    $photos_query = new WP_Query($args);

    if ($photos_query->have_posts()) :
        echo '<div class="gallery">'; // Début de la galerie
        while ($photos_query->have_posts()) : $photos_query->the_post();
            // Affichage de chaque photo
            if (has_post_thumbnail()) { // Vérifie si le post a une image à la une
                the_post_thumbnail(); // Affiche l'image à la une du post
            }
        endwhile;
        echo '</div>'; // Fin de la galerie
        wp_reset_postdata();
    else :
        echo 'Aucune photo trouvée.';
    endif;
    ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>