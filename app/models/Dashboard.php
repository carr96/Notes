<?php
class Dashboard{
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function add_note($note, $title, $user_id, $table){
    $this->db->query('INSERT INTO '. $table .'(note, title, user_id) VALUES(:note, :title, :user_id)');
    $this->db->bind(':note', $note);
    $this->db->bind(':title', $title);
    $this->db->bind(':user_id', $user_id);
    return $this->db->execute();
  }

  public function getNotes($table){
    $this->db->query('SELECT * FROM '. $table .' WHERE user_id = :user_id');
    $this->db->bind(':user_id', $_SESSION['user_id']);
    return $this->db->resultSet();
  }

  public function searchNotes($search, $table){
    $this->db->query('SELECT * FROM '.$table.' WHERE user_id = :user_id AND title LIKE "%":search "%"');
    $this->db->bind(':user_id', $_SESSION['user_id']);
    $this->db->bind(':search', $search);
    return $this->db->resultSet();
  }

  public function delete_note($id, $table){
    $this->db->query("DELETE FROM ". $table ." WHERE note_id = :note_id");
    $this->db->bind(":note_id", $id);
    return $this->db->execute();
  }

  public function update_note($data, $table){
    $this->db->query('UPDATE '.$table.' SET note = :note, title = :title WHERE note_id = :id');
    $this->db->bind(":note", $data['note']);
    $this->db->bind(":title", $data['title']);
    $this->db->bind(":id", $data['id']);
    return $this->db->execute();
  }

  public function notes_num($id, $table){
    $this->db->query("SELECT * FROM ".$table." WHERE user_id = :user_id");
    $this->db->bind(':user_id', $_SESSION['user_id']);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function getName($id){
    $this->db->query('SELECT * FROM users WHERE user_id = :user_id');
    $this->db->bind(':user_id', $id);
    $row = $this->db->single();
    return $row->username;
  }
}
