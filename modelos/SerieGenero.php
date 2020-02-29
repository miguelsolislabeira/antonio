<?php

	require_once("libs/Database.php") ;

	class SerieGenero{

		private $idGen = null;
		private $idSer = null;

		public static function insert($idSer, $idGen){

			$db = new Database() ;
			$db->query("INSERT INTO pertenece (idSer, idGen) VALUES ($idSer, $idGen) ;") ;
		}

		public function delete(){

			$db = new Database() ;
			$db->query("DELETE FROM pertenece WHERE idGen = {$this->idGen} AND idSer = {$this->idSer} ; ") ;
		}



}