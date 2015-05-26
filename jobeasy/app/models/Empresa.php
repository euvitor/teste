<?php
class Empresa extends Model{
        static $belongs_to = array(
            array('user'),
            array('endereco'),
            array('contato')
	);
        static $has_many = array(
            array('vagas'),
            array('requists'),
	);
    }