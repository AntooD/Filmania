<?php
class UserManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->_db = $db;
  }

  public function add(UserModel $user)
  {
    $q = $this->_db->prepare('INSERT INTO user(email, pwd, droit) VALUES(:email, :pwd, :droit)');

    $q->bindValue(':email', $user->email());
    $q->bindValue(':pwd', $user->pwd());
    $q->bindValue(':droit', 0);

    $q->execute();
  }

  public function delete(UserModel $user)
  {
    $this->_db->exec('DELETE FROM user WHERE id = '.$user->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT * FROM user WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new UserModel($donnees);
  }

  public function getList()
  {
    $users = [];

    $q = $this->_db->query('SELECT * FROM user ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $users[] = new UserModel($donnees);
    }

    return $users;
  }

  public function update(UserModel $user)
  {
    $q = $this->_db->prepare('UPDATE user SET email = :email, pwd = :pwd, droit = :droit WHERE id = :id');

    $q->bindValue(':email', $user->email());
    $q->bindValue(':pwd', $user->pwd());
    $q->bindValue(':droit', $user->droit());
    $q->bindValue(':id', $user->id());

    $q->execute();
  }

  public function auth($email, $pwd)
  {

    $q = $this->_db->prepare('SELECT * FROM user WHERE email = :email');
    $q->bindValue(':email', $email);
    $q->execute();

    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    if($donnees && password_verify($pwd, $donnees["pwd"])){
      return new UserModel($donnees);
    }
    return null;
  }

  public function register(UserModel $newUser){
    $q = $this->_db->prepare("INSERT INTO user(email, pwd) VALUES(:email, :pwd)");
    $q->bindValue(":email", $newUser->email());
    $q->bindValue(":pwd", $newUser->pwd());

    $q->execute();
  }
}


?>