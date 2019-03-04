<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="<?php echo URLROOT;?>/css/pages/index.css">
</head>
<body>
<div id="wrapper">
  <div id="hero">
    <div id="entry">
      <div id="form-selections">
        <div id="login-selection" class="selection active"><i class="fas fa-sign-in-alt selection-icons"></i>Login</div>
        <div id="signup-selection" class="selection non-active"><i class="fas fa-user-plus selection-icons"></i>Signup</div>
        <div id="guest-selection" class="selection non-active"><i class="fas fa-user-secret selection-icons"></i>Guest</div>
      </div>

      <div id="form-wrapper">
        <div class="error" id="combo_err"><?php echo $data['combo_err'];?></div>
        <div class="error" id="username_err"><?php echo $data['username_err'];?></div>
        <div class="error" id="password_err"><?php echo $data['password_err'];?></div>
      </div>
    </div>
  </div>
  <div id="features">

  </div>
</div>
<script type="text/javascript" src="<?php echo URLROOT;?>/js/pages/index.js"></script>
</body>
</html>
