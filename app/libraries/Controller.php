<?php
/*
 ** Core Controller
 ** All controllers extend this controller
** Excepts views and models and sets them easily
*/

class Controller{

  // Load View
  public function view($view, $data = []){
    // Check for the view file
    if(file_exists('../app/views/' .$view . '.php')){
      require_once '../app/views/' . $view . '.php';
    } else{
      // View does not exist
      die('View does not exist');
    }
  }

  // Load model
  public function model($model){
    require_once '../app/models/' . $model .'.php';

    return new $model();
  }
}
