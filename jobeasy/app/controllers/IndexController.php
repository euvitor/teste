<?php 
    class IndexController extends Controller{
        public function indexAction(){
            $this->view('Index','',true,'Generic','',array(
            	CSS.'animate.css'
            ));
        }
    }