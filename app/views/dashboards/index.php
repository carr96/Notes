<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
      Dashboard
    </title>

     <link rel="stylesheet" type="text/css" href="<?php echo URLROOT;?>/css/dashboard/index.css">
     <link rel="stylesheet" type="text/css" href="<?php echo URLROOT;?>/css/dashboard/styles.css">
     <link rel="stylesheet" type="text/css" media="(max-width:890px)" href="<?php echo URLROOT;?>/css/dashboard/index-mobile.css">

     <link href="https://fonts.googleapis.com/css?family=Cardo|Lato|Merriweather|Open+Sans|PT+Sans|PT+Serif|Raleway" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
  </head>
  <body>
    <section id="wrapper">
      <nav>
        <a id="Investments" class="link" href="javascript:void(0)"><span class="nav-link-word">Investments</span><i class="fas fa-chart-line"></i></a>
        <a id="Developing" class="link" href="javascript:void(0)"><span class="nav-link-word">Developing</span><i class="fas fa-code"></i></a>
        <a id="Tasks" class="link" href="javascript:void(0)"><span class="nav-link-word">Tasks</span><i class="fas fa-tasks"></i></a>
        <a id="Personal" class="link" href="javascript:void(0)"><span class="nav-link-word">Personal</span><i class="far fa-user-circle"></i></a>
        <a id="Settings" class="link" href="javascript:void(0)"><span class="nav-link-word">Settings</span><i class="fas fa-cogs"></i></a>
      </nav>
      <div class="hidden" id="Investments-hidden">
        <a class="sub-link" href="<?php echo URLROOT;?>/dashboards/investment_general">General</a>
        <a class="sub-link disable" href="">Strategy</a>
        <a class="sub-link disable" href="">Calculator</a>
        <a class="sub-link disable" href="">Holdings</a>
        <a class="sub-link disable" href="">Futures</a>
      </div>

      <div class="hidden" id="Developing-hidden">
        <a class="sub-link" href="<?php echo URLROOT;?>/dashboards/developing_general">General</a>
        <a class="sub-link disable" href="">Design tips</a>
        <a class="sub-link disable" href="">UI/UX</a>
        <a class="sub-link disable" href="">Back-end</a>
        <a class="sub-link disable" href="">front-end</a>
        <a class="sub-link disable" href="">Developing Security</a>
        <a class="sub-link disable" href="">Tips</a>
      </div>

      <div class="hidden" id="Tasks-hidden">
        <a class="sub-link disable" href="">List</a>
        <a class="sub-link disable" href="">Stopwatch</a>
        <a class="sub-link disable" href="">Reminders</a>
      </div>

      <div class="hidden" id="Personal-hidden">
        <a class="sub-link disable" href="">Expenses/Income</a>
        <a class="sub-link disable" href="">Passwords</a>
        <a class="sub-link disable" href="">Nutrition</a>
        <a class="sub-link disable" href="">Resume</a>
        <a class="sub-link disable" href="">Goals</a>
      </div>

      <div class="hidden" id="Settings-hidden">
        <div id="mobile-settings-header"><?php echo $data['username'];?></div>
        <a class="sub-link disable" id="logout"href="<?php echo URLROOT?>/dashboards/logout"> Logout</a>
      </div>


      <header id="mobile-header">
        <span id="header-text"><?php echo $data['header']?></span>
        <i class="fas fa-sort-down"></i>
      </header>
      <section id="content-wrapper">
        <aside id="aside">
          <?php
          if(isset($_SESSION['confirm'])){
              echo "<div class='confirm'><a href='".URLROOT."/dashboards/kill_session/outside'><i class='fas fa-times'></i>".$_SESSION['confirm']." </a></div>";
          }
          ?>

          <div id="note-search-container">
            <form action="<?php echo URLROOT;?>/dashboards/<?php echo $data['method']?>" method="POST">
              <input id="note-search" type="text" name="search" placeholder="Search <?php echo $data['header'];?>">
              <button type="submit"><i class="fas fa-search fa-search-desktop"></i></button>
            </form>
            <?php
              if(isset($_SESSION['search-word'])){
                echo "<div id='search-word'><a href='".URLROOT."/dashboards/delete_search/".$data['table']."'><i class='fas fa-times'></i>".$_SESSION['search-word']."</a></div>";
              }
            ?>
          </div>
          <!--
          <i class="new-note-i fas fa-plus"></i>
          <i class="new-note-i fas fa-pencil-alt"></i>
          <i class="new-note-i fas fa-edit"></i>
          <i class="new-note-i far fa-sticky-note"></i>
          -->
          <div id="new-note-container" class="textarea-container">
            <div class="note-id-hide"></div>
            <div class="saved-note"></div>
            <div id="setNote" class="title selected-note"><i class="new-note-i fas fa-pencil-alt"></i> New Note</div>
          </div>
          <?php foreach($data['notes'] as $note): ?>
            <?php echo '
            <div class="textarea-container saved-note-container">
              <div class="note-id-hide">'. htmlspecialchars($note->note_id) .'</div>'.'
              <div class="saved-note">'. htmlspecialchars($note->note) .'</div>
              <div class="delete"><a class="delete-a" href="'.URLROOT.'/dashboards/delete_note/'.htmlspecialchars($note->note_id).'/'.$data['table'] .'"><i class="far fa-trash-alt"></i></a></div>
              <div class="title non-selected-note">'.htmlspecialchars($note->title).'</div>
            </div>
            ';
            ?>
          <?php endforeach?>
        </aside>
        <main id="main">
          <div id="note-num"> New Note</div>
          <form id="note-form" action="http://localhost/organizer/dashboards/add_note/<?php echo $data['table'];?>" method="POST">
            <textarea name="note" id="note" placeholder="Begin Writing...."></textarea>
            <div id="add-title-note">
              <div id="cancel-note"><a href="<?php echo URLROOT;?>/dashboards/goBack">Cancel</a></div>
              <input name="title" id="add-title" type="text" placeholder="Title">
              <button id="add-note" type="submit">Add</button>
            </div>
          </form>
        </main>
      </section>

      <div id="new-note-button">
        <i class="fas fa-plus"></i>
        <i class="new-note-i fas fa-pencil-alt"></i>
      </div>
    </section>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo URLROOT;?>/js/dashboard/index.js"></script>
  </body>
</html>
