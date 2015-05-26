<?php
    class Endereco extends Model{
        static $belongs_to = array(
            array('cidade'),
            array('pessoa'),
            array('empresa')
	);
    }