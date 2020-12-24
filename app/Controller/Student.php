<?php 
	namespace App\Controller;
	use App\Support\Database;
	/**
	 * Student Management
	 */
	class Student extends Database
	{
		/**
		 * Add New Student
		 */
		public function addNewStudent($name, $email, $cell, $img)
		{
			$data = $this -> insert('students', [
				'name' 	=> $name,
				'email' => $email,
				'cell' 	=> $cell,				 	 	
			]);

			if ( $data ) {
				return '<p class="alert alert-success">Student added successfull ! <button class="close" data-dismiss="alert">&times;</button></p>';
			}
		}
	}










 ?>