<?php
class Charactere
{
  protected $id,
            $town,
            $earl,
            $duchy,
            $gender,
            $avatar,
            $background,
            $status,
            $premium,
            $holiday,
            $dateHoliday;

   public function __construct(array $donnees)
 {
    $this->hydrate($donnees);
  }

  	  // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
	public function hydrate(array $donnees)
	{
  		foreach ($donnees as $key => $value)
  		{
    		// On récupère le nom du setter correspondant à l'attribut.
    		$method = 'set'.ucfirst($key);
        
    // Si le setter correspondant existe.
    		if (method_exists($this, $method))
    		{
      			// On appelle le setter.
      			$this->$method($value);
    		}
  		}
	}


  	public function setId($id)
  	{
    // On convertit l'argument en nombre entier.
    // Si c'en était déjà un, rien ne changera.
    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
    $id = (int) $id;
    
    // On vérifie ensuite si ce nombre est bien strictement positif.
    if ($id > 0)
    {
      // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
      $this->id = $id;
    }
  }
  public function setTown($town)
  {
      $this->town = $town;
  }
  public function setEarl($earl)
  {
    if(is_string($earl)) {
      $this->earl = $earl;
    }
  }
  public function setDuchy($duchy)
  {
    if(is_string($duchy)) {
      $this->duchy = $duchy;
    }
  }
  public function setGender($gender)
  {
    if(is_string($gender)) {
      $this->gender = $gender;
    }
  }
  public function setAvatar($avatar)
  {
    if(is_string($avatar)) {
      $this->avatar = $avatar;
    }
  }
  public function setBackground($background)
  {
    if(is_string($background)) {
      $this->background = $background;
    }
  } 
  public function setStatus($status)
  {
    if(is_string($status)) {
      $this->status = $status;
    }
  } 
  public function setPremium($premium)
  {
    $premium = (int) $premium;
    $this->premium = $premium;
  }
  public function setHoliday($holiday)
  {
    $holiday = (int) $holiday;
    $this->holiday = $holiday;
  }
  public function setDateHoliday($holiday)
  {
    $this->dateHoliday = $holiday;
  }
  

  public function id()
    {
      return $this->id;
    }
    public function town()
    {
      return $this->town;
    }
    public function earl()
    {
      return $this->earl;
    }
    public function duchy()
    {
      return $this->duchy;
    }
    public function gender()
    {
      return $this->gender;
    }  
    public function avatar()
    {
      return $this->avatar;
    }
    public function background()
    {
      return $this->background;
    }
    public function status()
    {
      return $this->status;
    }
    public function premium()
    {
      return $this->premium;
    }
    public function holiday()
    {
      return $this->holiday;
    }
    public function dateHoliday()
    {
      return $this->dateHoliday;
    }
}
