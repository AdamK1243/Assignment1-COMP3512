<?php
session_start();
require_once('Include/config.inc.php');
require_once('Include/db-classes.inc.php');

if(!empty($_GET["AddID"])){
    $_SESSION["Song" . $_GET['AddID']] = $_GET["AddID"];
}
// Handle song removal from favorites
if (!empty($_GET["RemID"])) {
    unset($_SESSION["Song" . $_GET["RemID"]]);
}

// Handle clearing all favorites
if (!empty($_GET["RemAll"]) && $_GET["RemAll"] == "yes") {
    session_unset();
}

try {
    $conn = Databasehelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $songGateway = new SongDB($conn);

    $AddSQL = " AND (";
    foreach ($_SESSION as $key => $val) {
        $AddSQL .= ($AddSQL == " AND (") ? " song_id = ?" : " OR song_id = ?";
        $AddValue[] = $val;
    }
    $AddSQL .= ")";
    
    if (!empty($AddValue)) {
        $songs = $songGateway->getConditions($AddSQL, $AddValue);
    }
} catch (Exception $e) {
    $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Assignment1.css">
    <link rel="stylesheet" href="CSS/Favorites.css">
    <title>Favorites</title>
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
                <li><img src="icons/browse.PNG" alt="browse/search icon" /><a href="About-US.php">About Us</a></li>
            </ul>
    
        </nav>
    
    </header>
    <div class="content">
        <table>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Popularity</th>
                <th><a href="Favorites Page.php?RemAll=yes" class="Button">Remove All</a></th>
            </tr>
            <?php
            if (!empty($songs)) {
                foreach ($songs as $curr) {
                    ?>
                    <tr>
                        <td><?=$curr['title']?></td>
                        <td><?=$curr['artist_name']?></td>
                        <td class="table_year"><?=$curr['year']?></td>
                        <td><?=$curr['genre_name']?></td>
                        <td><?=$curr['popularity']?></td>
                        <td><a class="Button" href="Favorites Page.php?RemID=<?=$curr["song_id"]?>&curr=f">
                            Remove From Favorites
                        </a></td>
                        <td><a class="Button" href="single-song.php?curr=si&songID=<?=$curr["song_id"]?>">
                            View
                        </a></td>
                    </tr>
                <?php
                }
            }
            ?>
        </table>
    </div>
   
</body>
</html>
