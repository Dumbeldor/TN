<?php
class User {
	protected $id,
			  $pseudo,
			  $pass,
			  $email,
			  $ip,
			  $registration;


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
  	public function setPseudo($pseudo)
  	{
  		if(is_string($pseudo)) {
  			$this->pseudo = $pseudo;
  		}
  	}
  	public function setPass($pass)
  	{
  		if(is_string($pass)) {
  			$this->pass = $pass;
  		}
  	}
  	public function setIp($ip)
  	{
  		if(is_string($ip)){
  			$this->ip = $ip;
  		}
  	}
  	public function setRegistration($registration)
  	{
  		if(is_string($registration)){
  			$this->registration = $registration;
  		}
  	}
  	public function setEmail($email)
  	{
  		$this->email = $email;
  	}
  	public function id()
    {
      	return $this->id;
    }
    public function pseudo()
    {
      	return $this->pseudo;
    }
    public function pass()
    {
      	return $this->pass;
    }
    public function email()
    {
      	return $this->email;
    }
    public function ip()
    {
    	return $this->ip;
    }
    public function registration()
    {
    	return $this->registration;
    }
}