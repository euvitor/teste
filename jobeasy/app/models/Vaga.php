<?php
class Vaga extends Model{
        static $belongs_to = array(
            array('empresa'),
            array('cidade')
	);
        static $has_many = array(
            array('requists')
	);
    }