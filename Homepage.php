<?php
<<<<<<< HEAD
    require_once 'config.inc.php'; 
    require_once 'db-classes.inc.php';
=======
    require_once 'Include/config.inc.php'; 
    require_once 'Include/db-classes.inc.php';
>>>>>>> c56f7bf5545efdd9d66cbb949f2bef9d3399223a
    
    try{
        $conn = Databasehelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
        $s = new Homepage($conn);
        //Using the databasehelper to run all the query since it will make this page less crowded.
        // Top Genres
        $topGenre = $s->getTopGenres();
        // Top Artists
        $topArtist = $s->getTopArtists();
        // Most Popular Songs
        $topSong = $s->getTopSongs();
        // One hit wonders 
        $oneHitWonder = $s->getOneHitWonders();
        // acousticness
        $acoustic = $s->getLongestAcousticSong();
        //At the club
        $club = $s->getAtTheClub();
        //running
        $run = $s->getRunning();
        //study
        $study = $s->getStudy();
        
    }catch(Exception $e){$e->getMessage();}
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="CSS/Homepage.css">
    <link rel="stylesheet" href="CSS/Main.css">
=======
    <link rel="stylesheet" href="CSS/Assignment1.css">
  
>>>>>>> c56f7bf5545efdd9d66cbb949f2bef9d3399223a
    <title>Document</title>
    
</head>

<body>
<header class="header">
        <h1>COMP 3512 Assign1</h1>
        <h3>Utkarsh Kapoor, Adam Kovas</h3>

        <nav>
            <ul>
                <li><img src="icons/home.png" alt="home icon" /><a href="home-page.php">HOME</a></li>
                <li><img src="icons/browse.PNG" alt="browse icon" /><a href="browse-search-result.php">BROWSE</a></li>
                <li><img src="icons/search.PNG" alt="search icon" /><a href="search-page.php">SEARCH</a></li>
                <li><img src="icons/browse.PNG" alt="browse/search icon" /><a href="browse-search-result.php">About Us</a></li>
            </ul>
        </nav>
    
    </header>
        <div class="content home_container">
            
            <div class="homepage_grid top-genres grid 1"> 
                <h1 class ="blur-text">Top Genres</h1>
                <ul class= gridlist>
                    <?php foreach($topGenre as $row){
                            echo "<li>" . $row['genre_name'] . "</li>";}?>
                </ul>
            </div>
            <div class="homepage_grid top-artist">
                <h1 class= "blur-text">Top Artists</h1>
                <ul>
                <?php foreach($topArtist as $row){
                        echo "<li>" . $row['artist_name'] . "</li>";}?>     
                </ul>
            </div>
            <div class="homepage_grid top-songs">
                <h1 class="blur-text">Top Songs</h1>
                <ul>
                <?php foreach($topSong as $row){
                        echo "<li><a href='SongInfo.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul>
            </div>
            <div class="homepage_grid one-hit">
                <h1 class="blur-text">One Hit Wonders</h1>
                <ul>
                <?php foreach($oneHitWonder as $row){
                        echo "<li><a href='SongInfo.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul>
            </div>
            <div class="homepage_grid long ">
                <h1 class="blur-text">Longest Acoustic Song</h1>
                <ul>
                <?php foreach($acoustic as $row){
                        echo "<li><a href='SongInfo.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul>
            </div>
            <div class="homepage_grid club">
                <h1 class="blur-text">At The Club</h1>
                <ul>
                <?php foreach($club as $row){
                        echo "<li><a href='SongInfo.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul>
            </div>
            <div class="homepage_grid run">
                <h1 class="blur-text">Running songs</h1>
                <ul>
                <?php foreach($run as $row){
                        echo "<li><a href='SongInfo.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul> 
            </div>
            <div class="homepage_grid study">
                <h1 class="blur-text">Study Songs</h1>
                <ul>
                <?php foreach($study as $row){
                        echo "<li><a href='SongInfo.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul>
            </div>
        </div>
        
   
     <footer>
        <h4>COMP 3512</h4>
        <p id="copyright">©Kapoor, Kovas</p>
        <div class="Github">
            <li><a href="https://github.com/AdamK1243/Assignment1-COMP3512"><img src= "icons/git.png" alt= "git icon"/></a></li>
<<<<<<< HEAD
=======
            <
>>>>>>> c56f7bf5545efdd9d66cbb949f2bef9d3399223a
        </div>
    </footer>
</body>
</html>