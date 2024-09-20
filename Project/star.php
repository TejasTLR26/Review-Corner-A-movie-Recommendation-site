<?php
include "db.php";
session_start();

if(isset($_POST["logout"])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

$title=$_GET["title"];
$query="Select * from movie where name='$title'";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        echo "<br><br>";
        echo "<div class='movie-details'>";
        echo "<strong>Name:</strong> " . $row["Name"] . "<br>";
        echo "<strong>Year:</strong> " . $row["Year"] . "<br>";
        echo "<strong>Genre:</strong> " . $row["Genre"] . "<br>";
        echo "<strong>Average Rating:</strong> " . $row["Average Rating"] . "<br>";
        echo "<strong>Director:</strong> " . $row["Director"] . "<br>";
        echo "</div>";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-pUA-Compatible" content="ie=edge" />
    <title>Star Rating in HTML CSS & JavaScript</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="script.js" defer></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        * {
            margin: 0;
            padding: 0;
            color:black;
            font-family: "Poppins", sans-serif;
        }
        body {
            background: linear-gradient(45deg, #ffd195, #4CAF50);
        }
        .movie-details {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }
        .rating-box {
            position :relative;
            width:300px;
            height:100px;
            background: #fff;
            padding: 25px 50px 35px;
            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
            display:block;
            margin: 0 auto;
        }
        .rating-box header {
            font-size: 22px;
            color: black;
            font-weight: 500;
            margin-bottom: 20px;
            text-align: center;
        }
        .rating-box .stars {
            display: flex;
            align-items: center;
            gap: 25px;
        }
        .stars i {
            color:#e6e6e6 ;
            font-size: 35px;
            cursor: pointer;
            transition: color 0.2s ease;
        }
        .stars i.active {
            color: #ff9c1a;
        }
        .submit{
            display: flex;
            margin: auto;
            padding-left:30px;
            background: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
            border-radius: 25px;
            width:100px;
            height:50px;
            border-color:#e6e6e6;
            text-align: center;
            color: black;
            font-weight: 500;
        }
        .comment {
            width: 500px;
            height: 75px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #e6e6e6;
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
        }
        .comments{
            position :relative;
            width:500px;
            height:100px;
            background: #fff;
            padding: 25px 50px 35px;
            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
            display:block;
            margin: 0 auto;
        }
        .top-right-buttons {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .go-back {
            background-color: #f2f2f2;
            padding: 10px 20px;
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            font-size: 16px;
            color: #4CAF50;
            cursor: pointer;
            margin-right: 10px;
        }
        .go-back:hover {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>
<form method="POST">
    <div class="top-right-buttons">
        <input type="button" class="go-back" value="Go Back" onclick="history.back()">
        <input type="submit" name="logout" value="Logout" class="go-back">
    </div>
</form>
    <form method="POST">
        
        <div class="comments">
            <h2>Please comment about the movie:</h2>
            <input type="text" class="comment" name="comment">
        </div>
        <br><br>
        <div class="rating-box">
            <header>Rate your experience?</header>
            <div class="stars">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
        <input type="hidden" id="rating" name="Rating"></input>
        <br>
        <input type="Submit" name="Submit" class="submit" value="Rate"></input>
    </form>
</body>
</html>
<?php
if(isset($_POST["Submit"])) {
    $rating=$_POST["Rating"];
    $title=$_GET["title"];
    $com=$_POST["comment"];
    $username=$_SESSION["username"];
    $query1="Select movieid from movie where name='$title'";
    $res=mysqli_query($conn,$query1);
    $row=mysqli_fetch_assoc($res);
    $mid=$row['movieid'];
    $query2="select userid from user where username='$username'";
    $res1=mysqli_query($conn,$query2);
    $row1=mysqli_fetch_assoc($res1);
    $uid=$row1['userid'];
    $query3="select date(sysdate())";
    $res2=mysqli_query($conn,$query3);
    $row2=mysqli_fetch_assoc($res2);
    $date=$row2['date(sysdate())'];
    
    $query="Insert into review(userid,movieid,rating,comment,date) values('$uid','$mid','$rating','$com','$date')";
    mysqli_query($conn,$query);      
    echo "<script>alert('Thank you for your feedback!')</script>";
    echo "<script>window.location.href='main.php'</script>";
}
?>
<!-- delimiter $$
create trigger update_movie_rating
after insert on review
for each row 
begin 
declare r decimal(10,1) default 0;
select avg(rating) into r where movieid=new.movieid;
update movie set rating=r where movieid=new.movieid;
end $$
delimiter ; -->
