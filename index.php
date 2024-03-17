<?php
error_reporting(0);
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link href="style/blog.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="#"> <div id="google_translate_element"></div></a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="#">Breaking news</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <form action="search.php" method="post">
                    <div class="input-group sm-3">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-success" name="submit" type="submit">Go</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="index.php">Home</a>
            <a class="p-2 text-muted" href="#">World</a>
            <a class="p-2 text-muted" href="#">Technology</a>
            <a class="p-2 text-muted" href="#">Culture</a>
            <a class="p-2 text-muted" href="#">Business</a>
            <a class="p-2 text-muted" href="#">Politics</a>
        </nav>
    </div>


    <div class="card" style="width:100%; height:350px;">
        <img class="card-img-top" src="https://content.thriveglobal.com/wp-content/uploads/2018/03/news-1.jpg"
             alt="Card image" height="350">
        <div class="card-img-overlay">
            <h4 class="card-title">Breaking news</h4>
            <p class="card-text">Breaking news is a popular Channel.</p>
        </div>
    </div>

    <div class="row mb-2">
    <?php for ($i = 0; $i < 2; $i++) { ?>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">Category Placeholder</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Title Placeholder</a>
                    </h3>
                    <div class="mb-1 text-muted">Date Placeholder</div>
                    <a href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="images/3.png"  width="150">
            </div>
        </div>
    <?php } ?>
</div>

<main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">From the Firehose</h3>

                <?php
                $page = $_GET['page'];
                if ($page == "" || $page == 1) {
                    $page1 = 0;
                } else {
                    $page1 = ($page * 5) - 5;
                }

                $query = mysqli_query($conn, "SELECT * FROM news LIMIT $page1,5");
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="blog-post">
                        <h4 class="blog"> <a><?php echo $row['title']; ?> </a></h4>
                        <p class="blog-post-meta"><?php echo $row['date']; ?> <a
                                    href="#"><?php echo $row['admin']; ?></a></p>
                        <p><img class="img img-images" src="images/<?php echo $row['images']; ?>"
                                width="400" height="200"> </p>
                        <hr>
                        <blockquote>
                            <?php echo substr($row['description'], 0, 300); ?>
                            <a style="color:blue;" ><?php echo $row['id']; ?> 
                               >Read More</a>
                        </blockquote>
                    </div>
                <?php } ?>
            </div><!-- /.blog-main -->



  <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere, 
                      veniam libero enim praesentium dignissimos id. Repudiandae suscipit maiores et, 
                      voluptas velit nam. Placeat unde blanditiis odio dolores eligendi aliquid et.
                      </p>
                </div>


                <style>
    .category-name {
        color: blue;
    }
</style>

<div class="p-3">
    <h4 class="font-italic">Categories</h4>
    <hr>
    <ol class="list-unstyled mb-0">
        <?php
        $query1 = mysqli_query($conn, "SELECT * FROM category");
        while ($row = mysqli_fetch_array($query1)) {
            ?>
            <li><span class="category-name"><?php echo $row['category_name']; ?></span></li>
        <?php } ?>
    </ol>
</div>
          <div class="p-3">
                    <h4 class="font-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">March 2014</a></li>
                        <!-- Add more archive links here -->
                    </ol>
                </div>

                <div class="p-3">
                    <h4 class="font-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->
  </div>  </main>

    <footer class="blog-footer">
        <p> <a href="#"> Mohammad Raad</a> </p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
</div>
</body>
</html>
