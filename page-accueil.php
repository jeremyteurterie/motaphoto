<?php

/**
 * Template Name: Page d'Accueil
 */
get_header();
?>

<main id="primary" class="site-main">

    <div class="hero">
        <h1 class="title-hero">Photographe Event</h1>
        <img src="http://motaphoto.local/wp-content/uploads/2024/01/nathalie-11-scaled.jpeg" alt="image header">
    </div>

    <div class="post-photo">
        <form class='filter-form' action="" method="get">
            <div class="filter-1">
                <select class="filter-categorie" name="categorie">
                    <option value="">Catégorie</option>
                    <?php
                    // Récupérez les catégories WordPress et ajoutez-les aux options du sélecteur.
                    $categories = get_terms('categorie', array('hide_empty' => false));
                    foreach ($categories as $category) :
                    ?>
                        <option value="<?php echo esc_attr($category->term_id); ?>"><?php echo esc_html($category->name); ?></option>
                    <?php endforeach; ?>
                </select>

                <select class="filter-format" name="format">
                    <option value="">Format</option>
                    <?php
                    // Récupérez les termes de taxonomie "format" et ajoutez-les aux options du sélecteur.
                    $formats = get_terms('format', array('hide_empty' => false));
                    foreach ($formats as $format) :
                    ?>
                        <option value="<?php echo esc_attr($format->term_id); ?>"><?php echo esc_html($format->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filter-2">
                <select class="filter-order" name="order">
                    <option value="">Trier par</option>
                    <option value="desc" <?php if ($order === "desc") : ?>selected<?php endif; ?>>A partir des plus récentes</option>
                    <option value="asc" <?php if ($order === "asc") : ?>selected<?php endif; ?>>A partir des plus anciennes</option>
                </select>
            </div>
        </form>


        <section class="publication">
            <div class="photo-grid">
                <?php
                // Exemple de boucle WordPress pour afficher les 8 photos (vous devez personnaliser cette boucle selon vos besoins).
                $args = array(
                    'post_type' => 'photo',
                    'posts_per_page' => 8 // Nombre de photos à afficher
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post();
                ?>
                        <div class="photo-item">
                            <h3 class="title-photo"><?php the_title(); ?></h3>
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'categorie');
                            if (!empty($categories)) {
                                echo '<h4 class="categorie-photo">' . esc_html($categories[0]->name) . '</h4>';
                            }
                            ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); // Vous pouvez personnaliser la taille de la miniature 
                                ?>
                            </a>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'Aucune photo trouvée.';
                endif;
                ?>
            </div>
        </section>
    </div>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>