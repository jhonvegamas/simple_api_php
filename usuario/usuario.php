<?php

require '../Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $retorno = Usuario::verUsuario($id);

        if ($retorno) {
            $data["estado"]  = "1";
            $data["persona"] = $retorno;
            print json_encode($data, JSON_UNESCAPED_UNICODE);
        } else {
            print json_encode(
                array(
                    'estado'  => '2',
                    'mensaje' => 'Esta persona no existe',
                )
                , JSON_UNESCAPED_UNICODE);
        }
    } else {
        print json_encode(
            array(
                'estado'  => '3',
                'mensaje' => 'Se necesita un identificador',
            )
            , JSON_UNESCAPED_UNICODE);
    }
}