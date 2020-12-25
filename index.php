<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <title>Welcome to JakeForum - Coding forum</title>
</head>

<body>
    <?php include 'partials/_header.php'?>
    <?php include 'partials/_dbconnect.php'?>

    <!-- Slider starts from here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/slider-1.jpeg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="/img/slider-2.jpeg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="/img/slider-3.jpeg" class="d-block w-100" alt="..." />
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Catagory container starts from here -->
    <div class="container my-4">
        <h1 class="text-center my-4">JakeForum - Brows Catagories</h1>
        <div class="row my-4">
            <!-- Fetch all the catagories and use a for-loop for iterate through catagories -->
            <?php
          $sql = "SELECT * FROM `categories`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            // echo $row['category_id'];
            // echo $row['category_name'];
            $cat = $row['category_name'];
            $desc = $row['category_description'];
            echo '<div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem">
                        <img src="https://source.unsplash.com/500x400/?' .$cat. ',programming" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">' .$cat. '</h5>
                            <p class="card-text">' .substr($desc, 0, 90). '...</p>
                            <a href="#" class="btn btn-success">View threads</a>
                        </div>
                    </div>
                  </div>';
          }

          ?>
        </div>
    </div>

    <?php include 'partials/_footer.php'?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>