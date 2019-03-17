<?php

require '../Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $body = json_decode(file_get_contents("php://input"), true);   
    $retorno = Usuario::registrar(
        $body['nombre']        
    );

    if ($retorno) {
        print json_encode(
            array(
                'estado' => '1',
                'person' => 'Usuario registrado exitosamente')
            , JSON_UNESCAPED_UNICODE);
    } else {
        print json_encode(
            array(
                'estado'  => '2',
                'mensaje' => $retorno)
            , JSON_UNESCAPED_UNICODE);
    }

}
