<?php
class Cidade extends Model{
        static $belongs_to = array(
            array('estado')
	);
        static $has_many = array(
            array('vagas'),
            array('enderecos'),
	);
    }