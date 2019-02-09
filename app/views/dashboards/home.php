<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
      Dashboard
    </title>

     <link rel="stylesheet" type="text/css" href="<?php echo URLROOT;?>/css/dashboard/home.css">
     <link rel="stylesheet" type="text/css" href="<?php echo URLROOT;?>/css/dashboard/styles.css">

     <link href="https://fonts.googleapis.com/css?family=Cardo|Merriweather|Open+Sans|PT+Sans|PT+Serif|Raleway" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
  </head>
  <body>
    <div id="wrapper">
      <?php include 'nav.php';?>

      <section>
        <h1> <?php echo $data['name'] ; ?> </h1>

        <div class="category">
          <div class="cat-head">Developing</div>
          <div class="notes">Total Notes: <?php echo $data['developing_total']; ?></div>
          <div class="cat-btn"><a href="<?php echo URLROOT;?>/dashboards/developing_general">Enter Dashboard</a></div>
        </div>

        <div class="category">
          <div class="cat-head">Investing</div>
          <div class="notes">Total Notes: <?php echo $data['investment_total']; ?></div>
          <div class="cat-btn"><a href="<?php echo URLROOT;?>/dashboards/investment_general">Enter Dashboard</a></div>
        </div>

        <div class="category">
          <div class="cat-head">Personal</div>
          <div class="notes">Total Notes: 0</div>
          <div class="cat-btn"><a href="">Enter Dashboard</a></div>
        </div>

        <div class="category">
          <div class="cat-head">Tasks</div>
          <div class="notes">Total Notes: 0</div>
          <div class="cat-btn"><a href="">Enter Dashboard</a></div>
        </div>
      </section>
    </div>
  <script src="<?php echo URLROOT;?>/js/dashboard/home.js"></script>
  </body>
</html>
