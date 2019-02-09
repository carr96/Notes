<?php

class Pages extends Controller{

  public function __construct(){
    $this->pageModel = $this->model('Page');
  }

  public function index(){
    $data = [

    ];
    $this->view('pages/index', $data);
  }

  public function create(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'username_err' => '',
        'password_err' => '',
      ];

      $erro_check = $data['username'] . $data['password'];
      if(empty($erro_check)){
        // If boths field blank on the page
        redirect('/pages/index');
      } else if(empty($data['username'])){
        // If username, send back proper error
        $data['username_err'] = 'Must have a username to signup';
        $this->view('pages/index', $data);
      } else if(empty($data['password'])){
        // If password, send back proper error
        $data['password_err'] = 'Must have a password to signup';
        $this->view('pages/index', $data);
      } else if($this->usernameExists($data['username'])){
        // Username is taken
        $data['username_err'] = 'Username Taken, try a different name to signup';
        $this->view('pages/index', $data);
      } else{
        // No errors, go to model
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $user_id = $this->pageModel->create($data);
        $this->createUserSession($user_id);
      }
    } else{
        // If they just visited the page
        $data = [];
      }
    $this->view('pages/index', $data);
  }

  public function login(){
    if($_SERVER['REQUEST_METHOD'] === "POST"){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'username_err' => '',
        'password_err' => '',
        'combo_err' => '',
        'user_id' => ''
      ];

      if(empty($data['username'])){
        $data['username_err'] = 'Username is empty';
      }

      if(empty($data['password'])){
        $data['password_err'] = "Password is empty";
      }

      if(empty($data['username_err']) && empty($data['password_err'])){
        // No empty fields, now check to see if login creds are correct
        $loggedIn = $this->pageModel->login($data);
          if($loggedIn){
            // User is correctly logged in. Now send them to profile.
            $this->createUserSession($loggedIn->user_id);
          } else{
            // Login creds are wrong
            $data['combo_err'] = 'Username/Password combo is wrong';
            $this->view('pages/index', $data);
          }
      }else{
        // There is a empty field. Send back to index
        $this->view('pages/index', $data);
      }
    } else{
      // User just entered page. No data.
      $data = [];
      redirect('pages/index');
    }
  }

  public function logout(){
    unset($_SESSION['user_id']);
    redirect('/pages/index');
  }

  public function createUserSession($user){
    $_SESSION['user_id'] = $user;
    redirect('/dashboards/index');
  }

  public function usernameExists($username){
    if($this->pageModel->usernameExists($username)){
      return true;
    } else{
      return false;
    }
  }
}
