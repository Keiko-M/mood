<?php

$fourMatch = $threeMatch = $twoMatch = $oneMatch = $zeroMatch = array();

function processMatch($label1, $label2, $label3, $label4) {
    $xml = simplexml_load_file("../uploads/Movies.xml") or die("Error: Cannot create object");
    $obj = json_decode(json_encode($xml));
    $programmes = $obj->programme;

    for ($i = 0; $i < count($programmes); $i++) {
        global $fourMatch;
        global $threeMatch;
        global $twoMatch;
        global $oneMatch;
        global $zeroMatch;
        
        $movieLabel1 = $programmes[$i]->label1;
        $movieLabel2 = $programmes[$i]->label2;
        $movieLabel3 = $programmes[$i]->label3;
        $movieLabel4 = $programmes[$i]->label4;
        
        $matchResult = checkMatch($movieLabel1, $movieLabel2, $movieLabel3, $movieLabel4, $label1, $label2, $label3, $label4);
        
        if ($matchResult == 4) {
            array_push($fourMatch, $programmes[$i]);
        } elseif ($matchResult == 3) {
            array_push($threeMatch, $programmes[$i]);
        } elseif ($matchResult == 2) {
            array_push($twoMatch, $programmes[$i]);
        } elseif ($matchResult == 1) {
            array_push($oneMatch, $programmes[$i]);
        } else {
            array_push($zeroMatch, $programmes[$i]);
        }
    }
}

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

function getMoviesByPreference() {
    global $fourMatch;
    global $threeMatch;
    global $twoMatch;
    global $oneMatch;
    global $zeroMatch;
    return array_merge($fourMatch, $threeMatch, $twoMatch, $oneMatch, $zeroMatch);
}

function searchMovies($mood) {
    $obj = json_decode($mood);
    processMatch($obj->label1, $obj->label2, $obj->label3, $obj->label4);
    $orderedResult = getMoviesByPreference();
    for ($i = 0; $i < 5; $i++) {
        echo $orderedResult[$i]->image . ",";
        echo $orderedResult[$i]->name . ";";
    }
}

?>