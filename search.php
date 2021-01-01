<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    
    <style>
        #main-container {
            min-height: 100vh;
        }
    </style>

    <title>Welcome to JakeForum - Coding forum</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'?>
    <?php include 'partials/_header.php'?>

    <!-- search results -->
    <div class="container my-3" id="main-container">
        <h1 class="py-3">Search results for <em>"<?php echo $_GET["search"]; ?>"</em></h1>

        <?php
        $noResults = true;
        $query = $_GET["search"];
        $sql = "SELECT * FROM threads WHERE MATCH (thread_title, thread_desc) against ('$query')";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $url = "thread.php?threadid=". $thread_id;
            $noResults = false;

            // Display the search results
            echo '<div class="results">
                    <h3><a href="'. $url .'" class="text-dark">' .$title. '</a></h3>
                    <p>' .$desc. '</p>
                </div>';

        }
        if ($noResults) {
            echo '<div class="jumbotron jumbotron-fluid my-3">
                <div class="container">
                    <p class="display-4">No Results found</p>
                    <p class="lead">
                    Suggestions:
                    <ul>
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li>
                    </ul>
                    </p>
                </div>
                </div>';
        }
    
        ?>

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