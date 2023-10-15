<?php
    require_once 'Include/config.inc.php'; 
    require_once 'Include/db-classes.inc.php';
    
    try{
        $conn = Databasehelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
        $s = new Homepage($conn);
        
        $topGenre = $s->getTopGenres();
      
        $topArtist = $s->getTopArtists();
        
        $topSong = $s->getTopSongs();
     
        $oneHitWonder = $s->getOneHitWonders();
        
        $acoustic = $s->getLongestAcousticSong();
        
        $club = $s->getAtTheClub();
      
        $run = $s->getRunning();
      
        $study = $s->getStudy();
        
    }catch(Exception $e){$e->getMessage();}
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Homepage.css">
    <link rel="stylesheet" href="CSS/Assignment1.css">
    <title>Document</title>
    
</head>

<body>
<header class="header">
        <h1>COMP 3512- PHP Assignment 1</h1>
        <h3>Utkarsh Kapoor, Adam Kovacs</h3>

        <nav>
            <ul>
                <li><img src="icons/home.png" alt="home icon" /><a href="Homepage.php">HOME</a></li>
                <li><img src="icons/browse.PNG" alt="browse icon" /><a href="browse-search-result.php">BROWSE</a></li>
                <li><img src="icons/search.PNG" alt="search icon" /><a href="search-page.php">SEARCH</a></li>
                <li><img src="icons/fav.PNG" alt="fav icon" /><a href="Favourite-Page.php">Favourites</a></li>
                <li><img src="icons/About-Us.PNG" alt="browse/search icon" /><a href="About-US.php">About Us</a></li>
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
                        echo "<li><a href='single-song.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul>
            </div>
            <div class="homepage_grid one-hit">
                <h1 class="blur-text">One Hit Wonders</h1>
                <ul>
                <?php foreach($oneHitWonder as $row){
                        echo "<li><a href='single-song.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul>
            </div>
            <div class="homepage_grid long ">
                <h1 class="blur-text">Longest Acoustic Song</h1>
                <ul>
                <?php foreach($acoustic as $row){
                        echo "<li><a href='single-song.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul>
            </div>
            <div class="homepage_grid club">
                <h1 class="blur-text">At The Club</h1>
                <ul>
                <?php foreach($club as $row){
                        echo "<li><a href='single-song.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul>
            </div>
            <div class="homepage_grid run">
                <h1 class="blur-text">Running songs</h1>
                <ul>
                <?php foreach($run as $row){
                        echo "<li><a href='single-song.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul> 
            </div>
            <div class="homepage_grid study">
                <h1 class="blur-text">Study Songs</h1>
                <ul>
                <?php foreach($study as $row){
                        echo "<li><a href='single-song.php?curr=si&songID=" . $row['song_id'] . "'>" . $row['title'] . '</a> By ' . $row['artist_name'] . "</li>";}?>
                </ul>
            </div>
        </div>
        
   
     <footer>
        <h4>COMP 3512</h4>
        <p id="copyright">©Kapoor, Kovacs</p>
        <div class="info">
            <a href="https://github.com/AdamK1243/Assignment1-COMP3512.git">Repository</a>
            <a href="https://github.com/AdamK1243">Adam's github</a>
            <a href="https://github.com/utkarshk9">Utkarsh's github</a>
        </div>
        </div>
    </footer>
</body>
</html>