<?php

Class Database{
	public $host   = DB_HOST;
	public $user   = DB_USER;
	public $pass   = DB_PASS;
	public $dbname = DB_NAME;
	public $link;
	public $error;

	public function __construct(){
		$this->connectDB();
	}
	private function connectDB(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, 
			$this->dbname);
		if(!$this->link){
			$this->error ="Connection fail".$this->link->connect_error;
			echo "connection is faill";
			return false;
		}
	}

	public function insert($query){
		$insert_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($insert_row){

			return true;
			return $insert_row;
		} else {
			return false;
		}
	}





	public function Retrive($retrivequery){
		$result = $this->link->query($retrivequery) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}
	public function select($query){
		$result = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}

	public function update_registation($query){
		$update_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($update_row){
			header("Location:registation.php?msg=".urlencode('Update succefullay'));
			return $update_row;
		} else {
			return false;
		}
	}
	public function del_registation($query){
		$update_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($update_row){
			header("Location:registation.php?msg=".urlencode('Delete succefullay'));
			return $update_row;
		} else {
			return false;
		}
	}
	public function update_event($query){
		$update_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($update_row){
			header("Location:addevent.php?msg=".urlencode('Update succefullay'));
			return $update_row;
		} else {
			return false;
		}
	}
	public function del_event($query){
		$update_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($update_row){
			header("Location:addevent.php?msg=".urlencode('Delete succefullay'));
			return $update_row;
		} else {
			return false;
		}
	}
	
	public function delete_registation($query){
		$delete_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($delete_row){
			header("Location:contactinfo.php?msg=".urlencode('Delete succefullay'));
			return $delete_row;

		} else {

			return false;
		}
	}
	
	public function update_order($query){
		$delete_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($delete_row){
			header("Location:orderinfo.php?msg=".urlencode('Update succefullay'));
			return $delete_row;

		} else {

			return false;
		}
	}
	public function delete_order($query){
		$delete_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($delete_row){
			header("Location:orderinfo.php?msg=".urlencode('Delete succefullay'));
			return $delete_row;

		} else {

			return false;
		}
	}

	//
	public function update_party($query){
		$delete_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($delete_row){
			header("Location:addpatry.php?msg=".urlencode('Update succefullay'));
			return $delete_row;

		} else {

			return false;
		}
	}
	public function delete_party($query){
		$delete_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($delete_row){
			header("Location:addpatry.php?msg=".urlencode('Delete succefullay'));
			return $delete_row;

		} else {

			return false;
		}
	}

	
	public function update_profile($query){
		$delete_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($delete_row){
	        return $delete_row;

		} else {

			return false;
		}
	}

	public function delete_announce($query){
		$delete_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($delete_row){
	        return $delete_row;

		} else {

			return false;
		}
	}


	

// this is the contact insert

	public function contact_insert($query){
		$insert_row = $this->link->query($query) or 
		die($this->link->error.__LINE__);
		if($insert_row){
	header("Location:contact.php?msg=".urlencode('Message Send succefullay'));//message add and show it main.php
	return $insert_row;
} else {

	return false;
}

}

}

?>

