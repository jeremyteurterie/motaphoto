<?php

// Récupérer la taxonomie actuelle
$terms_categorie = wp_get_post_terms(get_the_ID(), 'categorie');
$categorie = !empty($terms_categorie) ? esc_html($terms_categorie[0]->name) : 'Inconnue';

$terms_format = wp_get_post_terms(get_the_ID(), 'format');
$format = !empty($terms_format) ? esc_html($terms_format[0]->name) : 'Inconnu';

// $term = get_queried_object();
// $term_id  = get_the_terms(get_the_ID(), $term);

// Récupération du nom de la catégorie et du format
// $categorie  = get_field('categorie');
// $format = get_field('format');
// $reference = get_field('reference');

$reference = get_field('reference');
$type = get_field('type');
$annee = get_field('annee');
// $essais = get_field('categorie-acf');
?>

<article class="container__photo flexcolumn">
    <div class="photo__info flexrow">
        <div class="photo__info--description flexcolumn">
            <h2 class="title-single-photo"><?php the_title(); ?></h2>
            <ul class="flexcolumn">
                <!-- Affiche les données ACF -->
                <li class="reference">Référence :
                    <?php
                    // $reference = get_post_meta(get_the_ID(), 'reference', true);
                    if ($reference) {
                        echo $reference;
                    } else {
                        echo ('Inconnue');
                    }
                    ?>
                </li>
                <li>Catégorie :
                    <?php
                    if ($categorie) {
                        echo $categorie;
                    } else {
                        echo ('Inconnue');
                    }
                    ?>
                </li>
                <li>Format :
                    <?php
                    if ($format) {
                        echo $format;
                    } else {
                        echo ('Inconnu');
                    }
                    ?>
                </li>
                <li>Type :
                    <?php
                    if ($type) {
                        echo $type;
                    } else {
                        echo ('Inconnu');
                    }
                    ?>
                </li>
                <li>Année :
                    <?php echo the_time('Y'); ?>
                </li>
            </ul>
        </div>
        <div class="photo__info--image flexcolumn">
            <div class="container--image brightness">
                <?php the_post_thumbnail('medium_large'); ?>
                <span class="openLightbox"></span>
            </div>
        </div>
    </div>
</article>