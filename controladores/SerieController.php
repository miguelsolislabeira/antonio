<?php

	require_once("modelos/Serie.php") ;
	require_once("modelos/Genero.php") ;
	require_once("modelos/SerieGenero.php") ;
	require_once "BaseController.php" ;

	Class SerieController extends BaseController{

		/**
		 * Constructs a new instance.
		 */
		public function __construct(){

			parent::__construct();

		}


		/**
		 * { Guarda en una variables el resultado del método join del modelo y devuelve la vista showSeries }
		 */
		public function listar(){

			$series = Serie::join() ;

			echo $this->twig->render("showSeries.php.twig", ['series' => $series]) ;
		}

		/**
		 *Guarda en una variable el resultado del método findAll() del controlador.
		 * 1. Si no está seteado el campo título del formulario, devuelve la vista del propio formulario para rellenar
		 * 2. Si el género está seteado, su valor es 'otro' y el título está seteado guarda en una variable los campos del formulario y devuelve la vista addGenero junto con esos datos para mostrar el formulario relleno. También envía la variable "generos" para usar en el desplegable de la vista
		 * 3. Si no se cumple ninguna de las dos condiciones anteriores, crea una nueva serie, setea todos sus datos, la guarda en la bbdd y guarda su identificador en una variable
		 * 		3.2 Si el género está seteado (existe), guarda su id en una variable e inserta un nuevo registro en la tabla pertenece
		 * 		3.3 Si no lo está, crea una nueva instancia, la setea con el campo "nuevoGenero" llegado desde el campo input del
		 * 		formulario, lo guarda en la bbdd y almacena su id en una variable. Con este id y el de la serie, almacena un nuevo
		 * 		registro en la tabla pertenece de la bbdd
		 * 4. Se trae todas las series y muestra la vista showSeries
		 */
		public function anadir(){

			$generos = Genero::findAll() ;

			if(!isset($_GET['titulo'])){

				echo $this->twig->render("addSerie.php.twig", ['generos' => $generos]) ;


			}elseif((isset($_GET['genero']) && $_GET['genero']==='otro' ) && (isset($_GET[('titulo')]))){

				$datos = [

					'titulo' => $_GET['titulo'],
					'fecha' => $_GET['fecha'],
					'temporadas' => $_GET['temporadas'],
					'puntuacion' => $_GET['puntuacion'],
					'plataforma' => $_GET['plataforma']?? "",
					'argumento' => $_GET['argumento']
				];

				echo $this->twig->render("addGenero.php.twig", ['datos' => $datos, 'generos' => $generos]) ;

			}else{
					$serie = new Serie();

					$serie->setTitulo($_GET['titulo']) ;
					$serie->setFecha($_GET['fecha'] ) ;
					$serie->setTemporadas($_GET['temporadas']) ;
					$serie->setPuntuacion($_GET['puntuacion'] ) ;
					$serie->setPlataforma($_GET['plataforma'] );
					$serie->setArgumento($_GET['argumento'] );

					$idSer = $serie->save() ;

					if(isset($_GET['genero'])){

						$idGen = $_GET['genero'] ;
						SerieGenero::insert($idSer, $idGen) ;

					}else{
						$genero = new Genero() ;
						$genero->setGenero($_GET['nuevo_Genero']) ;
						$idGen = $genero->save() ;

						SerieGenero::insert($idSer, $idGen) ;
					};

						$series = Serie::join() ;

						echo $this->twig->render("showSeries.php.twig", ['series' => $series]) ;
			};
		}

		/**
		 * Almacena en una variable la serie traída de la bbdd a través del método estático find($id);
		 * Boora la serie
		 * Almacena en una variable las series que quedan y devuelve la vista showSeries
		 */
		public function borrar(){

			$serie = Serie::find($_GET['id']) ;
			$serie->delete() ;

			$series = Serie::join() ;
			echo $this->twig->render("showSeries.php.twig", ['series' => $series]) ;
		}

}