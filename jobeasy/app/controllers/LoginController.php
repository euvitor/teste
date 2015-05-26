<?php 
    class LoginController extends Controller{
    	public function __construct(){
    		parent::__construct();
    		Auth::redirectCheck(true);
    	}
        public function indexAction(){
            $this->view('Login','',true,'Generic','',array(CSS.'animate.css'));
        }
        public function logarAction(){
    		$data=array();
    		//Validação
    		$validator=new Validator($_REQUEST);
    		$validator->field_filledIn();
            $validator->field_username('username');

    		if(!$validator->valid){
    			$data["message"]=$validator->getErrors();
    		}else{
    			//Tratamento
    			$super_global=DataHelper::tratamento($_REQUEST,INPUT_POST);

    			//Autenticação
    			$auth=new Auth;
    			$auth->login($super_global["username"],$super_global["password"]);
    			if($auth->check()){
    				$this->redirectTo(SITE."home");
    			}else{
    				$data["message"]=$auth->getErrors();
    			}
    		}
    		$this->view('Login',$data,true,'Generic');
        }
        public function sairAction(){
        	Auth::logout();
        }
    }