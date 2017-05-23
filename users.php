<?php
  class User {
    public $username;
    public $password;
    public $mail;
    public $email_valid;
    public $droits;

    function __construct($objet){
      $this->username = $objet->username;
      $this->password = $objet->password;
      $this->mail = $objet->email;
      $this->email_valid = $objet->mail_valid;
      $this->droits = $objet->droits;
    }
  }

  class UserDAO {
    private $db;

    function __construct(){
      try{
        $this->db = new PDO('sqlite:data/database.db');
      }
      catch (PDOException $e){
        die("erreur de connexion: ".$e->getMessage());
      }
    }

    function get($username){
      $req = "SELECT * FROM USER WHERE username='$username'";
      $sth=$this->db->query($req);
      $tabObjets = $sth->fetchAll(PDO::FETCH_CLASS);

      if (sizeof($tabObjets)== 1 ) {
        return new User($tabObjets[0]);
      }
    }

    function add($user){
      var_dump($user[0]);
      $req = "INSERT INTO USER VALUES('$user[0]', '$user[1]', '$user[2]', 0, 1)";
      $this->db->query($req);
    }
  }

  $userInit = new UserDAO();
?>
