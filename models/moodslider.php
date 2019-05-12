<?php
function getMood($mood){
    if ($mood == 1) {
        return "Agitated";
    } else if ($mood == 3) {
        return "Calm";
    } else if ($mood == 4) {
        return "Happy"; 
    } else if ($mood == 6) {
        return "Sad"; 
    } else if ($mood == 7) {
        return "Tired"; 
    } else if ($mood == 9) {
        return "Wide Awake"; 
    } else if ($mood == 10) {
        return "Scared"; 
    } else if ($mood == 12) {
        return "Fearless"; 
    }else{
        resetMovies();
    }
} 

function resetMovies() {
    for ($i = 0; $i < 5; $i++) {
        echo "resources/noContent.jpg" . ",";
        echo "No Content" . ";";
    }
}

function searchMovies($mood) { 
    $textMood = getMood($mood);
    $xml = simplexml_load_file("../uploads/Movies.xml") or die("Error: Cannot create object");
    foreach ($xml->children() as $movies) {
        if ($movies->mood == $textMood) {
            echo $movies->image . ",";
            echo $movies->name . ";";
        }
    }
}
?>