<?php
class Curriculo extends Model{
        static $belongs_to = array(
            array('pessoa'),
            array('requist')
	);
    }