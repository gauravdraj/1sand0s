<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <form method="post" action="scripts/checkusername.php">      

        <div class="form-group" hidden>
          <label for="store">User </label>
          <input type="text" class="form-control" name="uid" id="uid" value="<?php echo " " . $_SESSION["UserID"] . " "; ?>">
        </div>

        <div class="form-group">
           <p class="form-control-static"><b><?php echo isset($row['Username']) ? $row['Username'] : NULL; ?></b></p>
        <div>

        <div class="form-group">
           <label for="store">Name of Person</label>
           <input type="text" class="form-control" name="username" id="username" value="<?php echo isset($row['Username']) ? $row['Username'] : NULL; ?>">
        </div>

        <div class="form-group">
           <label for="exampleInputEmail1">Email Address of Person</label>
           <input type="email" class="form-control" name="email" id="email" value="<?php echo isset($row['EmailAddress']) ? $row['EmailAddress'] : NULL; ?>">
        </div>

        <button type="submit" class="btn btn-prime">Update Person</button>
        </form>
        <?php
          if (isset($_POST['username'])) {
            $username = $_POST['username'];
            if (!empty($username)) {
              $username_query = $conn->prepare("SELECT * FROM users WHERE Username = ?");
              $username_query->bind_param("s", $username);
              $username_query->execute();
              $count = $username_query->num_rows;
              if($count==0) {
                echo "Username doesn't exist";
                exit;
              }
              else {
                echo "Username already exists";
                exit;
              } 
            }
          }
          ?>
    </body>
</html>
