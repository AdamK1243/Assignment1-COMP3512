<?php 
require_once('Include/config.inc.php'); 
require_once('Include/db-classes.inc.php');
try{
    $conn = Databasehelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
    $musicGateway = new SongDB($conn);
    
    if(!empty($_GET['songID'])){
        $song = $musicGateway->getSong($_GET['songID']);
      }else{
        $song = $musicGateway->getSong(1001);//will be set to the first song in the database unless otherwise specified
      }
      $conn = null;
    }catch(Exception $e){$e->getMessage();}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/single.css">
    <link rel="stylesheet" href="CSS/Assignment1.css">
    <title>Song Info</title>
</head>
<body>
<header class="header">
        <h1>COMP 3512 Assign1</h1>
        <h3>Utkarsh Kapoor, Adam Kovas</h3>

        <nav>
            <ul>
                <li><img src="icons/home.png" alt="home icon" /><a href="Homepage.php">HOME</a></li>
                <li><img src="icons/browse.PNG" alt="browse icon" /><a href="browse-search-result.php">BROWSE</a></li>
                <li><img src="icons/search.PNG" alt="search icon" /><a href="search-page.php">SEARCH</a></li>
                <li><img src="icons/browse.PNG" alt="browse/search icon" /><a href="browse-search-result.php">About Us</a></li>
            </ul>
        </nav>
    
    </header>
    
<div class= "content">
<h2>About Song</h2>
  <div class="vertical-table">
    <?php foreach ($song as $row) { ?>
       <? $length = $row['duration'];
                    $minutes = number_format($length/60, 0);
                    $seconds = number_format($length%60);
                    if ($seconds < 10){
                        $seconds = "0$seconds";
                    }?>
        <div class="table-row">
            <div class="table-label">Title:</div>
            <div class="table-data"><?= $row['title'] ?></div>
        </div>
        <div class="table-row">
            <div class="table-label">Artist:</div>
            <div class="table-data"><?= $row['artist_name'] ?></div>
        </div>
        <div class="table-row">
            <div class="table-label">Artist Type:</div>
            <div class="table-data"><?= $row['type_name'] ?></div>
        </div>
        <div class="table-row">
            <div class="table-label">Genre:</div>
            <div class="table-data"><?= $row['genre_name'] ?></div>
        </div>
        <div class="table-row">
            <div class="table-label">Year:</div>
            <div class="table-data"><?= $row['year'] ?></div>
        </div>
        <div class="table-row">
            <div class="table-label">Time:</div>
            <div class="table-data"><?= $minutes . ":"  . $seconds ?></div>
        </div>
    
    <?php } ?>
 </div>
 <div class="progress">
                <?php foreach($song as $row){?> 
                    <div class="bars">
                    <label for="bpm">Beats per minute</label></br>
                    Low <progress min="0" max="300" value="<?= $row['bpm']?>" id="bpm"></progress> High</br>
                    </div>
                    <div class="bars">
                    <label>Energy</label></br>
                    Low <progress min="0" max="100" value="<?= $row['energy']?>"></progress> High</br>
                    </div>
                    <div class="bars">
                    <label>Danceability</label></br>
                    Low <progress min="0" max="100" value="<?= $row['danceability']?>"></progress> High</br>
                    </div>
                    <div class="bars">
                    <label>Liveness</label></br>
                    Low <progress min="0" max="100" value="<?= $row['liveness']?>"></progress> High</br>
                    </div>
                    <div class="bars">
                    <label>Valence</label></br>
                    Low <progress min="0" max="100" value="<?= $row['valence']?>"></progress> High</br>
                    </div>
                    <div class="bars">
                    <label>Acousticness</label></br>
                    Low <progress min="0" max="100" value="<?= $row['acousticness']?>"></progress> High</br>
                    </div>
                    <div class="bars">
                    <label>Speechiness</label></br>
                    Low <progress min="0" max="100" value="<?= $row['speechiness']?>"></progress> High</br>
                    </div>
                    <div class="bars">
                    <label>Popularity</label></br>
                    Low <progress min="0" max="100" value="<?= $row['popularity']?>"></progress> High</br>
                    </div>
                <?php }?>
            </div>
</div>

</html>