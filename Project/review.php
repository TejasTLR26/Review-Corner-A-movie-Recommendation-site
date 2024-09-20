
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            text-align: center;
        }

        .rating > span {
            display: inline-block;
            position: relative;
            width: 1.5em; 
            font-size: 2em; 
        }


        .rating-container {
            display: flex;
            align-items: center;
        }

        .rating-label {
            margin-right: 10px;
        }
    </style>
    <script>
        function displayStars(num) {
            var stars = document.getElementsByClassName('rating')[0].getElementsByTagName('span');
            for (var i = 0; i < stars.length; i++) {
                if (i < num) {
                    stars[i].classList.add('selected');
                } else {
                    stars[i].classList.remove('selected');
                }
            }
        }
    </script>
</head>
<body>
    <?php
    $rating = isset($_POST['rating']) ? $_POST['rating'] : ''; // Get the rating value from the form submission
    ?>
    <form name="myform" method="post">
        review:
        <input type="text" name="review">
        <div class="rating-container">
            <span class="rating-label">rating:</span>
            <div class="rating">
                <span onclick="displayStars(5)" <?php if ($rating == '5') echo 'class="selected"'; ?>></span>
                <span onclick="displayStars(4)" <?php if ($rating == '4') echo 'class="selected"'; ?>></span>
                <span onclick="displayStars(3)" <?php if ($rating == '3') echo 'class="selected"'; ?>></span>
                <span onclick="displayStars(2)" <?php if ($rating == '2') echo 'class="selected"'; ?>></span>
                <span onclick="displayStars(1)" <?php if ($rating == '1') echo 'class="selected"'; ?>></span>
            </div>
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>