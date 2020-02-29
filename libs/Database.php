<?php
require_once "Data.php" ;

	class Database
	{
		private $pdo ;
		private $res ;

		/**
		 * Constructs a new instance.
		 */
		public function __construct()
		{
			global $data ;
			$this->pdo = new PDO("mysql:host=".$data["host"].";dbname=".$data["dbno"].";charset=utf8",$data["user"],$data["pass"])
						 or die("Error de conexión con la base de datos.") ;
		}


		/**
		 * Destroys the object.
		 */
		public function __destruct()
		{
			$this->pdo = null ;
		}


		/**
		 * { make a query to the database }
		 *
		 * @param      <type>  $sql    The sql
		 */
		public function query($sql)
		{
			$this->res = $this->pdo->query($sql) ;
		}


		/**
		 * Gets the object.
		 *
		 * @param      string  $cls    The cls
		 *
		 * @return     <type>  The object with specified class
		 */
		public function getObject($cls = "StdClass")
		{
			return $this->res->fetchObject($cls) ;
		}


		/**
		 * Obtiene el último id insertado en la base de datos
		 *
		 * @return     int
		 */
		public function lastId()
		{
			return $this->pdo->lastInsertId() ;
		}

	}