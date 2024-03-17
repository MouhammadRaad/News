<!DOCTYPE html>
<html>
<head>
    <title>Admin login</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style/admin.css">
</head>
<body>
   <div class="container">
      <form action="home.php" method="post">
         <h3>Admin Login</h3>
         <div class="form-group">
            <label for="email">Username:</label>
            <input type="Username" name="email" class="form-control" id="email">
         </div>
         <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="password" id="pwd">
         </div>
         <input type="submit" name="submit" class="btn btn-primary" value="Login">
      </form>
   </div>
</body>
</html>
