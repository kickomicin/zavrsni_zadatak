<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>
    <?php
    $posts;
    try {
        $host='localhost';
        $databaseName='blog';
        $username='admin';
        $password='KicaLisica!2#';
        $connection = new PDO("mysql:host=$host;dbname=$databaseName", $username, $password);
        $sql='SELECT * FROM posts ORDER BY created_at DESC;';
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $posts = $statement->fetchAll();

    } catch(PDOException $e){
        echo $e->getMessage();die;
    }

    ?>
    <?php
        include 'header.php';
    ?>
    <main role="main" class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                <?php
                    if(is_array($posts) && count($posts) > 0){
                        foreach($posts as $key => $post){?>
                            <div class="blog-post">
                                <a class="blog-post-title" href="./single-post.php?post_id=<?php echo  $post['id'] ?>"><?php echo $post['title'] ?></a>
                                <p class="blog-post-meta">
                                    <?php echo $post['created_at'] ?>
                                    <a href="#"><?php echo $post['author'] ?></a>
                                </p>
                                <p><?php echo $post['body'] ?></p>
                            </div>
                        <?php
                        }
                    }
                ?>
            </div>
            <?php
                include 'sidebar.php';
            ?>
        </div><!-- /.row -->
    </main><!-- /.container -->
    <?php
            include 'footer.php';
    ?>
</body>
</html>
