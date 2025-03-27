<?php defined('BASEPATH') OR exit('No direct script access allowed');

function do_delete($file){
  $filedir = FCPATH . $file;
  unlink($filedir);
}

function max_size(){  
  $arr['size'][convertPHPSizeToBytes(ini_get('post_max_size'))] = ini_get('post_max_size');
  $arr['size'][convertPHPSizeToBytes(ini_get('upload_max_filesize'))] = ini_get('upload_max_filesize');
  $max = min(convertPHPSizeToBytes(ini_get('post_max_size')), convertPHPSizeToBytes(ini_get('upload_max_filesize')));  
  return $arr['size'][$max];
}  

function convertPHPSizeToBytes($sSize){
  $sSuffix = strtoupper(substr($sSize, -1));
  if (!in_array($sSuffix,array('P','T','G','M','K'))){
      return (int)$sSize;  
  } 
  $iValue = substr($sSize, 0, -1);
  switch ($sSuffix) {
    case 'P':
      $iValue *= 1024;
    case 'T':
      $iValue *= 1024;
    case 'G':
      $iValue *= 1024;
    case 'M':
      $iValue *= 1024;
    case 'K':
      $iValue *= 1024;
      break;
  }
  return (int) $iValue;
}  