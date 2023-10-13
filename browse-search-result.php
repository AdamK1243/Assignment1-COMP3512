<?php
<<<<<<< HEAD
    require_once('config.inc.php'); 
    require_once('db-classes.inc.php');

=======
    require_once 'Include/config.inc.php';
    require_once 'Include/db-classes.inc.php';
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
>>>>>>> d36bf264451493e91581bb7c713e8e88e0a7c3fb
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
    <link rel="stylesheet" href="CSS/primary.css">
    <title>Song browser</title>
</head>
<body>
   <?php include('header.php')?>
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
                    <td><a class="Button" href="SongInfo.php?curr=si&songID=<?=$curr["song_id"]?>">
                        View
                    </a></td>
                </tr>  
                <?php
            }
            
            ?>
        </table>    
    </div> 
    <?php include('include/Footer.php')?>
</body>
</html>