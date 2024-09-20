<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .banner {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius:15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .banner h1 {
            font-family: "Arial Black", sans-serif;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="banner">
        <h1>Welcome to Review Corner</h1>
    </div>
    <h2>Login Form</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login" name="Login">
    </form>
    <h2>Signup Form</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Signup" name="Signup">
    </form>
</body>
</html>
<?php

if(isset($_POST["Login"]))
{
    $user=$_POST["username"];
    $pass=$_POST["password"];
    $query="SELECT * FROM user WHERE username='$user' AND password='$pass'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0)
    {
        session_start();
        $_SESSION["username"]=$user;
        header("location:main.php");
    }
    else
    {
        echo "<script> alert('Invalid username or password')</script>";
        
    }
}
if(isset($_POST["Signup"]))
{
    $user=$_POST["username"];
    $pass=$_POST["password"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $query1="Select* from user where username='$user' or email='$email'";
    $res1=mysqli_query($conn,$query1);
    if(mysqli_num_rows($res1)>0)
    {
        echo "<script> alert('Username or email already exists. Please login and try again')</script>";
        
    }
    else
    {
        $query="INSERT INTO user(username,name,password,email) VALUES('$user','$name','$pass','$email')";
    $res=mysqli_query($conn,$query);
    if($res)
    {
        session_start();
        $_SESSION["username"]=$user;
        header("location:main.php");
    }
    else
    {
        echo "<script> alert('signup failed')";
        
    }
}

    }
    
    

?>
