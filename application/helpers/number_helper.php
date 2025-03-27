<?php defined('BASEPATH') OR exit('No direct script access allowed');


function toCurrency($num){
	return 'R$ ' . number_format( (float) $num, 2, '.', '.');
}