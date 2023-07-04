<?php

namespace Controllers;

use MVC\Router;
use Model\Cliente;

class ClientController{

    public static function index(Router $router)
    {
        $script = "";

        $router->render('clients/index', [
            'script' => $script
        ]);
    }

    public static function getClientData()
    {
        //Obtengo el valor de la cedula del parametro CE_RUCIC:
        $cedula = $_GET['CE_RUCIC'];

        //Validar y filtrar el valor de la cedula para evitar problemas de seguridad:
        $cedula = filter_var($cedula, FILTER_SANITIZE_STRING);

        //Consultar la base de datos para obtener los datos del cliente con la cedula/RUC especificada.
        // $cliente = Cliente::find($cedula);
        $cliente = Cliente::buscarPorCedula($cedula);

        //Verificar si el cliente existe en la base de datos:
        if($cliente){
            // crear un array con los datos del cliente:
            $datosCliente = [
                'CE_NOMBRE' => $cliente->CE_NOMBRE,
                'CE_APELLI' => $cliente->CE_APELLI,
                'CE_RAZONS' => $cliente->CE_RAZONS,
                'CE_RUCIC' => $cliente->CE_RUCIC,
                'CE_NOMREP' => $cliente->CE_NOMREP,
                'CE_APEREP' => $cliente->CE_APEREP,
                'CE_CADOM1' => $cliente->CE_CADOM1,
                'CE_CADOM2' => $cliente->CE_CADOM2,
                'CE_SECDOM' => $cliente->CE_SECDOM,
                'CE_CAOFI1' => $cliente->CE_CAOFI1,
                'CE_CAOF2' => $cliente->CE_CAOF2,
                'CE_SECOFI' => $cliente->CE_SECOFI,
                'CE_CAENT1' => $cliente->CE_CAENT1,
                'CE_CAENT2' => $cliente->CE_CAENT2,
                'CE_SECENT' => $cliente->CE_SECENT,
                'CE_TELDOM' => $cliente->CE_TELDOM,
                'CE_TELOFI' => $cliente->CE_TELOFI,
                'CE_TELBOD' => $cliente->CE_TELBOD,
                'CE_FAX' => $cliente->CE_FAX,
                'CE_EMAIL' => $cliente->CE_EMAIL,
            ];

            //Devolver los datos del cliente como una respuesta JSON:
            header('Content-Type: application/json');
            echo json_encode($datosCliente);
        }else{
            //Devolver un mensaje de error como respuesta JSON:
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Cliente no encontrado']);
        }
    }



}