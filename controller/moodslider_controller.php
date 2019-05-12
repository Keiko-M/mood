<?php
require_once '../models/moodslider.php';

$mood = $_GET["mood"];
return searchMovies($mood);
?>

