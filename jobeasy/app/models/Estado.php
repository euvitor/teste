<?php
class Estado extends Model{
        static $has_many = array(
            array('cidades')
	);
    }