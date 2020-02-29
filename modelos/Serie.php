<?php

require_once("libs/Database.php") ;
require_once("modelos/Genero.php") ;

Class Serie{

	private $idSer ;
	private $titulo;
	private $fecha;
	private $temporadas;
	private $puntuacion;
	private $plataforma;
	private $argumento;
    private $genero;

    /**
     * @return mixed
     */
    public function getIdSer()
    {
        return $this->idSer;
    }


    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     *
     * @return self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fec_Est
     *
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemporadas()
    {
        return $this->temporadas;
    }

    /**
     * @param mixed $temporadas
     *
     * @return self
     */
    public function setTemporadas($temporadas)
    {
        $this->temporadas = $temporadas;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * @param mixed $puntuacion
     *
     * @return self
     */
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlataforma()
    {
        return $this->plataforma;
    }

    /**
     * @param mixed $plataforma
     *
     * @return self
     */
    public function setPlataforma($plataforma)
    {
        $this->plataforma = $plataforma;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArgumento()
    {
        return $this->argumento;
    }

    /**
     * @param mixed $argumento
     *
     * @return self
     */
    public function setArgumento($argumento)
    {
        $this->argumento = $argumento;

        return $this;
    }

    /**
     * Gets the genero.
     *
     * @return     <type>  The genero.
     */
    public function getGenero(){

        return $this->genero;
    }

    /**
     * Sets the genero.
     *
     * @return     self  (devuelve el objeto actualizado )
     */
    public function setGenero(){

        $this->genero = $genero;

        return $this;
    }

    /**
     * Guarda en un array todos los registros de la tabla serie de la bbdd y los guarda como objetos en un array
     *
     * @return     array  ( description_of_the_return_value )
     */
    /*public static function findAll(){

    	$db = new Database () ;

    	$db->query("SELECT * FROM serie ;") ;

    	$serie = [] ;

    	while($obj = $db->getObject("Serie")){

    		array_push($serie, $obj);
    	}

    	return $serie ;
    }*/

    /**
     * Searches for the first match.
     *
     * @param      <type>  $id     The identifier
     *
     * @return     <type>  ( Devuelve un objeto de la clase "Serie" )
     */
    public static function find($id){

    	$db = new Database() ;

    	$db->query("SELECT * FROM serie WHERE idSer = $id ; ") ;

    	return $db->getObject("Serie") ;

    }

    /**
     * { inserta un registro en la base de datos }
     *
     * @return     <type>  ( devuelve la última clave primaria insertada en la base de datos )
     */
    public function save(){

    	$db = new Database ;

    	$db->query("INSERT INTO serie (titulo, fecha, temporadas, puntuacion, plataforma, argumento) VALUES ('{$this->titulo}', '{$this->fecha}', {$this->temporadas}, {$this->puntuacion}, '{$this->plataforma}', '{$this->argumento}') ;") ;


        return $db->lastId() ;

    }

    /**
     * Deletes the object.
     */
    public function delete(){

    	$db = new Database() ;

    	$db->query("DELETE FROM serie WHERE idSer = {$this->idSer} ;");

    }

    /**
     * Hace una consulta en la base de datos usando dos joins. Almacena, además de los campos de la tabla serie, el campo "genero" de esa tabla
     *
     * @return     array  ( Array de objetos "Serie" con la propiedad "género" )
     *
     * NOTA -> Al actualizar un género y redirigirnos a showSeries no se muestran los géneros. Hay que pinchar de nuevo en el enlace "mis series". Si usamos el método findAll() comentado arriba sí se muestran los géneros tras una modificación
     */
    public static function join() {

        $db = new Database() ;
        $db->query("SELECT * from serie s join pertenece p on (s.idSer=p.idSer) join genero g on (p.idGen=g.idGen) ;" ) ;

        $serieGenero = [] ;

        while($obj = $db->getObject("Serie")):

            array_push($serieGenero, $obj);

        endwhile;

        return $serieGenero;

        }

}