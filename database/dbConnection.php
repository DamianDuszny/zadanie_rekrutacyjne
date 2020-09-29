<?php
class dbConnection
{
private $dbConnection, $dsn;
public function __construct($config)
{
		$this->config = $config;
}
private function createSqlConnection()
{
		$this->dsn = "mysql:dbname=".$this->config["db"].";host=".$this->config["host"]."; charset=UTF8";
		$this->dbConnection = new PDO($this->dsn, $this->config["user"], $this->config["passwd"]);
		$this->dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
public function sqlQuery($query, $params)
{
		try
		{
		$this->createSqlConnection();
		}
		catch(PDOException $e)
		{
			throw new Exception("Nie udalo sie nawiazac polaczenia z bazą danych");
		}
		$sth = $this->dbConnection->prepare($query);
		if(!$sth->execute($params))
			return false;
		$this->result = $sth->fetchAll();
		return $this->result;		
}
}
?>