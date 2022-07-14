<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$post_query = query_posts(array(
    'post_type' => 'post', // You can add a custom post type if you like
    'paged' => $paged,
    'posts_per_page' => 1,
));

?>

<?php if (have_posts()): ?>

<?php
while (have_posts()): the_post();
    ?>

	<?php endwhile;?>

///Pagination Function in Functions.php
<?php // my_pagination();?>

<?php else: ?>

    No Results

<?php endif;?>