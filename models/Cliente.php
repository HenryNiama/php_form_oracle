<?php

namespace Model;

use Model\ActiveRecord;

class Cliente extends ActiveRecord
{
    protected static $tabla = 'FA_CLIEN';
    protected static $columnasDB = ['CE_TIPO', 'CE_NOMBRE', 'CE_APELLI', 'CE_RAZONS', 'CE_RUCIC', 'CE_NOMREP', 'CE_APEREP', 'CE_CADOM1', 'CE_CADOM2', 'CE_SECDOM', 'CE_CAOFI1', 'CE_CAOF2', 'CE_SECOFI', 'CE_CAENT1', 'CE_CAENT2', 'CE_SECENT', 'CE_TELDOM', 'CE_TELOFI', 'CE_TELBOD', 'CE_FAX', 'CE_EMAIL'];

    public function __construct($args = [])
    {
        $this->CE_TIPO = $args['CE_TIPO'] ?? '';
        $this->CE_NOMBRE = $args['CE_NOMBRE'] ?? null;
        $this->CE_APELLI = $args['CE_APELLI'] ?? null;
        $this->CE_RAZONS = $args['CE_RAZONS'] ?? null;
        $this->CE_RUCIC = $args['CE_RUCIC'] ?? null;
        $this->CE_NOMREP = $args['CE_NOMREP'] ?? null;
        $this->CE_APEREP = $args['CE_APEREP'] ?? null;
        $this->CE_CADOM1 = $args['CE_CADOM1'] ?? null;
        $this->CE_CADOM2 = $args['CE_CADOM2'] ?? null;
        $this->CE_SECDOM = $args['CE_SECDOM'] ?? null;
        $this->CE_CAOFI1 = $args['CE_CAOFI1'] ?? null;
        $this->CE_CAOF2 = $args['CE_CAOF2'] ?? null;
        $this->CE_SECOFI = $args['CE_SECOFI'] ?? null;
        $this->CE_CAENT1 = $args['CE_CAENT1'] ?? null;
        $this->CE_CAENT2 = $args['CE_CAENT2'] ?? null;
        $this->CE_SECENT = $args['CE_SECENT'] ?? null;
        $this->CE_TELDOM = $args['CE_TELDOM'] ?? null;
        $this->CE_TELOFI = $args['CE_TELOFI'] ?? null;
        $this->CE_TELBOD = $args['CE_TELBOD'] ?? null;
        $this->CE_FAX = $args['CE_FAX'] ?? null;
        $this->CE_EMAIL = $args['CE_EMAIL'] ?? null;
    }

    // public function validarCedulaRUC()
    // {
    //     if(!$this->CE_RUCIC){
    //         self::$alertas['error'][] = "El RUC o Cédula es obligatorio.";

    //         return self::$alertas;
    //     }

    //     $longitud = strlen($this->CE_RUCIC);

    //     if ($longitud !== 10 && $longitud !== 13) {
    //         self::$alertas['error'][] = "El RUC o Cédula debe tener 10 o 13 dígitos.";
    //     }

    //     return self::$alertas;
    // }	

    // public function validarDatos()
    // {
    //     if(!$this->CE_TIPO){
    //         self::$alertas['error'][] = "El tipo de cliente es obligatorio";
    //     }

    //     if(!$this->CE_NOMBRE){
    //         self::$alertas['error'][] = "El nombre del cliente es obligatorio";
    //     }

    //     if(!$this->CE_APELLIDO){
    //         self::$alertas['error'][] = "El apellido del cliente es obligatorio";
    //     }

    //     if(!$this->CE_RAZONS){
    //         self::$alertas['error'][] = "La razon social del cliente es obligatorio";
    //     }

    //     if(!$this->CE_RUCIC){
    //         self::$alertas['error'][] = "El RUC o CI del cliente es obligatorio";
    //     }

    //     if(!$this->CE_NOMREP){
    //         self::$alertas['error'][] = "El nombre del representante del cliente es obligatorio";
    //     }

    //     if(!$this->CE_APEREP){
    //         self::$alertas['error'][] = "El apellido del representante del cliente es obligatorio";
    //     }

    //     if(!$this->CE_CADOM1){
    //         self::$alertas['error'][] = "La direccion del cliente es obligatorio";
    //     }

    //     if(!$this->CE_CADOM2){
    //         self::$alertas['error'][] = "La direccion del cliente es obligatorio";
    //     }

    //     if(!$this->CE_SECDOM){
    //         self::$alertas['error'][] = "La direccion del cliente es obligatorio";
    //     }

    //     if(!$this->CE_CAOFI1){
    //         self::$alertas['error'][] = "La direccion del cliente es obligatorio";
    //     }

    //     if(!$this->CE_CAOF2){
    //         self::$alertas['error'][] = "La direccion del cliente es obligatorio";
    //     }

    //     if(!$this->CE_SECOFI){
    //         self::$alertas['error'][] = "La direccion del cliente es obligatorio";
    //     }

    //     if(!$this->CE_CAENT1){
    //         self::$alertas['error'][] = "La direccion del cliente es obligatorio";
    //     }

    //     if(!$this->CE_CAENT2){
    //         self::$alertas['error'][] = "La direccion del cliente es obligatorio";
    //     }

    //     if(!$this->CE_SECENT){
    //         self::$alertas['error'][] = "La direccion del cliente es obligatorio";
    //     }

    //     if(!$this->CE_TELDOM){
    //         self::$alertas['error'][] = "El telefono del cliente es obligatorio";
    //     }

    //     if(!$this->CE_TELOFI){
    //         self::$alertas['error'][] = "El telefono del cliente es obligatorio";
    //     }

    //     if(!$this->CE_TELBOD){
    //         self::$alertas['error'][] = "El telefono del cliente es obligatorio";
    //     }

    //     if(!$this->CE_EMAIL){
    //         self::$alertas['error'][] = "El email del cliente es obligatorio";
    //     }

    //     return self::$alertas;
    // }


    // public function validarCheckTerminosCondiciones()
    // {
    //     if(!$this->terminos){
    //         self::$alertas['error'][] = "Debe aceptar los terminos y condiciones";
    //     }

    //     return self::$alertas;
    // }

}
