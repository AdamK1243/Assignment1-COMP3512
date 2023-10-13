<?php
    require_once('include/config.inc.php'); 
    require_once('include/db-classes.inc.php');

    try{
        $conn = Databasehelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
        $songGateway = new MusicDB($conn); 
        $AddSQL = "";
        if(!empty($_GET['title'])){
            $AddSQL .= " AND title LIKE ?";
            $AddValue[] = "%".$_GET['title']."%";
        }
        if(!empty($_GET['artist'])){
            $AddSQL  .= " AND artist_name LIKE ?";
            $AddValue[] = $_GET['artist'];
        }
        /* if(!empty($_GET['year'])){
            $AddSQL[] = " year = ?";
            $AddValue[] = $_GET['year'];
        } */
        if(!empty($_GET['year'])){
            if ($_GET['year']== "less"){
                $AddSQL= " AND year <= ?";
                $AddValue[] = $_GET['year_less'];
            }elseif($_GET['year']== "greater"){
                $AddSQL  .= " AND year >= ?";
                $AddValue[] = $_GET['year_greater'];
            }
        }
        if(!empty($_GET['genre_name'])){
            $AddSQL .= " AND genre_name LIKE ?";
            $AddValue[] = (string)$_GET['genre_name'];
        }
        /* if(!empty($_GET['popularity'])){
            $AddSQL[] = " popularity LIKE ?";
            $AddValue[] = $_GET['popularity'];
        } */
        if(!empty($_GET['popu'])){
            if ($_GET['popu']== "greater"){
                $AddSQL .= " AND popularity >= ?";
                $AddValue[] = $_GET['pop_greater'];
                
            }elseif ($_GET['popu']== "less"){
                $AddSQL .= " AND popularity < ?";
                $AddValue[] = $_GET['pop_less'];
            }
        }

        if(empty($AddSQL)){
            $songs = $songGateway->getAll();  
        }
        else{
            $songs = $songGateway->getConditions($AddSQL, $AddValue);
        }
    }catch(Exception $e){$e->getMessage();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Assignment1.css">
    <link rel="stylesheet" href="CSS/browse-search.css">
    <title>Song browser</title>
</head>
<body>
<header class="header">
        <h1>COMP 3512 Assign1</h1>
        <h3>Utkarsh Kapoor, Adam Kovacs</h3>

        <nav>
            <ul>
                <li><img src="icons/home.png" alt="home icon" /><a href="Homepage.php">HOME</a></li>
                <li><img src="icons/browse.PNG" alt="browse icon" /><a href="browse-search-result.php">BROWSE</a></li>
                <li><img src="icons/search.PNG" alt="search icon" /><a href="search-page.php">SEARCH</a></li>
                <li><img src="icons/browse.PNG" alt="browse/search icon" /><a href="About-US.php">About
                        Us</a></li>
            </ul>

        </nav>

    </header>
    <div class="content">
        <table class="browse">
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Popularity</th>
            </tr>
            <?php
            foreach($songs as $curr){
                ?>
                <tr>
                    <td><?=$curr['title']?></td>
                    <td><?=$curr['artist_name']?></td>
                    <td class="table_year"><?=$curr['year']?></td>
                    <td><?=$curr['genre_name']?></td>
                    <td><?=$curr['popularity']?></td>
                    <td><a class="Button" href="addToFavorites.php?AddID=<?=$curr["song_id"]?>">
                        Add to Favorites
                    </a></td>
                    <td><a class="Button" href="single-song.php?curr=si&songID=<?=$curr["song_id"]?>">
                        View
                    </a></td>
                </tr>  
                <?php
            }
            
            ?>
        </table>    
    </div> 
    <footer>
        <h4>COMP 3512</h4>
        <p id="copyright">©Kapoor, Kovas</p>
        <div class="Github">
            <li><a href="https://github.com/AdamK1243/Assignment1-COMP3512"><img src="icons/git.png"
                        alt="git icon" /></a></li>
        </div>
    </footer>
</body>
</html>