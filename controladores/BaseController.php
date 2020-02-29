<?php

require_once "vendor/autoload.php" ;

	class BaseController
	{
		protected $twig ;

		/**
		 * Constructs a new instance.
		 */
		public function __construct()
		{
			$loader = new \Twig\Loader\FilesystemLoader("./vistas") ;
			$this->twig = new \Twig\Environment($loader) ;
		}
	}