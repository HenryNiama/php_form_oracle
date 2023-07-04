<?php

namespace Controllers;

require  __DIR__. '/../vendor/autoload.php';

use MVC\Router;
use Model\Cliente;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// use PhpOffice\PhpSpreadsheet\IOFactory;

class ClientController{

    public static function index(Router $router)
    {
        $script = "";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // debuguear($_POST);
            self::saveInExcel($_POST);
        }

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

    public static function saveInExcel($postData)
    {


        $datos = $postData;

        // Crear un nuevo objeto de tipo Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Obtener la hoja activa
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('Datos del Cliente');

        // Crear un array con los datos del cliente
        $datosCliente = [
            'CE_NOMBRE' => $datos['CE_NOMBRE'],
            'CE_APELLI' => $datos['CE_APELLI'],
            'CE_RAZONS' => $datos['CE_RAZONS'],
            'CE_RUCIC' => $datos['CE_RUCIC'],
            'CE_NOMREP' => $datos['CE_NOMREP'],
            'CE_APEREP' => $datos['CE_APEREP'],
            'CE_CADOM1' => $datos['CE_CADOM1'],
            'CE_CADOM2' => $datos['CE_CADOM2'],
            'CE_SECDOM' => $datos['CE_SECDOM'],
            'CE_CAOFI1' => $datos['CE_CAOFI1'],
            'CE_CAOF2' => $datos['CE_CAOF2'],
            'CE_SECOFI' => $datos['CE_SECOFI'],
            'CE_CAENT1' => $datos['CE_CAENT1'],
            'CE_CAENT2' => $datos['CE_CAENT2'],
            'CE_SECENT' => $datos['CE_SECENT'],
            'CE_TELDOM' => $datos['CE_TELDOM'],
            'CE_TELOFI' => $datos['CE_TELOFI'],
            'CE_TELBOD' => $datos['CE_TELBOD'],
            'CE_FAX' => $datos['CE_FAX'],
            'CE_EMAIL' => $datos['CE_EMAIL'],
        ];

        // Crear un array con los titulos de las columnas
        $titulosColumnas = [
            'CE_NOMBRE' => 'Nombre',
            'CE_APELLI' => 'Apellido',
            'CE_RAZONS' => 'Razon Social',
            'CE_RUCIC' => 'Cedula/RUC',
            'CE_NOMREP' => 'Nombre Representante',
            'CE_APEREP' => 'Apellido Representante',
            'CE_CADOM1' => 'Calle Domicilio 1',
            'CE_CADOM2' => 'Calle Domicilio 2',
            'CE_SECDOM' => 'Sector Domicilio',
            'CE_CAOFI1' => 'Calle Oficina 1',
            'CE_CAOF2' => 'Calle Oficina 2',
            'CE_SECOFI' => 'Sector Oficina',
            'CE_CAENT1' => 'Calle Entrega 1',
            'CE_CAENT2' => 'Calle Entrega 2',
            'CE_SECENT' => 'Sector Entrega',
            'CE_TELDOM' => 'Telefono Domicilio',
            'CE_TELOFI' => 'Telefono Oficina',
            'CE_TELBOD' => 'Telefono Bodega',
            'CE_FAX' => 'Fax',
            'CE_EMAIL' => 'Email',
        ];

        // Establecer los títulos de las columnas en la primera fila
        foreach($titulosColumnas as $key => $titulo) {
            $columna = array_search($key, array_keys($titulosColumnas)) + 1; // Obtener el número de columna
            $sheet->setCellValueByColumnAndRow($columna, 1, $titulo);
        }

        // Establecer los datos del cliente en la segunda fila
        foreach($datosCliente as $key => $dato) {
            $columna = array_search($key, array_keys($datosCliente)) + 1; // Obtener el número de columna
            $sheet->setCellValueByColumnAndRow($columna, 2, $dato);
        }

        // Crear un nuevo objeto de tipo Xlsx
        $writer = new Xlsx($spreadsheet);

        // Establecer la cabecera HTTP para indicar que se envía un archivo de Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        // Establecer el nombre del archivo
        header('Content-Disposition: attachment;filename="Datos del Cliente.xlsx"');

        header('Cache-Control: max-age=0');

        $filePath = 'C:\Users\cajero\OneDrive - Pintulac\Escritorio\Datos del Cliente.xlsx';
        $writer->save($filePath);


        // Finalizar la ejecución del script
        exit;
    }

}