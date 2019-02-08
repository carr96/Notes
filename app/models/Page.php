<?php

class Page{
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function create($data){
    $this->db->query("INSERT INTO users(username, password) VALUES(:username, :password)");
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':password', $data['password']);
    if($this->db->execute()){
      return $this->getLastId();
    } else {
      die("database error");
    }
  }

  public function usernameExists($username){
    $this->db->query("SELECT * FROM users WHERE username = :username");
    $this->db->bind(':username', $username);
    $row = $this->db->single();
    if($row->username){
      return true;
    } else{
      return false;
    }
  }

  public function login($data){
    $this->db->query("SELECT * from users WHERE username = :username");
    $this->db->bind(":username", $data['username']);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if(password_verify($data['password'], $hashed_password)){
      return $row;
    } else{
      return false;
    }
  }

  public function getLastId(){
    return $this->db->lastInsertId();
  }


}
