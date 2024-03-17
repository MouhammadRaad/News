<?php

include('include/header.php');

?>

<div style="margin-left:17%; width: 80%;">
    <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="news.php">News</a></li>
        <li class="breadcrumb-item active">Add News</li>
    </ul>
</div>

<div style="width: 70%; margin-left: 25%;">
    <form action="AddNews.php" method="post" enctype="multipart/form-data" name="categoryform"
        onsubmit="return validateform()">
        <h1>Add News</h1>
        <hr>
        <div class="form-group">
            <label for="email"> Title:</label>
            <input type="text" placeholder="Title..." name="title" class="form-control" id="email">
        </div>

        <div class="form-group">
            <label for="comment">Description:</label>
            <textarea class="form-control" placeholder="Description..." rows="5" name="description"
                id="comment"></textarea>
        </div>

        <div class="form-group">
            <label for="email"> Date:</label>
            <input type="date" name="date" class="form-control" id="email">
        </div>

        <div class="form-group">
            <label for="email"> images:</label>
            <input type="file" name="images" class="form-control img-images" id="email">
        </div>

        <div class="form-group">
            <label for="email"> Category:</label>
            <select class="form-control" name="category">
                <?php
                include('config.php');
                $query=mysqli_query($conn,"select * from category");

                while($row=mysqli_fetch_array($query)){
                    ?>
                <option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
                <?php } ?>
            </select>
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
    <script>
        function validateform() {
            var x = document.forms['categoryform']['title'].value;
            var y = document.forms['categoryform']['description'].value;
            var z = document.forms['categoryform']['date'].value;
            var w = document.forms['categoryform']['category'].value;
            if (x == "") {
                alert('Title Must Be Filled Out !');
                return false;
            }
            if (y == "") {
                alert('Description Must Be Filled Out !');
                return false;
            }
            if (y.length < 10) {
                alert('Description Atleast 100 character !');
                return false;
            }

        }

    </script>

</div>

<?php


include('config.php');
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $images = $_FILES['images']['name'];
    $tmp_images = $_FILES['images']['tmp_name'];
    $category = $_POST['category'];
    move_uploaded_file($tmp_images, "images/$images");

    $query1 = mysqli_query($conn, "insert into news(title,description,date,category,images)values('$title','$description','$date','$category','$images')");
    if ($query1) {
        echo "<script>alert('News uploaded Successfully !!')</script>  ";
    } else {
        echo "<script>alert('Please Try Again!!')</script>  ";
    }
}
?>
