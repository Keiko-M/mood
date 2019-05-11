function getMood(value) {
$.ajax({
type: "GET",
        url: "search.php",
        data: "mood=" + value,
        success: function (result) {
        console.log(result);
        splitString(result);
        }
});
}

function splitString(input) {
var movieSplit = input.split(";");
        var i;
        for (i = 0; i < 5; i++) {
            var movie = movieSplit[i].split(",")
            var image = movie[0];
            var name = movie[1];
            var card = '<img class="card-img-top" src="' + image +'"> <div class="card-body"><h5 class="card-title">' + name + '</h5></div>';
            document.getElementById(i).innerHTML = card;
        }
}

