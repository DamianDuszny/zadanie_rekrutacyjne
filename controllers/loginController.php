<?php
class loginController
{
	private $db, $data;
	public function __construct($db, $data)
	{
		$this->db = $db;
		$this->data = $data;
	}
	public function Auth()
	{
		$query = "select login, password, uprawnienia from users where login = :login and password = :password;";
		$this->data["password"] = sha1($this->data["password"]);
		$params = array(
			":login"	=>	$this->data["login"], 
			":password" => 	$this->data["password"]
		);

		$this->result = $this->db->sqlQuery($query, $params);
		if(!$this->result)
		{
			throw new Exception("Błędny login lub hasło");
		}
		$this->SetSession();
		return true;
	}
	public function SetSession()
	{
		$_SESSION["user"] = $this->login;
	}
}
?>