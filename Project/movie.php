<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie List</title>
    <style>
    
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        img {
            width:100%;
            height: 300px;
            
            align: center;
            box-shadow: 0px 0px 5px #ccc;
            
        }
        .container {
            max-width: 800px;
            
            padding: 20px;
            display:grid;
            grid-template-columns: auto auto auto;
            
        }
    
        .movieframe {
            width: 500px;
            height: auto;
            margin: 5px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 5px #ccc;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .movieframe h2 {
            color: #333;
            font-size: 18px;
            margin-bottom: 10px;
        }

        

        .movieframe a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .movieframe a:hover {
            background-color: #4CAF50;
            color:white;
        }
        .review-button{
            margin-bottom: 20px;
        }
        .goback-button {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .goback-button:hover {
            background-color: #4CAF50;
            color:white;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $movies = array(
            array("title" => "The Shawshank Redemption", "poster" => "shawshank.jpeg"),
            array("title" => "The Godfather", "poster" => "godfather.jpeg"),
            array("title" => "The Dark Knight", "poster" => "dark knight.jpeg"),
            array("title" => "12 Angry Men", "poster" => "12 Angry men.jpeg"),
            array("title" => "Schindler's List", "poster" => "schindler.jpeg"),
            array("title" => "The Lord of the Rings: The Return of the King", "poster" => "lord.jpeg"),
            array("title" => "Pulp Fiction", "poster" => "pulp.jpeg"),
            array("title" => "The Good, the Bad and the Ugly", "poster" => "good.jpeg"),
            array("title" => "Forrest Gump", "poster" => "forest.jpeg"),
            array("title" => "Inception", "poster" => "inception.jpeg")
        );
       
        foreach ($movies as $movie) {
            $encodedTitle = urlencode($movie['title']);
            echo "<div class='movieframe'><h2>" . $movie['title'] . "</h2>"."<a href='star.php?title=" . $encodedTitle . "'><img src='" . $movie['poster'] . "' alt='" . $movie['title'] . "'></a><br><br><a href='star.php?title=" . $encodedTitle . "' class='review-button'>Review</a></div>";
        }
        ?>
    </div>
    <form action="javascript:history.back()">
        <input type="submit" value="Go Back" class="goback-button">
    </form>
</body>
</html>
