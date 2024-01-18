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

    <div class="filter-area">
        <form class='filter-form' action="" method="get">
            <div class="filter-1">
                <select class="filter-categorie" name="categorie">
                    <option value="">Catégorie</option>
                    <!-- Insérez ici les options de catégorie dynamiques -->
                </select>

                <select class="filter-format" name="format">
                    <option value="">Format</option>
                    <!-- Insérez ici les options de format dynamiques -->
                </select>
            </div>
            <div class="filter-2">
                <select class="filter-order" name="order">
                    <option value="">Trier par</option>
                </select>
            </div>
        </form>
    </div>

    <section class="publication"></section>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>