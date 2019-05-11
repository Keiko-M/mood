<?php

$mood = $_GET["mood"];

function getMovies($mood) {
    if ($mood == 1) {
        $mood = "Agitated";
    } else if ($mood == 3) {
        $mood = "Calm";
    } else if ($mood == 4) {
        $mood = "Happy"; 
    } else if ($mood == 6) {
        $mood = "Sad"; 
    } else if ($mood == 7) {
        $mood = "Tired"; 
    } else if ($mood == 9) {
        $mood = "Wide Awake"; 
    } else if ($mood == 10) {
        $mood = "Scared"; 
    } else if ($mood == 12) {
        $mood = "Fearless"; 
    }
//}   
//
//function getMovies($input) {
//    getMood($input);
    $xml = simplexml_load_file("uploads/Movies.xml") or die("Error: Cannot create object");
    foreach ($xml->children() as $movies) {
        if ($movies->mood == "$mood") {
            echo $movies->image . ",";
            echo $movies->name . ";";
        }
    }
}

getMovies($mood);
?>


