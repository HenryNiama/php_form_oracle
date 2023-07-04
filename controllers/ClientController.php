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

        //Ruta y nombre del archivo
        $filePath = 'C:\Users\cajero\OneDrive - Pintulac\Escritorio\Datos del Cliente.xlsx';

        //Verificar si el archivo existe:
        if(file_exists($filePath)){
            //Abrir el archivo
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
        }else{
            // Crear un nuevo objeto de tipo Spreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Datos del Cliente');
            // Establecer los títulos de las columnas en la primera fila
            $titulosColumnas = [
                'CE_NOMBRE' => 'NOMBRE',
                'CE_APELLI' => 'APELLIDO',
                'CE_RAZONS' => 'RAZÓN SOCIAL',
                'CE_RUCIC' => 'CÉDULA/RUC',
                'CE_NOMREP' => 'NOMBRE REPRESENTANTE',
                'CE_APEREP' => 'APELLIDO REPRESENTANTE',
                'CE_CADOM1' => 'CALLE DOMICILIO 1',
                'CE_CADOM2' => 'CALLE DOMICILIO 2',
                'CE_SECDOM' => 'SECTOR DOMICILIO',
                'CE_CAOFI1' => 'CALLE OFICINA 1',
                'CE_CAOF2' => 'CALLE OFICINA 2',
                'CE_SECOFI' => 'SECTOR OFICINA',
                'CE_CAENT1' => 'CALLE ENTREGA 1',
                'CE_CAENT2' => 'CALLE ENTREGA 2',
                'CE_SECENT' => 'SECTOR ENTREGA',
                'CE_TELDOM' => 'TELEFONO DOMICILIO',
                'CE_TELOFI' => 'TELEFONO OFICINA',
                'CE_TELBOD' => 'TTELEFONO BODEGA',
                'CE_FAX' => 'FAX',
                'CE_EMAIL' => 'EMAIL',
                'FECHA' => 'FECHA',
            ];

            foreach ($titulosColumnas as $columna => $titulo) {
                $columnIndex = array_search($columna, array_keys($titulosColumnas)) + 1;
                $sheet->setCellValueByColumnAndRow($columnIndex, 1, $titulo);
            }
        }

        //Obtener la ultima fila ocupada
        $lastRow = $sheet->getHighestRow() + 1;

        $fecha = date('d/m/Y');
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
            'FECHA' => $fecha,
        ];


        // Establecer los datos del cliente en la siguiente fila disponible
        foreach ($datosCliente as $key => $dato) {
            $columna = array_search($key, array_keys($datosCliente)) + 1; // Obtener el número de columna
            $sheet->setCellValueByColumnAndRow($columna, $lastRow, $dato);
        }

        // Crear un nuevo objeto de tipo Xlsx
        $writer = new Xlsx($spreadsheet);

        // Establecer la cabecera HTTP para indicar que se envía un archivo de Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        // Establecer el nombre del archivo
        header('Content-Disposition: attachment;filename="Datos del Cliente.xlsx"');

        header('Cache-Control: max-age=0');

        $writer->save($filePath);

        // Finalizar la ejecución del script
        exit;
    }

}