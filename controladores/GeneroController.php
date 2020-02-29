<?php


	require_once("modelos/Genero.php");
	require_once("modelos/Serie.php") ;
	require_once ("BaseController.php") ;

	Class GeneroController extends BaseController{

		public function __construct(){

			parent::__construct();

		}

		/**
		 * { Guarda en una variable el return del método findAll() del controlador y devuelve la vista showGeneros }
		 */

		public function listar(){

			$gen = Genero::findAll() ;

			echo $this->twig->render("showGeneros.php.twig", ['gen' => $gen]) ;
		}

		/**
		 * Crea un nuevo género y lo guarda en la BBDD
		 */
		public static function insertar(){

			$gen = new Genero() ;
			$gen->setGenero($_GET['nuevoGenero']) ;
			$gen->save() ;
		}


		/**
		 * Guarda en una variable el género asociado al id que viene por url y devuelve la vista editGenero
		 */
		public function editar() {
			$gen = Genero::find($_GET['id']) ;

			echo $this->twig->render("editGenero.php.twig", ['gene' => $gen]) ;
		}

		/**
		 *  it calls database function "save" and updates a data registry. It returns the specified view
		 */
		public function actualizar(){

			$gen = Genero::find($_GET['id']) ;
			$gen->setGenero($_GET['gen']) ;
			$gen->save();

			$series = Serie::findAll() ;

			echo $this->twig->render("showSeries.php.twig", ['series' => $series]) ;
		}

		/**
		 * It finds a specified database registry and calls the delete method
		 */
		public function borrar(){

			$genero = Genero::find($_GET['id']) ;
			$genero->delete() ;

			$gen = Genero::findAll() ;
			echo $this->twig->render("showGeneros.php.twig", ['gen' => $gen]) ;
		}

	}

