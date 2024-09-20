<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
        }
    </style>
</head>
<body>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<script>
    
    const stars = document.querySelectorAll('.fa-star');

    
    for (let i = stars.length - 1; i >= 0; i--) {
        const star = stars[i];
        star.addEventListener('click', () => {
            
            for (let j = i; j >= 0; j--) {
                stars[j].classList.toggle('checked');
            }
        });
    }
</script>
</body>
</html>