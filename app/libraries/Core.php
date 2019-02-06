<?php
  /*
    ** Heart of the site.
    ** Takes in the url and sees where to send
    ** From the URL it sets the controller/method/parameters that are involed
    ** Requires where we need to go
  */

  Class Core{
    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      $url = $this->getUrl();

      // Look in controllers for the first url value
      if(file_exists('../app/controllers/'. ucwords($url[0]) . '.php')){
        $this->currentController = ucwords($url[0]);
        // unset 0 index
        unset($url[0]);
      }

      // require the controller
      require_once '../app/controllers/' . $this->currentController . '.php';

      // Instantiate the controller class
      $this->currentController = new $this->currentController;

      // Check for the second part of the url (method)
      if(method_exists($this->currentController, $url[1])){
        $this->currentMethod = $url[1];
        // Unset 1
        unset($url[1]);
      }

      // Get params if there is params other wise leave empty array
      $this->params = $url ? array_values($url) : [];

      // Call the callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params); 
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = $_GET['url'];
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        return $url;
      }
    }
  }
