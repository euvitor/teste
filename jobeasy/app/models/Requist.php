<?php
class Requist extends Model{
        static $belongs_to = array(
            array('user'),
            array('curriculo'),
            array('vaga'),
            array('empresa')
	);
    }