<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<div class="header">
    <img src="page banner.png" alt="Logo" class="logo">
</div>

<div class="taskbar">
    <a href="movie.php">Movies</a>
    <a href="#feedback">Feedback</a>
    <a href="#contact">Contact</a>
    <form method="post">
        <button type="submit" name="logout" class="logout-button">Logout</button>
    </form>
</div>
<style>
.header {
    text-align: center;
    padding: 20px;
}

.logo {
    max-width: 200px;
    height: auto;
}

.taskbar {
    background-color: #4CAF50; 
    overflow: hidden;
    display: flex;
    justify-content: space-between;
    padding: 10px;
    border-radius: 15px; 
}

.taskbar a {
    color: white; 
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.taskbar a:hover {
    background-color: light green;
    color: black;
}

.logout-button {
    background-color: white;
    color: #4CAF50; 
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}


.content {
    text-align: center;
    margin-top: 50px;
}

.section {
    margin-top: 50px;
}

.section h2 {
    text-align: center;
}

.section p {
    text-align: center;
}

.section ul {
    list-style-type: none;
    padding: 0;
    text-align: center;
}

.section ul li {
    margin-bottom: 10px;
}

.social-media-icons {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.social-media-icons a {
    margin: 0 10px;
}

.social-media-icons img {
    width: 30px;
    height: 30px;
}

body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

p {
    font-size: 18px;
    color: #666;
    margin-bottom: 10px;
}

ul {
    margin-bottom: 20px;
}

li {
    font-size: 16px;
    color: #666;
    margin-bottom: 5px;
}

.section {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.section h2 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.section p {
    font-size: 16px;
    color: #666;
    margin-bottom: 10px;
}

.section ul {
    margin-bottom: 10px;
}

.social-media-icons img {
    width: 40px;
    height: 40px;
}
</style>

<div class="content">
    <h1>Welcome to Review Corner!</h1>
    <p>Check out our latest movie recommendations:</p>
    <ul>
        <li>The Shawshank Redemption</li>
        <li>The Godfather</li>
        <li>Pulp Fiction</li>
        <li>The Dark Knight</li>
    </ul>
</div>



<div id="about" class="section">
    <h2>About Us</h2>
    <p>Welcome to our movie recommendation website ! We are a team of movie enthusiasts who love to share our favorite films with you. Our goal is to provide you with the best movie recommendations based on various genres and themes. Whether you're a fan of action, drama, comedy, or sci-fi, we've got you covered. Explore our website, discover new movies, and let us know your feedback. We value your opinion and strive to improve our recommendations based on your input. Thank you for visiting our website! Visit Again!</p>
</div>

<div id="contact" class="section">
    <h2>Contact</h2>
    <p>For any inquiries, please contact us:</p>
    <ul>
        <li>Email: info@example.com</li>
        <li>Phone: 123-456-7890</li>
        <li>Address: 123 Main Street, City, Country</li>
    </ul>
</div>

<div id="social-media" class="section">
    <h2>Follow Us</h2>
    <p>Stay connected with us on social media:</p>
    <div class="social-media-icons">
        <a href="https://www.facebook.com"><img src="facebook.png" alt="Facebook"></a>
        <a href="https://www.twitter.com"><img src="twitter.png" alt="Twitter"></a>
        <a href="https://www.instagram.com"><img src="instagram.png" alt="Instagram"></a>
    </div>
</div>
</body>
