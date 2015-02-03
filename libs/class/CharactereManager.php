<?php
class CharactereManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Charactere $charactere)
  {
    $q = $this->_db->prepare('INSERT INTO tn_charactere SET town = :town, earl = :earl, duchy = :duchy, gender = :gender, avatar = :avatar, background = :background, status = :status, premium = :premium, holiday = :holiday, date_holiday = :date_holiday');

    $q->bindValue(':town', $charactere->town());
    $q->bindValue(':earl', $charactere->earl());
    $q->bindValue(':duchy', $charactere->duchy());
    $q->bindValue(':gender', $charactere->gender());
    $q->bindValue(':avatar', $charactere->avatar());
    $q->bindValue(':background', $charactere->background());
    $q->bindValue(':status', $charactere->status());
    $q->bindValue(':premium', $charactere->premium());
    $q->bindValue(':holiday', $charactere->holiday());
    $q->bindValue(':date_holiday', $charactere->dateHoliday());

    $q->execute();
  }
  public function delete(Charactere $charactere)
  {
    $this->_db->exec('DELETE FROM tn_charactere WHERE id = '.$charactere->id());
  }

   public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->_db->prepare('SELECT * FROM tn_charactere WHERE id = :id');
      $q->execute(array(':id' => $info));
      while ($donnees = $q->fetch())
      {
        return new Charactere(array(
          'town' => $donnees['town'],
          'earl' => $donnees['earl'],
          'gender' => $donnees['gender'],
          'avatar' => $donnees['avatar'],
          'background' => $donnees['background'],
          'status' => $donnees['status'],
          'premium' => $donnees['premium'],
          'holiday' => $donnees['holiday'],
          'date_holiday' => $donnees['date_holiday'],
      ));
      }
    }
    else
    {
      $q = $this->_db->prepare('SELECT * FROM tn_charactere WHERE pseudo = :pseudo');
      $q->execute(array(':pseudo' => $info));
      

      while ($donnees = $q->fetch())
      {
        return new Charactere(array(
          'town' => $donnees['town'],
          'earl' => $donnees['earl'],
          'gender' => $donnees['gender'],
          'avatar' => $donnees['avatar'],
          'background' => $donnees['background'],
          'status' => $donnees['status'],
          'premium' => $donnees['premium'],
          'holiday' => $donnees['holiday'],
          'date_holiday' => $donnees['date_holiday'],
      ));
      }
    }
  }
  public function update(Charactere $charactere)
  {
    $id = $charactere->id();
    if (isset($id))
    {
      
    $q = $this->_db->prepare('UPDATE tn_charactere SET town = :town, earl = :earl, duchy = :duchy, gender = :gender, avatar = :avatar, background = :background, status = :status, premium = :premium, holiday = :holiday, date_holiday = :date_holiday WHERE id = :id');

     $q->bindValue(':town', $charactere->town());
    $q->bindValue(':earl', $charactere->earl());
    $q->bindValue(':duchy', $charactere->duchy());
    $q->bindValue(':gender', $charactere->gender());
    $q->bindValue(':avatar', $charactere->avatar());
    $q->bindValue(':background', $charactere->background());
    $q->bindValue(':status', $charactere->status());
    $q->bindValue(':premium', $charactere->premium());
    $q->bindValue(':holiday', $charactere->holiday());
    $q->bindValue(':date_holiday', $charactere->dateHoliday());

    $q->execute();
    }
    else
    {
      return "Error sent parameter must be a number";
    }
  }
  public function changeBackground($id, $background)
  {
    $q = $this->_db->prepare('UPDATE tn_charactere SET background = :background WHERE id = :id');
    $q->bindValue(':id', $id);
    $q->bindValue(':background', $background);

    $q->execute();
  }
  public function changeAvatar($id, $avatar)
  {
    $q = $this->_db->prepare('UPDATE tn_charactere SET avatar = :avatar WHERE id = :id');
    $q->bindValue(':id', $id);
    $q->bindValue(':avatar', $avatar);

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>