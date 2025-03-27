<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Criptografia de senha
 * @param   type $password - Recebe a senha a ser criptografada
 * @return  type string
 */
function encryptPassword( $password ){
  return sha1( md5( md5( $password ) . './];9-_SXbPKJ#hI;>5|CS#<2{T|^Olt;EmuN=u:C8M#-Fe-Srs|uA&(U|!xr?ET+sE&@,ggGcM' ) );
}


/**
 * Gera senha aleatória
 * @param   integer $size - Define o tamanho da senha a ser gerada
 * @return  string
 */
function generatePassword( $size = 10 ){
  $chars    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&%$#@!=+?-*()[]{}_';
  $maxSize  = strlen( $chars ) - 1;
  $password = '';

  for( $i = 0; $i < $size; $i++ ){
    $position  = mt_rand( 0, $maxSize );
    $password .= $chars[$position];
  }
  return $password;
}