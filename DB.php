<?php
//mysqli object oriented Approch
require __DIR__.'/dbconnect.php';

class DB{
	protected $DB;
	public function __construct(){
		global $conn;
		$this->DB=$conn;
	}
	public function getconnection(){
		return $this->DB;
	}
}
$db=new DB();
print_r($db->getconnection());
?>