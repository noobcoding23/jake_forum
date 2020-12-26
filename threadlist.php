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
    #ques {
        min-height: 330px;
    }
    </style>

    <title>Welcome to JakeForum - Coding forum</title>
</head>

<body>
    <?php include 'partials/_header.php'?>

    <?php include 'partials/_dbconnect.php'?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        // insert thread into db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your thread has been added! Please wait for community to respond
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    }
    
    ?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> forums</h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum is for sharing knowledge with each other. No Spam / Advertising /
                Self-promote in the forums is not allowed. Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Remain respectful of other members at all times.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <div class="container">

        <h1 class="py-2">Start a discussion</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Problem title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" required>
                <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                    possible</small>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Elaborate your problem</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

    </div>

    <div class="container" id="ques">
        <h1 class="py-2">Browse Quetions</h1>
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
            $result = mysqli_query($conn, $sql);    
            $noResult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];

            echo '<div class="media my-3">
                <img src="/img/userdefault.png" width="54px" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0"><a class="text-dark" href="/thread.php?threadid=' .$id. '">' .$title. '</a></h5>
                        ' .$desc. '
                    </div>
                </div>';
            }
            if ($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <p class="display-4">No threads found</p>
                            <p class="lead">Be the first person to ask question to this category</p>
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