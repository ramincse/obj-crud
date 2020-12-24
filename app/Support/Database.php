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

		/**
		 * File Upload Management
		 */
		protected function fileUpload($file, $location = '', array $file_format = ['jpg', 'jpeg', 'png', 'gif'], $file_type = null)
		{
			//File Info
			$file_name 	= $file['name'];
			$file_tmp 	= $file['tmp_name'];
			$file_size 	= $file['size'];

			//File Extension
			$file_array = explode('.', $file_name);
			$file_extension = strtolower(end($file_array));

			//File Default Value
			if ( !isset( $file_type['type'] ) ) {
				$file_type['type'] = 'image';
			}

			//File Default Value
			if ( !isset( $file_type['file_name'] ) ) {
				$file_type['file_name'] = '';
			}
			if ( !isset( $file_type['fname'] ) ) {
				$file_type['fname'] = '';
			}
			if ( !isset( $file_type['lname'] ) ) {
				$file_type['lname'] = '';
			}

			//File name with type
			if ( $file_type['type'] == 'image' ) {
				//File Unique Name
				$unique_file_name = md5( time() . rand() ) . '.' . $file_extension;
			}elseif( $file_type['type'] == 'file' ){
				$unique_file_name = date('d_m_Y_g_h_s') . '_' . $file_type['file_name'] . '_' . $file_type['fname'] . '_' . $file_type['lname'] . '.' . $file_extension;
			}

			//Check File Format
			$mess = '';
			if ( in_array($file_extension, $file_format) == false ) {
				$mess = '<p class="alert alert-danger">Invalid file format ! <button class="close" data-dismiss="alert">&times;</button></p>';
			}else{
				//File Upload to Directory
				move_uploaded_file( $file_tmp, $location . $unique_file_name );
			}

			// Return Fila name and Message
			return [
				'mess' 		=> $mess,
				'file_name' => $unique_file_name,
			];


		}

		/**
		 * Data Insert to students table
		 */
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

		/**
		 * Get all value
		 */
		protected function all($table, $order_by)
		{
			//Data get from student table
			$sql = "SELECT * FROM $table ORDER BY id $order_by ";
			$data = $this -> connection() -> query($sql);

			if ( $data ) {
				return $data;
			}
		}
	} //End of abstract class Database










 ?>