<?php

	require_once("libs/Database.php") ;

	/**
	 * This class describes a serie genero.
	 */
	class SerieGenero{

		private $idGen = null;
		private $idSer = null;

		/**
		 * Inserta en la base de datos.
		 *
		 * @param      integer  $idSer  El identificador de la serie
		 * @param      integer  $idGen  El identificador del género
		 */
		public static function insert(int $idSer, int $idGen){

			$db = new Database() ;
			$db->query("INSERT INTO pertenece (idSer, idGen) VALUES ($idSer, $idGen) ;") ;
		}

		/**
		 * Deletes the object.
		 */
		public function delete(){

			$db = new Database() ;
			$db->query("DELETE FROM pertenece WHERE idGen = {$this->idGen} AND idSer = {$this->idSer} ; ") ;
		}



}