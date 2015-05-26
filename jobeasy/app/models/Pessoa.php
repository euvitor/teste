<?php
    class Pessoa extends Model{
        static $belongs_to = array(
            array('endereco'),
            array('contato'),
            array('user')
	);
        static $has_many = array(
            array('curriculos')
	);
    }