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

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title; ?> forums</h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum is for sharing knowledge with each other. No Spam / Advertising /
                Self-promote in the forums is not allowed. Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Remain respectful of other members at all times.</p>
            <p><b>Posted by: Jugal</b></p>
        </div>
    </div>

    <div class="container" id="ques">
        <h1 class="py-2">Discussions</h1>
        
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