<?php
require_once '../models/moodslider.php';

//create variable $mood (Javascript sends the mood as Get request) 
$mood = $_GET["mood"];

//Run function searchMovies on models/moodslider.php
return searchMovies($mood);
?>

