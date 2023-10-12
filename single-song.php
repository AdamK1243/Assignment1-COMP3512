<?php 
<<<<<<< HEAD
require_once('config.inc.php'); 
require_once('db-classes.inc.php');
=======
require_once('Include/config.inc.php'); 
require_once('Include/db-classes.inc.php');
>>>>>>> c56f7bf5545efdd9d66cbb949f2bef9d3399223a
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
<<<<<<< HEAD
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
=======
    <link rel="stylesheet" href="CSS/primary1.css">
    <link rel="stylesheet" href="CSS/Assignment1.css">
    
    <title>Song Info</title>
</head>

<body>
<header class="header">
        <h1>COMP 3512 Assign1</h1>
        <h3>Utkarsh Kapoor, Adam Kovas</h3>
>>>>>>> c56f7bf5545efdd9d66cbb949f2bef9d3399223a

        <nav>
            <ul>
                <li><img src="icons/home.png" alt="home icon" /><a href="home-page.php">HOME</a></li>
                <li><img src="icons/browse.PNG" alt="browse icon" /><a href="browse-search-result.php">BROWSE</a></li>
                <li><img src="icons/search.PNG" alt="search icon" /><a href="search-page.php">SEARCH</a></li>
                <li><img src="icons/browse.PNG" alt="browse/search icon" /><a href="browse-search-result.php">About Us</a></li>
            </ul>
        </nav>
    
    </header>
<<<<<<< HEAD
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
=======


</div>
<div class="content">
        <table class="songInfo"> 
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Artist Type</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Length</th>
            </tr>
                <?php 
                foreach($song as $row){ 
                    $length = $row['duration'];
                    $minutes = number_format($length/60, 0);
                    $seconds = number_format($length%60);
                    if ($seconds < 10){
                        $seconds = "0$seconds";
                    }
                    echo "<tr>"; 
                    echo "<td>" . $row['title']  . ' </td>'; 
                    echo "<td>" . $row['artist_name']  . ' </td>';  
                    echo "<td>" . $row['type_name']  . ' </td>';
                    echo "<td>" . $row['genre_name']  . ' </td>'; 
                    echo "<td>" . $row['year']  . ' </td>'; 
                    echo "<td>" . $minutes . ":"  . $seconds . ' </td>';  
                    echo "</tr>";
                }
                ?>
                
        </table>


 <div class="progress">
                <?php foreach($song as $row){?> 
                    <div class="progress-bars">
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
    <?php include('include/Footer.php')?>

</body>
</html>
>>>>>>> c56f7bf5545efdd9d66cbb949f2bef9d3399223a
