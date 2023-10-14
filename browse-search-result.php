<?php
    require_once('include/config.inc.php'); 
    require_once('include/db-classes.inc.php');

    try{
        $conn = Databasehelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
        $songGateway = new SongDB($conn); 

            $Condition= "";
        if(!empty($_GET['title'])){
            $Condition .= " AND title LIKE ?";
            $AddValue[] = "%".$_GET['title']."%";
        }
        if(!empty($_GET['artist'])){
            $Condition .= " AND artist_name LIKE ?";
            $AddValue[] = $_GET['artist'];
        }
    
        if(!empty($_GET['year'])){
            if ($_GET['year']== "less"){
                $Condition= " AND year <= ?";
                $AddValue[] = $_GET['year_less'];
            }elseif($_GET['year']== "greater"){
                $Condition  .= " AND year >= ?";
                $AddValue[] = $_GET['year_greater'];
            }
        }
        if(!empty($_GET['genre_name'])){
            $Condition .= " AND genre_name LIKE ?";
            $AddValue[] = (string)$_GET['genre_name'];
        }
    
        if(!empty($_GET['popu'])){
            if ($_GET['popu']== "greater"){
                $Condition .= " AND popularity >= ?";
                $AddValue[] = $_GET['pop_greater'];
                
            }elseif ($_GET['popu']== "less"){
                $Condition.= " AND popularity < ?";
                $AddValue[] = $_GET['pop_less'];
            }
        }

        if(empty($Condition)){
            $songs = $songGateway->getAll();  
        }
        else{
            $songs = $songGateway->getConditions($Condition, $AddValue);
        }
    }
catch(Exception $e){$e->getMessage();}
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
    <h1 class="Search"> Music Collection </h1>
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
            foreach($songs as $s){
                ?>
                <tr>
                    <td><?=$s['title']?></td>
                    <td><?=$s['artist_name']?></td>
                    <td class="table_year"><?=$s['year']?></td>
                    <td><?=$s['genre_name']?></td>
                    <td><?=$s['popularity']?></td>
                    <td><a class="Button" href="Favorites Page.php?AddID=<?=$s["song_id"]?>">
                        Add to Favorites
                    </a></td>
                    <td><a class="Button" href="single-song.php?curr=si&songID=<?=$s["song_id"]?>">
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