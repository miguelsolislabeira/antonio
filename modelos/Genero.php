<?php

require_once("libs/Database.php") ;

	Class Genero{
        /**
         * primary key
         * @var int
         */
		private $idGen ;
		private $genero ;

    /**
     * @return mixed
     */
        public function getIdGen(){

            return $this->idGen;
        }


        /**
         * @return mixed
         */
        public function getGenero(){

            return $this->genero;
        }

        /**
         * @param mixed $nombre
         *
         * @return self
         */
        public function setGenero(string $genero){

            $this->genero = $genero;

            return $this;
        }

        public static function findAll(){

        	$db = new Database () ;

        	$db->query("SELECT * FROM genero ;") ;

        	$genero = [] ;

        	while($obj = $db->getObject("Genero")){

        		array_push($genero, $obj);
        	}

        	return $genero ;
        }




        public static function find($id){

        	$db = new Database() ;

        	$db->query("SELECT * FROM genero WHERE idGen = $id ; ") ;

        	return $db->getObject("Genero") ;
    	}

        public function save(){

            $db = new Database() ;

            if(isset($_GET['id'])):

            $db->query("UPDATE genero set genero = '{$this->genero}' WHERE idGen = {$this->idGen} ;" ) ;

            return $this ;

            else:
                $db->query("INSERT INTO genero (genero) VALUES ('{$this->genero}'); ") ;

                return $db->lastId();
            endif ;
        }

        public function delete(){

            $db = new Database() ;

            $db->query("DELETE FROM genero WHERE idGen = {$this->idGen} ;");

        }
}
