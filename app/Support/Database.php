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
			return $this -> connection = new mysqli($this -> host, $this -> user, $this -> pass, $this -> db);
		}

		protected function insert($table, array $data)
		{
			
			//Make SQL Column from data
			$array_key = array_keys($data);
			$array_col = implode(',', $array_key);

			//Make SQL Values from data
			$array_val 		= array_values($data);
			foreach ($array_val as $value) {
				$form_value[] = "'" . $value . "'";
			}
			$array_values 	= implode(',', $form_value);

			// echo "<pre>";
			// print_r($array_values);
			// echo "</pre>";

			//Data sent to student table
			$sql = "INSERT INTO $table ($array_col) VALUES ($array_values) ";
			$query = $this -> connection() -> query($sql);

			if ( $query ) {
				return true;
			}
		}
	}










 ?>