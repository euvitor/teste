<?php 
    class CadastroController extends Controller{
        public function indexAction(){
            $this->view('CadastroPessoa','',true,'Generic','',array(
            	CSS.'animate.css'
            ));
        }
        public function PessoaAction($msg =''){
        	if($msg != ""){$data['message']=$msg;}else{$data = "";}
        	$this->view('CadastroPessoa',$data,true,'Generic');
        }
        public function EmpresaAction($msg =''){
        	if($msg != ""){$data['message']=$msg;}else{$data = "";}
        	$this->view('CadastroEmpresa',$data,true,'Generic');
        }
        public function CadEmpresaAction(){
        	$validetor = new Validator($_REQUEST);
        	$validetor->field_filledIn($_REQUEST);
        	$validetor->field_username('user');
        	$validetor->field_numeric('cnpj');
        	$validetor->field_numeric('numero');
        	$validetor->field_numeric('telefone');
        	$validetor->field_numeric('celular');
        	$validetor->field_numeric('cep');
        	$validetor->field_email("email");
        	if($validetor->valid){
        		$user['username'] = DataHelper::tratar($_REQUEST['user'],'sl');
        		$credencial = Tools::hashHX($_REQUEST['senha']);
        		$user['password'] = $credencial['password'];
        		$user['salt'] = $credencial['salt'];
        		$user['role'] = "empresa";
        		$user['status'] = 1;
        		$user['full_name'] = $_REQUEST['nome'];
        		if(User::create($user)){
        			$endereco['rua'] = $_REQUEST['rua'];
        			$endereco['cep'] = $_REQUEST['cep'];
        			$endereco['setor'] = $_REQUEST['setor'];
        			$endereco['numero'] = $_REQUEST['numero'];
        			$endereco['cidades_id'] = Cidade::find_by_nome($_REQUEST['cidade'])->id;
        			if(Endereco::create($endereco)){
        				$contato['email'] = $_REQUEST['email'];
        				$contato['celular'] = $_REQUEST['celular'];
        				$contato['telefone'] = $_REQUEST['telefone'];
        				if(Contato::create($contato)){
        					$empresa['nome'] = $_REQUEST['nome'];
        					$empresa['cnpj'] = $_REQUEST['cnpj'];
        					$empresa['ramo_atividade'] = $_REQUEST['ramo'];
        					$empresa['user_id'] = User::last()->id;
        					$empresa['enderecos_id'] = Endereco::last()->id;
        					$empresa['contatos_id'] = Contato::last()->id;
        					if(Empresa::create($empresa)){
        						header('location:'.SITE."/login");
        					}else{
	        					$user = User::last();
	        					$user->delet();
	        					$endere = Endereco::last();
	        					$endere->delet();
	        					$cont = Contato::last();
	        					$cont->delet();
	        					$this->PessoaAction(array('danger','Ops, infelizmente ocorreram alguns erro','Por favor verifique seus dados, caso esteja tudo ok entre em contato com um adminstrador!'));
        					}
        				}else{
        					$user = User::last();
        					$user->delet();
        					$endere = Endereco::last();
        					$endere->delet();
        					$this->PessoaAction(array('danger','Ops, infelizmente ocorreram alguns erro','Por favor verifique seus dados, caso esteja tudo ok entre em contato com um adminstrador!'));
        				}
        			}else{
        				$delet = User::last();
        				$delet->delet();
        				$this->PessoaAction(array('danger','Ops, infelizmente ocorreram alguns erro','Por favor verifique seus dados, caso esteja tudo ok entre em contato com um adminstrador!'));
        			}
        		}else{
        			$this->PessoaAction(array('danger','Ops, infelizmente ocorreram alguns erro','Por favor verifique seus dados, caso esteja tudo ok entre em contato com um adminstrador!'));
        		}
        	}else{
        		$this->PessoaAction($validetor->getErrors());
        	}
	}
        public function CadPessoaAction(){
        	$validetor = new Validator($_REQUEST);
        	$validetor->field_filledIn($_REQUEST);
        	$validetor->field_username('login');
        	$validetor->field_numeric('rg');
        	$validetor->field_numeric('numero');
        	$validetor->field_numeric('telefone');
        	$validetor->field_numeric('celular');
        	$validetor->field_numeric('cep');
        	$validetor->field_email("email");
        	if($validetor->valid){
        		$user['username'] = DataHelper::tratar($_REQUEST['login'],'sl');
        		$credencial = Tools::hashHX($_REQUEST['senha']);
        		$user['password'] = $credencial['password'];
        		$user['salt'] = $credencial['salt'];
        		$user['role'] = "pessoa";
        		$user['status'] = 1;
        		$user['full_name'] = $_REQUEST['full_name'];
        		if(User::create($user)){
        			$endereco['rua'] = $_REQUEST['rua'];
        			$endereco['cep'] = $_REQUEST['cep'];
        			$endereco['setor'] = $_REQUEST['setor'];
        			$endereco['numero'] = $_REQUEST['numero'];
        			$endereco['cidades_id'] = Cidade::find_by_nome($_REQUEST['cidade'])->id;
        			if(Endereco::create($endereco)){
        				$contato['email'] = $_REQUEST['email'];
        				$contato['celular'] = $_REQUEST['celular'];
        				$contato['telefone'] = $_REQUEST['telefone'];
        				if(Contato::create($contato)){
        					$pessoa['full_name'] = $_REQUEST['full_name'];
        					$pessoa['rg'] = $_REQUEST['rg'];
        					$pessoa['cpf'] = $_REQUEST['cpf'];
        					$pessoa['ramo_atividade'] = $_REQUEST['ramo-de-atividade'];
        					$pessoa['user_id'] = User::last()->id;
        					$pessoa['enderecos_id'] = Endereco::last()->id;
        					$pessoa['contatos_id'] = Contato::last()->id;
        					$pessoa['full_name'] = $_REQUEST['full_name'];
        					if(Pessoa::create($pessoa)){
        						header('location:'.SITE."/login");
        					}else{
	        					$user = User::last();
	        					$user->delet();
	        					$endere = Endereco::last();
	        					$endere->delet();
	        					$cont = Contato::last();
	        					$cont->delet();
	        					$this->PessoaAction(array('danger','Ops, infelizmente ocorreram alguns erro','Por favor verifique seus dados, caso esteja tudo ok entre em contato com um adminstrador!'));
        					}
        				}else{
        					$user = User::last();
        					$user->delet();
        					$endere = Endereco::last();
        					$endere->delet();
        					$this->PessoaAction(array('danger','Ops, infelizmente ocorreram alguns erro','Por favor verifique seus dados, caso esteja tudo ok entre em contato com um adminstrador!'));
        				}
        			}else{
        				$delet = User::last();
        				$delet->delet();
        				$this->PessoaAction(array('danger','Ops, infelizmente ocorreram alguns erro','Por favor verifique seus dados, caso esteja tudo ok entre em contato com um adminstrador!'));
        			}
        		}else{
        			$this->PessoaAction(array('danger','Ops, infelizmente ocorreram alguns erro','Por favor verifique seus dados, caso esteja tudo ok entre em contato com um adminstrador!'));
        		}
        	}else{
        		$this->PessoaAction($validetor->getErrors());
        	}
	}#fecha a function
    }#fecha a class