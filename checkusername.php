#!/usr/bin/php
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
      $firstName = $_POST["firstname"];
      $lastName = $_POST["lastname"];
      $db = new PDO('sqlite:/var/www/html/www.bellarminenews.com/yb/1sAnd0sGroup2/1sAnd0s.sqlite3');
      $sql = "Select lastName from '1sAnd0s' where firstName=$lastName";
      $result = $db->query($sql);
      foreach($result as $value)
      {
	      print $value . "\n";
      }
    ?>
  </body>
</html>