<?php

$xml = simplexml_load_file("../uploads/Movies.xml") or die("Error: Cannot create object");
$obj = json_decode(json_encode($xml));
$programmes = $obj->programme;

$decorded = json_decode(messageJSON, true);
echo $decorded;

$label1 = "Agitated";
$label2 = "Happy";
$label3 = "Tired";
$label4 = "Scared";

$fourMatch = $threeMatch = $twoMatch = $oneMatch = $zeroMatch = array();

//processMatch($programmes, $label1, $label2, $label3, $label4);
//$orderedResult = getMoviesByPreference();
//searchMovies();


function processMatch($programmes, $label1, $label2, $label3, $label4) {

    for ($i = 0; $i < 40; $i++) {
        global $fourMatch;
        global $threeMatch;
        global $twoMatch;
        global $oneMatch;
        global $zeroMatch;

        $movie = $programmes[$i];
        $movieLabel1 = $programmes[$i]->label1;
        $movieLabel2 = $programmes[$i]->label2;
        $movieLabel3 = $programmes[$i]->label3;
        $movieLabel4 = $programmes[$i]->label4;

        $matchResult = checkMatch($movieLabel1, $movieLabel2, $movieLabel3, $movieLabel4);
        if ($matchResult == 4) {
            array_push($fourMatch, $movie);
        } elseif ($matchResult == 3) {
            array_push($threeMatch, $movie);
        } elseif ($matchResult == 2) {
            array_push($twoMatch, $movie);
        } elseif ($matchResult == 1) {
            array_push($oneMatch, $movie);
        } else {
            array_push($zeroMatch, $movie);
        }
    }
}

function checkMatch($movieLabel1, $movieLabel2, $movieLabel3, $movieLabel4) {
    global $label1;
    global $label2;
    global $label3;
    global $label4;

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
    $MoviesOrderedByMatches = array();
    global $fourMatch;
    global $threeMatch;
    global $twoMatch;
    global $oneMatch;
    global $zeroMatch;

    return array_merge($fourMatch, $threeMatch,$twoMatch, $oneMatch, $zeroMatch );
//    array_push($MoviesOrderedByMatches, $threeMatch);
//    array_push($MoviesOrderedByMatches, $twoMatch);
//    array_push($MoviesOrderedByMatches, $oneMatch);
//    array_push($MoviesOrderedByMatches, $zeroMatch);

//    return $MoviesOrderedByMatches;
}

//$result = $orderedResult; 
//$result1 = $orderedResult[0]->image; 
//$result2 = $orderedResult[1]->image; 
//
//print_r($result1);
//print_r($result2);


function searchMovies() { 
    global $orderedResult;
    for ($i = 0; $i < 5; $i++) {   
            echo $orderedResult[$i]->image . ",";
            echo $orderedResult[$i]->name . ";";
        }
    }
?>