<?php
	class User extends Model{

		/**
		 * Configuração para a associação entre tabelas
		 * @var array
		 */
		static $belongs_to = array(
			array('cidade')
		);

		/**
		 * Configuração para a associação entre tabelas
		 * @var array
		 */
		static $has_many = array(
		 	array('pessoas'),
            array('empresas'),
            array('requists'),
		 	array('login_attempts'),
			array('lost_passwords')
		);

		/**
		 * Método responsável por retornar um array com as IDs e nomes dos usuários
		 * @return array Array tratado para o PFBC
		 */
		public static function getOptions(){
			$users=self::all();
			$options=array(
				''=>'Selecione...'
			);
			foreach ($users as $user) {
				$options[$user->id]=$user->full_name;
			}
			return $options;
		}
	}