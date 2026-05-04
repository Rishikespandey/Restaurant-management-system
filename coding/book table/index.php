<?php include '..\login\session_check.php'; ?>

<!doctype html>
<html lang="en">

<head>
  <title>Book Your Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include '..\home\navbar.php'; ?>
  <div class="inner-layer">
    <div class="container">
      <div class="row no-margin">
        <div class="col-sm-7">
          <div class="content">
            <h1>Book Your Table Now and Eat Your favorite Food</h1>

          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-data p-3">
            <div class="form-head">
              <h2>Book Your Table</h2>
            </div>
            <form action="booktable.php" method="POST">
              <div class="mb-3">
                <input type="text" class="form-control" name="name" pattern="[A-Za-z]{1-20}" maxlength="20" placeholder="Enter Name" required>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" name="phone" pattern="[0-9]{10}" placeholder="Enter Phone Number" required>
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" name="email" maxlength="30" placeholder="Enter Email" required>
              </div>
              <div class="md-form md-outline input-with-post-icon datepicker">
                <input placeholder="Select date" name="date" type="date" id="example" class="form-control fas fa-calendar input-prefix">
              </div>
              <!-- <div class="mb-3">
                <input type="date" id="datepicker" class="form-control datepicker" placeholder="Booking Date" required>
              </div> -->
              <div class="text-center">
                <button name="submit" type="submit" class="btn btn-primary mt-3">Submit</button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>

</body>

<!-- 
<script src="jquery-3.3.1.min.js"></script>
<script src="popper.min.js"></script>
<script src="bootstrap.min.js"></script>
<script src="bootstrap-datepicker.js"></script> -->

<!-- <script>
  $(document).ready(function() {
    $("#dat").datepicker();
  })
</script> -->

</body>

</html>
<script>
  $('.datepicker').datepicker({
    // An integer (positive/negative) sets it relative to today.
    min: 0,
    // `true` sets it to today. `false` removes any limits.
    max: +15
  })
</script>