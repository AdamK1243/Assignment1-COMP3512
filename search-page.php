<?php 
include_once 'db-classes.inc.php';
require_once 'config.inc.php';

try{
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
    $songGateway = new GenreDB($conn);
    $artistGateway = new Artistdb($conn);
    $song = $songGateway->getAll();
    $artist = $artistGateway->getAll();
}
catch (Exception $e){ die($e->getMessage());} 
function outputSearchResults($songs, $name, $search){
    echo "<table>";
    echo "<tr>";
    echo "<th>Title</th>";
    echo "<th>Artist</th>";
    echo "<th>Year</th>";
    echo "<th>Genre</th>";
    echo "<th>Popularity</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";
    foreach($songs as $s){ ?>
        <tr>
            <td class='song-title'><a href='single-song.php?id=<?=$s['song_id']?>'><?=$s['title']?></a></td>
            <td><?=$s['artist_name']?></td>
            <td><?=$s['year']?></td>
            <td><?=$s['genre_name']?></td>
            <td><?=$s['popularity']?></td>
            <td><a href='add-to-favorites.php?id=<?=$s['song_id']?>&name=<?=$name?>&<?=$name?>=<?=$search?>' ><button class='button'>Add</button></a></td>
            <td><a href='single-song.php?id=<?=$s['song_id']?>' class='button'><button>View</button></a></td>
        </tr>
    <?php }
    echo "</table>";
} 
/*
* Function outputs the genre of the songs selected
*/
function outputGenre($songs){
    foreach($songs as $key){
        echo "<option value='".$key['genre_id']."'>".$key['genre_name']."</option>";
    }

}

/*
* Function outputs the aritst of the songs selected
*/
function outputArtistList($artist){
    foreach($artist as $key){
        echo "<option value='".$key['artist_id']."'>".$key['artist_name']."</option>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/Homepage.css" rel="stylesheet">
    <link href="CSS/main.css" rel="stylesheet">
    <link href="CSS/search-page.css" rel="stylesheet">

    <title>Search Song</title>
</head>
<body>
    <header class="header">
        <h1>COMP 3512 - PHP Assignment</h1>
        <h3>Utkarsh Kapoor, Adam Kovacs<h3>
        <hr>
        <nav>
            <ul>
            <li><img src="icons/home.png" alt="home icon" /><a href="home-page.php">HOME</a></li>
                <li><img src="icons/browse.PNG" alt="browse icon" /><a href="browse-search-result.php">BROWSE</a></li>
                <li><img src="icons/search.PNG" alt="search icon" /><a href="search-page.php">SEARCH</a></li>
                <li><img src="icons/browse.PNG" alt="browse/search icon" /><a href="browse-search-result.php">About Us</a></li>
            </ul>
        </nav>
        <hr>
    </header>

    <h2>Basic Song Search</h2>

    <main>
      
        <form method="GET" class="main form" action="browse-search-result.php">
            <div class="title">
                <label>Title</label> 
                <input type="text" name="title" title="title-search"> <br>
            </div>

            <div class="artist a1">
                <label>Artist</label>
                <select name="artistList" title="artist">
                    <option value='0'>Choose An Artist</option>
                    <?=outputArtistList($artist);?>
                </select>
            </div>

            <div class="genre a1">
                <label>Genre</label>
                <select name="genreList" title="genre">
                    <option value='0'>Choose A Genre</option>
                    <?=outputGenre($song)?>
                </select> <br>
            </div>
    
            <div class="year">
                <label>Year</label>
                <div class="year scale">
                   <label for="year-before">Before
                        <input type="text" for="year-before" name="year-before-value" title="text-year-before">
                    </label>
                   <label for="year-after">After
                        <input type="text" for="year-after" name="year-after-value" title="text-year-after">
                    </label><br>
                </div>
            </div>

            <br>

            <div class="popularity">
                <label>Popularity</label>
                <div class="popularity scale">
                   <label for="pop-less">Less
                        <input type="text" for="pop-less" name="pop-less-value" title="text-popularity-less">
                    </label>
                   <label for="pop-greater">Greater
                        <input type="text" for="pop-greater" name="pop-greater-value" title="text-popularity-greater">
                    </label></br>
                </div>
            </div>
            <input class="btn" type="submit">
        </form>
    </main>

    <footer>
        <p>COMP 3512</p><p>&copy;Utkarsh Kapoor, Adam Kovacs</p><a href="https://github.com/izabelle-g/COMP3512-Assignment1.git">Access to Github Repository</a>
    </footer>
</body>
</html>