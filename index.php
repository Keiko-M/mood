<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!-- CSS -->
        <link href="views/style.css" rel="stylesheet" type="text/css"/>
        <!-- Javascript -->
        <script src="views/javascript.js" type="text/javascript"></script>

        <title>Moodslider</title>
      
    </head>

    <body>
        <!-- logo -->
        <div class ="container" style="margin-top:30px">
            <div class="row">
                <div class="col-sm-1">
                    <img src="resources/sky.png" class="img-fluid" alt=""/>
                </div>
                <div class="col-sm-11">
                    <!-- Title Bar -->
                    <div class ="jumbotron jumbotron-fluid">  
                        <p class="lead">MoodSlider</p>
                    </div>
                    <!-- Nav Bar -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                        Select xml file to upload:
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                        <input type="submit" value="Submit" name="submit">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>        
       </div>  
            <!-- 4 sliders -->
            <div class ="container" style="margin-top:30px">
                <div class="row">
                    <div class="col-sm">
                        <h5>Agitated</h5>    
                    </div>
                    <div class="col-sm">
                        <input type="range" min="1" max="3" value="2" class="slider" id="Range1" onchange="getMood(this.value)">
                    </div>
                    <div class="col-sm">
                        <h5>Calm</h5>    
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <h5>Happy</h5>    
                    </div>
                    <div class="col-sm">
                        <input type="range" min="4" max="6" value="5" class="slider" id="Range2" onchange="getMood(this.value)">
                    </div>
                    <div class="col-sm">
                        <h5>Sad</h5>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <h5>Tired</h5>    
                    </div>
                    <div class="col-sm">
                        <input type="range" min="7" max="9" value="8" class="slider" id="Range3" onchange="getMood(this.value)">
                    </div>
                    <div class="col-sm">
                        <h5>Wide Awake</h5>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <h5>Scared</h5>    
                    </div>
                    <div class="col-sm">
                        <input type="range" min="10" max="12" value="11" class="slider" id="Range4" onchange="getMood(this.value)">
                    </div>
                    <div class="col-sm">
                        <h5>Fearless</h5>    
                    </div>
                </div>
            </div>

            <!-- 5 card decks for movies -->
            <div class="card-deck" style="margin:30px">
                <div class="card" id="0">
                    <img class="card-img-top" src="resources/noContent.jpg" alt="No content">
                    <div class="card-body">
                        <h5 class="card-title">No content</h5>
                    </div>
                </div>
                <div class="card"id="1">
                    <img class="card-img-top" src="resources/noContent.jpg" alt="No content">
                    <div class="card-body">
                        <h5 class="card-title">No content</h5>
                    </div>
                </div>
                <div class="card" id="2">
                    <img class="card-img-top" src="resources/noContent.jpg" alt="No content">
                    <div class="card-body">
                        <h5 class="card-title">No content</h5>
                    </div>
                </div>
                <div class="card" id="3">
                    <img class="card-img-top" src="resources/noContent.jpg" alt="No content">
                    <div class="card-body">
                        <h5 class="card-title">No content</h5>
                    </div>
                </div>
                <div class="card" id="4">
                    <img class="card-img-top" src="resources/noContent.jpg" alt="No content">
                    <div class="card-body">
                        <h5 class="card-title">No content</h5>
                    </div>
                </div>
            </div> 
            
            <p id="demo"></p>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    </body>

</html> 


