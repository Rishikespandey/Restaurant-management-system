<?php include '..\login\session_check.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant||Menu</title>
    <link rel="stylesheet" href="menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet"> -->
    <!-- <script src="https://kit.fontawesome.com/1f6f99be7a.js" crossorigin="anonymous"></script> -->
</head>
<body>
    <?php include '..\home\navbar.php'; ?>
    <h1 class="text-center mt-4">Select your type</h1>


    <div class="row d-flex justify-content-evenly m-5">
        <div class="col justify-content-center m-5">
            <a href="veg.php"><img src="veg.webp" alt="Veg Items" class="img rounded ms-5 border border-dark"></a>
            <h5 class="text-center mt-3"><a href="veg.php" class="text">Vegetarian</a></h5>
        </div>
        <div class="col justify-content-center m-5">
            <a href="non-veg.php"><img src="non-veg.png" alt="Non-veg Items" class="img rounded ms-5 border border-dark"></a>
            <h5 class="text-center mt-3"><a href="veg.php" class="text">Non-vegetarian</a></h5>
        </div>
        <div class="col justify-content-center m-5">
            <a href="chinese.php"><img src="chinese.jpg" alt="Chinese Items" class="img rounded ms-5 border border-dark"></a>
            <h5 class="text-center mt-3"><a href="veg.php" class="text">Chinese</a></h5>

        </div>
        <div class="col justify-content-center m-5">
            <a href="cheese.php"><img src="..\menu\cheese\Cheese Tikka.jpg" alt="Chinese Items" class="img rounded ms-5 border border-dark"></a>
            <h5 class="text-center mt-3"><a href="veg.php" class="text">cheese</a></h5>

        </div>
        <div class="col justify-content-center m-5">
            <a href="pizza.php"><img src="..\menu\pizza\1.jpg" alt="Chinese Items" class="img rounded ms-5 border border-dark"></a>
            <h5 class="text-center mt-3"><a href="veg.php" class="text">Pizza</a></h5>

        </div>
        <div class="col justify-content-center m-5">
            <a href="desert.php"><img src="..\menu\desert\5. Fudgy Chewy Brownies.jpg" alt="Chinese Items" class="img rounded ms-5 border border-dark"></a>
            <h5 class="text-center mt-3"><a href="veg.php" class="text">desert</a></h5>

        </div>
    </div>
</body>

</html>