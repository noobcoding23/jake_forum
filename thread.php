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
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
    }
    

    ?>

<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        // insert comment db
        $comment = $_POST['comment'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '0', CURRENT_TIMESTAMP);";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your comment has been added!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    }
    
    ?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum is for sharing knowledge with each other. No Spam / Advertising /
                Self-promote in the forums is not allowed. Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Remain respectful of other members at all times.</p>
            <p>Posted by: <b>Jugal</b></p>
        </div>
    </div>

<?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<div class="container">
        <h1 class="py-2">Post a comment</h1>
        <form action="' .$_SERVER['REQUEST_URI']. '" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Post comment</button>
        </form>
    </div>';
    }
    else {
        echo '
            <div class="container">
                <h1 class="py-2">Post a comment</h1>
                <p class="lead">You are not logged in. Please login to be able to post comments</p>
            </div>
        ';
    }
?>

    <div class="container" id="ques">
        <h1 class="py-2">Discussions</h1>
        
        <?php
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
            $result = mysqli_query($conn, $sql);    
            $noResult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $comment_time = $row['comment_time'];
            echo '<div class="media my-3">
                <img src="/img/userdefault.png" width="54px" class="mr-3" alt="...">
                <div class="media-body">
                        <p class="font-weight-bold my-0">Anonymous User at <span style="color:gray;font-weight:500;">' .$comment_time. '</span></p>
                        ' .$content. '
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