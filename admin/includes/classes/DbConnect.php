<?php

class DbConnect
{
   /* private $conn;

    function __construct() {
    }*/
    /**
     * Establishing database connection
     * @return database connection handler
     */
   /* function connect()
    {
        include_once $_SERVER['DOCUMENT_ROOT']."/fyp_new/instructor/includes/global.php";
		//include_once $_SERVER['DOCUMENT_ROOT']."/fyp_new/includes/config.php";
        // Connecting to mysql database
        $this->con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

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
}
