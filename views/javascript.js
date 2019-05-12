var Range1 = document.getElementById("Range1");
var Range2 = document.getElementById("Range2");
var Range3 = document.getElementById("Range3");
var Range4 = document.getElementById("Range4");

Range1.onchange = function () {
    updateContent();
}

Range2.onchange = function () {
    updateContent();
}

Range3.onchange = function () {
    updateContent();
}

Range4.onchange = function () {
    updateContent();
}

function slider1Value() {
    if (Range1.value == 1) {
        return "Agitated";
    } else if (Range1.value == 3) {
        return "Calm";
    } else {
        return "";
    }
}

function slider2Value() {
    if (Range2.value == 1) {
        return "Happy";
    } else if (Range2.value == 3) {
        return "Sad";
    } else {
        return "";
    }
}

function slider3Value() {
    if (Range3.value == 1) {
        return "Tired";
    } else if (Range3.value == 3) {
        return "Wide Awake";
    } else {
        return "";
    }
}

function slider4Value() {
    if (Range4.value == 1) {
        return "Scared";
    } else if (Range4.value == 3) {
        return "Fearless";
    } else {
        return "";
    }
}

function getSliderValues() {
    return {"label1": slider1Value(), "label2": slider2Value(), "label3": slider3Value(), "label4": slider4Value()};
}

function updateContent() {
    messageJSON = getSliderValues();
    if (messageJSON.label1 == "" && messageJSON.label2 == "" && messageJSON.label3 == "" && messageJSON.label4 == "") {
        resetCards();
    } else {
        displayMovies(messageJSON);
    }
}

function displayMovies(value) {
    $.ajax({
        type: "GET",
        url: "controller/moodslider_controller.php",
        data: "mood=" + JSON.stringify(value),
        success: function (result) {
            splitString(result);
        }
    });
}

function splitString(input) {
    var movieSplit = input.split(";");
    var i;
    for (i = 0; i < 5; i++) {
        var movie = movieSplit[i].split(",");
        var image = movie[0];
        var name = movie[1];
        var card = '<img class="card-img-top" src="' + image + '"> <div class="card-body"><h5 class="card-title">' + name + '</h5></div>';
        document.getElementById(i).innerHTML = card;
    }
}
function resetCards() {
    var i;
    for (i = 0; i < 5; i++) {
        var card = '<img class="card-img-top" src="resources/noContent.jpg"><div class="card-body"><h5 class="card-title">No content</h5></div>';
        document.getElementById(i).innerHTML = card;
    }
}
