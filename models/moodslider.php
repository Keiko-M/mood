<?php

//create ampty arrays (to be used to store each movie based on match level)
$fourMatch = $threeMatch = $twoMatch = $oneMatch = $zeroMatch = array();

function processMatch($label1, $label2, $label3, $label4) {
    //Interprets an XML file into an object
    $xml = @simplexml_load_file("../uploads/Movies.xml") or die("Error: Cannot create object");
    //Converts to Json string - > Json Object for easier manupulation 
    $obj = json_decode(json_encode($xml));
    //Variable $programmes contains each programme in the xml file
    $programmes = $obj->programme;

    //for loop to fill the five arrays based on match level.
    for ($i = 0; $i < count($programmes); $i++) {

        //Create variable for label 1,2,3,4 of the movie data to be used as parameters below. 
        $movieLabel1 = $programmes[$i]->label1;
        $movieLabel2 = $programmes[$i]->label2;
        $movieLabel3 = $programmes[$i]->label3;
        $movieLabel4 = $programmes[$i]->label4;

        //run function checkMatch and Create $matchResult to use the the match level. 
        $matchResult = checkMatch($movieLabel1, $movieLabel2, $movieLabel3, $movieLabel4, $label1, $label2, $label3, $label4); 
        createMatchArray($matchResult,$programmes[$i]);
    }
}

//check the match for each label if $movieLabel1(xml)= $label1(user input). If matched, increase $matchLevel by 1. 
function checkMatch($movieLabel1, $movieLabel2, $movieLabel3, $movieLabel4, $label1, $label2, $label3, $label4) {
    $matchLevel = 0;
    if ($movieLabel1 == $label1) {
        $matchLevel++;
    }
    if ($movieLabel2 == $label2) {
        $matchLevel++;
    }
    if ($movieLabel3 == $label3) {
        $matchLevel++;
    }
    if ($movieLabel4 == $label4) {
        $matchLevel++;
    }
    return $matchLevel;
}

function createMatchArray($matchResult,$programmes) {
    global $fourMatch;
    global $threeMatch;
    global $twoMatch;
    global $oneMatch;
    global $zeroMatch;
    //Based on the match level, push the programm to the correct array 
    if ($matchResult == 4) {
        array_push($fourMatch, $programmes);
    } elseif ($matchResult == 3) {
        array_push($threeMatch, $programmes);
    } elseif ($matchResult == 2) {
        array_push($twoMatch, $programmes);
    } elseif ($matchResult == 1) {
        array_push($oneMatch, $programmes);
    } else {
        array_push($zeroMatch, $programmes);
    }
}

//Combine all the arrays in order of match levels  
function getMoviesByPreference() {
    global $fourMatch;
    global $threeMatch;
    global $twoMatch;
    global $oneMatch;
    global $zeroMatch;
    return array_merge($fourMatch, $threeMatch, $twoMatch, $oneMatch, $zeroMatch);
}

function searchMovies($mood) {
    //Convert the json string from the GET to a json object
    $obj = json_decode($mood);
    //Run processMatch based on user input
    processMatch($obj->label1, $obj->label2, $obj->label3, $obj->label4);
    // function getMoviesByPreference. $orderedResult will have all the programmes in order of match levels.
    $orderedResult = getMoviesByPreference();

    //Take the first 5 programmes and echo out image path and name. This will be picked up by javascript
    for ($i = 0; $i < 5; $i++) {
        echo $orderedResult[$i]->image . ",";
        echo $orderedResult[$i]->name . ";";
    }
}

?>