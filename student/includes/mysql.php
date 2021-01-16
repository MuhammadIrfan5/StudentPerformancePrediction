<?php
include_once "config.php";
class mysql_functions
{		
	
	/*function connect()
    {
        include_once $_SERVER['DOCUMENT_ROOT']."/fyp_new/instructor/includes/global.php";
		//include_once $_SERVER['DOCUMENT_ROOT']."/fyp_new/includes/config.php";
        // Connecting to mysql database
        $this->con = new mysqli(host, username, password, db_name);

        // Check for database connection error
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
			echo "<script>alert('Fails');</script>";
        }
		else
		{
			//echo "<script>alert('sucsess');</script>";
		}
        // returing connection resource
        return $this->con;
    }*/

	function connect()
	{
		$con = mysqli_connect(DB_HOST,DB_USERNAME, DB_PASSWORD, DB_NAME);
		if($con)
			return $con;
		else
			return null;
	}
	
	/* 
		QR = Execute sql query retuen true or false
		taking one parameter of your sql query
	*/
	function query($query) 
	{
		$con = $this->connect();
		return mysqli_query($con,$query);
	}
	
	/* 
		NR = mysqli_num_rows return number of rows
		taking one parameter of your sql query
	*/
	function nr($query) 
	{
		return mysqli_num_rows($query);
	}
	
	/* 
		FA = mysqli_fetch_assoc return associate array of your query
		taking one parameter of your sql query
	*/
	function fa($query)
	{
		return mysqli_fetch_assoc($query);
	}
		
		/*
	get_last_id = Execute sql query retuen the last
	insert id
	*/
	function get_last_id($query)
	{
		$con = $this->connect();
		if(mysqli_query($con,$query))
		return mysqli_insert_id($con);
	}
}

?>