<?php
class Contato extends Model{
        static $belongs_to = array(
            array('pessoa'),
            array('empresa')
	);
    }