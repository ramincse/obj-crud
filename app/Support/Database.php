<?php 
	namespace App\Support;
	use mysqli;
	
	/**
	 * Database Management
	 */
	abstract class Database
	{
		/**
		 * Server related property
		 */
		private $host 	= 'localhost';
		private $user 	= 'root';
		private $pass 	= '';
		private $db 	= 'obj';

		private $connection;

		/**
		 * Database Connection Setup
		 */
		private function connection(){
			return $this -> connection -> new mysqli($this -> host, $this -> user, $this -> pass, $this -> db);
		}
	}










 ?>