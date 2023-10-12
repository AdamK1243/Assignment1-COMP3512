<?php 
require_once('config.inc.php'); 
require_once('db-classes.inc.php');
try{
    $conn = Databasehelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
    $musicGateway = new MusicDB($conn);
    
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
    <link rel="stylesheet" href="CSS/primary.css">
    <link rel="stylesheet" href="CSS/single-song.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/Homepage.css">
    <title>Song Info</title>
</head>
<body>
<header class="header">
        <h1>COMP 3512 Assign1</h1>
        <h3>Utkarsh Kapoor, Adam Kovacs</h3>

        <nav>
            <ul>
                <li><img src="icons/home.png" alt="home icon" /><a href="home-page.php">HOME</a></li>
                <li><img src="icons/browse.PNG" alt="browse icon" /><a href="browse-search-result.php">BROWSE</a></li>
                <li><img src="icons/search.PNG" alt="search icon" /><a href="search-page.php">SEARCH</a></li>
                <li><img src="icons/browse.PNG" alt="browse/search icon" /><a href="browse-search-result.php">About Us</a></li>
            </ul>
        </nav>
    
    </header>
    <main class="body">
    <div class="list">
    <?php foreach ($song as $row) { ?>
        <div class="title">
            <b><?= $row['title'] ?></b> by <?= $row['artist_name'] ?><br>
        </div>
        <br>
        <p>Artist type: <?= $row['type_name'] ?></p>
        <p>Genre: <?= $row['genre_name'] ?></p>
        <p>Year: <?= $row['year'] ?></p>
        <p>Duration: <?= formatDuration($row['duration']) ?> min</p>
    <?php } ?>
    <p><b>Analysis Data</b></p>
    <div class="data">
        <ul>
            <?php foreach ($song as $row) { ?>
                <li>BPM: <?= $row['bpm'] ?></li>
                <li>Energy: <?= $row['energy'] ?></li>
                <li>Liveness: <?= $row['liveness'] ?></li>
                <li>Danceability: <?= $row['danceability'] ?></li>
                <li>Valence: <?= $row['valence'] ?></li>
                <li>Acousticness: <?= $row['acousticness'] ?></li>
                <li>Popularity: <?= $row['popularity'] ?></li>
            <?php } ?>
        </ul>
    </div>
</div>

    </main>

    <?php include('include/Footer.php')?>
</body>
</html>