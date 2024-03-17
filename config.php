<?php
define("db_SERVER", "localhost");
define("db_USER", "root");
define("db_PASSWORD", "");
define("db_DBNAME", "news");

$conn = mysqli_connect(db_SERVER, db_USER, db_PASSWORD, db_DBNAME);
if (!$conn) {
    die("Error connecting to the database: " . mysqli_connect_error());
}
?>
