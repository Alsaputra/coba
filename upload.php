<?php

function upload()
{
    $namaFoto = $_FILES[ 'uploadfoto' ][ 'name' ];
    $ukuranFoto = $_FILES[ 'uploadfoto' ][ 'size' ];
    $tmpFoto = $_FILES[ 'uploadfoto' ][ 'tmp_name' ];
// Validasi ekstensi file
$ekstensiValid = [ 'jpg' , 'jpeg' , 'png' , 'bmp' ];
$ekstensiFoto = explode( '.' , $namaFoto);
$ekstensiFoto = strtolower(end($ekstensiFoto));
if( !in_array($ekstensiFoto, $ekstensiValid)) {
    return false ;
    }
    // Batasan ukuran file
    if($ukuranFoto > 2000000 ) {
        return false ;
        }

        // Upload foto
        $destFile = __DIR__. '/foto-mhs/'. $namaFoto;
        move_uploaded_file($tmpFoto, $destFile);
        chmod($destFile, 0666 );

        return $namaFoto;    
}

?>