<?php
	class HomeController extends Controller{
		public function __construct(){
			parent::__construct();
			Auth::redirectCheck();
		}
		public function indexAction(){
			$this->view('Home');
		}
	}