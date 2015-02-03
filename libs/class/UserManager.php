<?php
class UserManager
{
  protected $_db; // Instance de PDO   
    public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(User $user)
  {
    $q = $this->_db->prepare('INSERT INTO tn_users SET pseudo = :pseudo, pass = :pass, email = :email, registration = :registration, ip = :ip');

    $q->bindValue(':pseudo', $user->pseudo());
    $q->bindValue(':pass', $user->pass());
    $q->bindValue(':email', $user->email());
    $q->bindValue(':registration', $user->registration());
    $q->bindValue(':ip', $user->ip());

    $q->execute();
    return $lastId = $this->_db->lastInsertId();
  }
  public function connexion($pseudo, $pass)
  {
    $q = $this->_db->prepare('SELECT tn_users.pass, tn_charactere.status FROM tn_users JOIN tn_charactere ON tn_users.id = tn_charactere.id WHERE pseudo = :pseudo');
    $q->execute(array(':pseudo' => $pseudo));
    while ($donnes = $q->fetch())
    {
      if($donnes['status'] == "banni")
      {
        $status = "banni";
        return $status;
      }
      else if($donnes['pass'] == $pass)
      {
        $status = "bon";
        return $status;
      }
      else{
        $status = "mdp";
        return $status;
      }
    }
  }
  public function registration($lastId)
  {
      $req2 = $this->_db->prepare("INSERT INTO tn_production_buildings (`id`,`joueur`) VALUES ('', :joueur)");
      $req2->bindValue(':joueur', $lastId, PDO::PARAM_INT);
      $req2->execute();


      $req3 = $this->_db->prepare("INSERT INTO prod_artisans (`id`,`joueur`) VALUES ('', :joueur)");
      $req3->bindValue(':joueur', $lastId, PDO::PARAM_INT);
      $req3->execute();

      $req4 = $this->_db->prepare("INSERT INTO prod_serfs (`id`,`joueur`) VALUES ('', :joueur)");
      $req4->bindValue(':joueur', $lastId, PDO::PARAM_INT);
      $req4->execute();

      $req5 = $this->_db->prepare("INSERT INTO population (`id`,`joueur`) VALUES ('', :joueur)");
      $req5->bindValue(':joueur', $lastId, PDO::PARAM_INT);
      $req5->execute();

      $req6 = $this->_db->prepare("INSERT INTO taxes (`id`,`joueur`) VALUES ('', :joueur)");
      $req6->bindValue(':joueur', $lastId, PDO::PARAM_INT);
      $req6->execute();

      $req7 = $this->_db->prepare("INSERT INTO ressources (`id`,`joueur`) VALUES ('', :joueur)");
      $req7->bindValue(':joueur', $lastId, PDO::PARAM_INT);
      $req7->execute();

      $req8 = $this->_db->prepare("INSERT INTO player_batiment (`id`,`joueur`) VALUES ('', :joueur)");
      $req8->bindValue(':joueur', $lastId, PDO::PARAM_INT);
      $req8->execute();

      $arraySerf = array();
      for($i=0;$i<=30;$i++)
      {
        if($i <= 7)
          $arraySerf[] = "('', ".$lastId.", 'serf', 'ble')";
        else
          $arraySerf[] = "('', ".$lastId.", 'serf', '')";
      }

      $req9 = $this->_db->query("INSERT INTO population (`id`,`joueur`,`type`,`accreditation`) VALUES ".implode(',', $arraySerf));

      $req10 = $this->_db->prepare("INSERT INTO moral_population (`id`,`joueur`) VALUES('', :joueur)");
      $req10->bindValue(':joueur', $lastId, PDO::PARAM_INT);
      $req10->execute();

  }

  public function inscriptionVille()
  {
    $q = $this->_db->query('SELECT nom FROM ville WHERE dispo = 0 order by rand() limit 1');
    while ($donnees = $q->fetch())
    {
      $nom = $donnees['nom'];
    }
    $q = $this->_db->prepare('UPDATE ville SET dispo = :dispo WHERE nom = :nom');
    $q->bindValue(':dispo', 1, PDO::PARAM_INT);
    $q->bindValue(':nom', $nom);
    $q->execute();

    return $nom;
  }

  public function inscriptionComtes()
  {
    $q = $this->_db->query('SELECT nom, duche FROM comtes order by rand() limit 1');
    while ($donnees = $q->fetch())
    {
      $comtes = array (
    'comtes' => $donnees['nom'],
    'duche' => $donnees['duche']);
      return $comtes;
    }
  } 

  public function delete(User $user)
  {
    $this->_db->exec('DELETE FROM tn_users WHERE id = '.$user->id());
  }

   public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->_db->query('SELECT pseudo, pass, email, registration, ip FROM tn_users WHERE id = '.$info);
      while ($donnees = $q->fetch())
      {
        return new User(array(
          'id' => $donnees['id'],
          'pseudo' => $donnees['pseudo'],
          'pass' => $donnees['pass'],
          'email' => $donnees['email'],
          'registration' => $donnees['registration'],
          'ip' => $donnees['ip'],
      ));
      }
    }
    else
    {
      $q = $this->_db->prepare('SELECT * FROM tn_users WHERE pseudo = :pseudo');
      $q->execute(array(':pseudo' => $info));
      

      while ($donnees = $q->fetch())
      {
        return new User(array(
          'id' => $donnees['id'],
          'pseudo' => $donnees['pseudo'],
          'pass' => $donnees['pass'],
          'email' => $donnees['email'],
          'registration' => $donnees['registration'],
          'ip' => $donnees['ip'],
      ));
      }
    }
  }

  public function exists($info)
  {
    if (is_int($info)) // On veut voir si tel personnage ayant pour id $info existe.
    {
      return (bool) $this->_db->query('SELECT COUNT(*) FROM tn_users WHERE id = '.$info)->fetchColumn();
    }
    
    // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.
    
    $q = $this->_db->prepare('SELECT COUNT(*) FROM tn_users WHERE pseudo = :pseudo');
    $q->execute(array(':pseudo' => $info));
    
    return (bool) $q->fetchColumn();
  }
  public function email($info)
  {   
    $q = $this->_db->prepare('SELECT COUNT(*) FROM tn_users WHERE email = :email');
    $q->execute(array(':email' => $info));
    
    return (bool) $q->fetchColumn();
  }

  public function update(User $user)
  {
    $id = $user->id();
    if (isset($id))
    {
      
    $q = $this->_db->prepare('UPDATE tn_users SET pseudo = :pseudo, pass = :pass, email = :email, registration = :registration, ip = :ip WHERE id = :id');

    $q->bindValue(':id', $user->id(), PDO::PARAM_INT);
    $q->bindValue(':pseudo', $user->pseudo());
    $q->bindValue(':pass', $user->pass());
    $q->bindValue(':email', $user->email());
    $q->bindValue(':registration', $user->registration(), PDO::PARAM_INT);
    $q->bindValue(':ip', $user->ip());

    $q->execute();
  }
    else
    {
      
      $q = $this->_db->prepare('UPDATE tn_users SET pass = :pass, email = :email, registration = :registration, ip = :ip WHERE pseudo = :pseudo');

    $q->bindValue(':pseudo', $user->pseudo());
    $q->bindValue(':pass', $user->pass());
    $q->bindValue(':email', $user->email());
    $q->bindValue(':registration', $user->registration(), PDO::PARAM_INT);
    $q->bindValue(':ip', $user->ip());

    $q->execute();
    }
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
  public function changePass($id, $pass)
  {
    $q = $this->_db->prepare('UPDATE tn_users SET pass = :pass WHERE id = :id');
    $q->bindValue(':id', $id);
    $q->bindValue(':pass', $pass);

    $q->execute();
  }
}