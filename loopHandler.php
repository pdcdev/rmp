<?php

// our includes
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Our vars
$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 0;
$page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
$postType = (isset($_GET['[postType]'])) ? $_GET['postType'] : 0;;

?>

<?php wp_reset_query(); ?>