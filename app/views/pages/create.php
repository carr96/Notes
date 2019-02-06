<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="<?php echo URLROOT;?>/pages/create" method="POST">
      <input class="inputs" type="text" name="username">
      <?php echo $data['username_err'] ?>
      <input class="inputs" type="password" name="password">
      <?php echo $data['password_err'] ?> 
      <input type="submit">
    </form>
  </body>
</html>
