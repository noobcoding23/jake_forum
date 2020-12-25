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

    <div class="container" id="ques">
        <h1 class="py-2">Browse Quetions</h1>
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
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