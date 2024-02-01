<?php
// Obtenez l'ID du post actuel pour l'exclure des suggestions
$current_post_id = get_the_ID();

// Obtenez les catégories du post actuel
$categories = wp_get_post_terms($current_post_id, 'category', ['fields' => 'ids']);

// Préparez la requête personnalisée
$args = [
    'post_type'      => 'post', // ou votre type de post personnalisé si nécessaire
    'posts_per_page' => 2, // Limite à 2 suggestions
    'category__in'   => $categories, // Utilisez les catégories du post actuel
    'post__not_in'   => [$current_post_id], // Excluez le post actuel
    'orderby'        => 'rand', // Affichage aléatoire, vous pouvez choisir autre chose
];

// Effectuez la requête personnalisée
$the_query = new WP_Query($args);

// Vérifiez si la requête renvoie des posts
if ($the_query->have_posts()) : ?>
    <div class="photo__others--images flexrow">
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="suggested-post">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                <?php endif; ?>
                <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
            </div>
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <p>Désolé, aucun article ne correspond à cette requête</p>
<?php endif;
?>