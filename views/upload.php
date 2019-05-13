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

        <title>Moodslider 2.0</title>

    </head>

    <body>
        <!-- Title Bar -->
        <div class ="jumbotron " style="margin-bottom:0">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <a href="../index.php">
                            <img src="../resources/sky.png" class="img-fluid center-block" alt=""/></a>
                    </div>
                    <div class="col-10">
                        <h1>Mood Slider 2.0</h1> 
                        <p class="lead">Please move the sliders to select movies for your moods.</p>
                    </div>  
                </div> 
            </div>
        </div>
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-sm navbar-light bg-light"> 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Mood Slider</a>
                    </li>
                </ul>   
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="../views/upload.php" method="post" enctype="multipart/form-data">
                        <div class="input-group input-group-sm mb-3">
                            <div class="custom-file">
                                <input type="file" name="fileToUpload" id="fileToUpload" class="custom-file-input">
                                <label class="custom-file-label" for="inputGroupFile02">Choose your xml file</label>
                            </div>
                            <div class="input-group-append">
                                <input type="submit" value="Upload Content" name="submit" class="input-group-text" >
                            </div>
                        </div>
                    </form>   
                </li>
            </ul>
        </nav>

        <br>

       <br><h3 align="center">
            <?php
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Allow only xml file
            if (isset($_POST["submit"])) {
                $check = $_FILES["fileToUpload"]["type"];
                if ($check !== "text/xml") {
                    echo "Sorry, only xml files are allowed. ";
                    $uploadOk = 0;
                }
            }
// Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists. ";
                $uploadOk = 0;
            }

// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded. ";
                } else {
                    echo "Sorry, there was an error uploading your file. ";
                }
            }
            echo '<br><br><a href="../index.php">Go back to Mood slider</a>';
            ?></h3>
       
<!-- Javascript -->
        <script src="views/javascript.js" type="text/javascript"></script>
        </body>
</html>