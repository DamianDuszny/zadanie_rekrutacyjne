<?php
class RegisterUser
{
	private $login, $name, $lastName, $password,$sex, $password2, $db;
	private $result;
	public function __construct(dbConnection $db, $address)
	{
		$this->db = $db;
		foreach($_POST as $key => $result)
		{
			$_POST[$key] = htmlspecialchars($result);
		}
		if(isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["password2"]) && isset($_POST["name"]) && isset($_POST["lastName"]) && isset($_POST["sex"]))
		{
		$this->login = $_POST["login"];
		$this->name = $_POST["name"];
		$this->lastName = $_POST["lastName"];
		$this->password = $_POST["password"];
		$this->password2 = $_POST["password2"];
		$this->sex = $_POST["sex"];
		}
	}
	public function checkAvailability()
	{
		/*
		check login availability in db
		*/
		$query = "select login from users where login = :login"; 
		$params = array(":login"=>$_POST["login"]);
		$this->result = $this->db->sqlQuery($query, $params);
		if($this->result)
			throw new Exception("Login jest zajęty");
	}
	public function checkLoginLength()
	{
		if(strlen($this->login))<5)
			throw new Exception("Za krótki login!")
		
	}
	public function checkPasswordLength()
	{
		if(strlen($this->password)<7)
			throw new Exception("Za krótkie hasło!")
	}
	public function registerUser()
	{
		/*
		register the user
		*/
		if(!$this->login)
		{
			echo "brak danych";
			return 0;
		}
		$this->password = sha1($this->password);
		$query = "insert into users (`login`, `password`, `name`, `last_name`, `sex`) values (:login, :password, :name, :last_name, :sex)"; 
		$params = array(
			":login"	=>	$this->login, 
			":password"	=>	$this->password, 
			":name"	=>	$this->name,
			":last_name"=>$this->lastName,
			":sex"=>$this->sex
		);

		
		if($this->db->sqlQuery($query, $params))
			throw new Exception("Coś poszło nie tak podczas rejestracji...");
		else{
			header: ("location:".$address."login");
			return "Rejestracja przebiegła pomyślnie.";
		}
		
	}
}
?>
