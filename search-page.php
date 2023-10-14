<?php
require_once('include/config.inc.php');
require_once('include/db-classes.inc.php');

try {
    $conn = Databasehelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $artistGateway = new Artistdb($conn);
    $artist = $artistGateway->getAll();
    $genreGateway = new GenreDB($conn);
    $genre = $genreGateway->getAll();

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
    <link rel="stylesheet" href="CSS/search-page.css">
    <title>Search</title>
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
                <<li><img src="icons/fav.PNG" alt="fav icon" /><a href="Favourite-Page.php">Favourites</a></li>
                <li><img src="icons/About-Us.PNG" alt="browse/search icon" /><a href="About-US.php">About Us</a></li>
            </ul>

        </nav>

    </header>


    <body>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Music Search</title>
        </head>
        <h1 class="Search">
            Search Your Music! </h1>

        <body>
            <div class="main-container">

                <form method="GET" class="main form" action="browse-search-result.php">
                    <label for="title">Search by Title:</label>
                    <input type="text" name="title" id="title" placeholder="Enter title"><br>

                    <label for="artist">Search by Artist:</label>
                    <select name="artist" id="artist">
                        <option value="" disabled selected>Select artist</option>
                        <?php
                        foreach ($artist as $artists) {
                            echo "<option>" . $artists['artist_name'] . "</option>";
                        }
                        ?>
                    </select><br>

                    <label for="genre">Search by Genre:</label>
                    <select name="genre_name" id="genre">
                        <option value="" disabled selected>Select genre</option>
                        <?php
                        foreach ($genre as $genres) {
                            echo "<option>" . $genres['genre_name'] . "</option>";
                        }
                        ?>
                    </select><br>

                    <label for="year">Search by Year:</label>
                    <input type="text" id="year" name="year-before-value" title="text-year-before">
                    <input type="number" name="year" id="year_end" placeholder="End Year">

                    <input type="submit" value="Search">
                </form>
            </div>

            <footer>
                <h4>COMP 3512</h4>
                <p id="copyright">©Kapoor, Kovacs</p>
                <div class="Github">
                    <a href="https://github.com/AdamK1243/Assignment1-COMP3512"><img src="icons/git.png"
                            alt="git icon" /></a>
                </div>
            </footer>
        </body>

        </html>

        </footer>
    </body>

</html>