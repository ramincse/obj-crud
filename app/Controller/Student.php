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
			//Photo Upload Management
			$photo_info = $this -> fileUpload( $img, 'media/img/students/' );
			$photo_name = $photo_info['file_name'];

			if ( !empty($photo_info['mess']) ) {
				$mess = $photo_info['mess'];
			}else{
				$data = $this -> insert('students', [
					'name' 	=> $name,
					'email' => $email,
					'cell' 	=> $cell,				 	 	
					'photo' => $photo_name,				 	 	
				]);

				if ( $data ) {
					return '<p class="alert alert-success">Student added successfull ! <button class="close" data-dismiss="alert">&times;</button></p>';
				}

			}




			
		}
	}










 ?>