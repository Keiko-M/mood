<?php
require_once '../models/moodslider_1.php';

$mood = $_GET["mood"];
return searchMovies($mood);
?>

