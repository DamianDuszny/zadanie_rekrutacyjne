<?php
class Login
{
	private $db, $data, $result;
	public function __construct(dbConnection $db, $data)
	{
		$this->db = $db;
		$this->data = $data;
	}
	public function Auth()
	{
		$query = "select login, password from users where login = :login and password = :password;";
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
		$query = "select name, last_name, sex from users where login = :login;";
		$params = array(
			":login"	=>	$this->data["login"]
		);
		$this->result = $this->db->sqlQuery($query, $params);
		$_SESSION["user"] = $this->data["login"];
		$_SESSION["name"] = $this->result[0]["name"];
		$_SESSION["last_name"] = $this->result[0]["last_name"];
		$_SESSION["sex"] = $this->result[0]["sex"];
	}
}
?>