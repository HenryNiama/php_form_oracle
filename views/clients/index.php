
<?php include_once __DIR__ . '/../templates/nombre-sitio.php';?>
    
<div class="row col-7 mx-auto">

    <form id = "formulario">
        <!-- <div class="mb-3">
            <select class = "form-select form-select-lg mb-3" aria-label = ".form-select-lg" name="tipo_cliente" id="tipo_cliente">
                <option selected disabled>Selecciona una opción: </option>
                <option value="J">Juridico</option>
                <option value="R">RUC Natural</option>
                <option value="N">Cédula</option>
                <option value="P">Pasaporte</option>
            </select>
        </div> -->

        <div class="card">
            <div class="card-header text-center">
                Digita tu numero de cédula o RUC para actualizar tus datos.
            </div>
            <div class="card-body">
                <div class="" id="campo_pasaporte_cedula">
                    <label for="CE_RUCIC_CEDULA_PASSPORT" class ="form-label fw-bold">RUC/Cédula/Pasaporte: </label>
                    <input type="number" class = "form-control" id = "CE_RUCIC_CEDULA_PASSPORT" name = "CE_RUCIC_CEDULA_PASSPORT" placeholder = "Escribe la cédula, ruc o pasaporte"/>
                </div>
            </div>

            <div class="text-center p-3">
                <button type = "submit" class = "btn btn-danger btn-lg" id="btnBuscar">Buscar</button> 
            </div>
        </div>

        <!-- <div class="mb-3" id = "campo_nombre_empresa" style="display: none">
            <label for="nombre_empresa" class ="form-label">Nombre de la Empresa</label>
            <input type="text" class = "form-control" id = "nombre_empresa" placeholder = "Escribe el nombre de la empresa">
        </div> -->
    </form>

    
    <div class="modal fade" id="myModal" data-bs-backdrop = "static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información Personal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action = "/" method ="POST" id="formularioActualizado">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_NOMBRE" class="form-label fw-bold">NOMBRES: </label>
                                        <input type="text" class="form-control" id="CE_NOMBRE" name = "CE_NOMBRE" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_APELLI" class="form-label fw-bold">APELLIDOS: </label>
                                        <input type="text" class="form-control" id="CE_APELLI" name = "CE_APELLI" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_RAZONS" class="form-label fw-bold">RAZON SOCIAL: </label>
                                        <input type="text" class="form-control" id="CE_RAZONS" name = "CE_RAZONS" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_RUCIC" class="form-label fw-bold">RUC/CEDULA: </label>
                                        <input type="number" class="form-control" id="CE_RUCIC" name ="CE_RUCIC" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_NOMREP" class="form-label fw-bold">NOMBRE REPRESENTANTE: </label>
                                        <input type="text" class="form-control" id="CE_NOMREP" name = "CE_NOMREP" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="CE_APEREP" class="form-label fw-bold">APELLIDO REPRESENTANTE: </label>
                                    <input type="text" class="form-control" id="CE_APEREP" name = "CE_APEREP" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_CADOM1" class="form-label fw-bold">CALLE DOMICILIO 1: </label>
                                        <input type="text" class="form-control" id="CE_CADOM1" name ="CE_CADOM1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_CADOM2" class="form-label fw-bold">CALLE DOMICILIO 2: </label>
                                        <input type="text" class="form-control" id="CE_CADOM2" name = "CE_CADOM2" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_SECDOM" class="form-label fw-bold">SECTOR DOMICILIO: </label>
                                        <input type="text" class="form-control" id="CE_SECDOM" name = "CE_SECDOM" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_CAOFI1" class="form-label fw-bold">CALLE OFICINA 1: </label>
                                        <input type="text" class="form-control" id="CE_CAOFI1" name = "CE_CAOFI1" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_CAOF2" class="form-label fw-bold">CALLE OFICINA 2: </label>
                                        <input type="text" class="form-control" id="CE_CAOF2" name = "CE_CAOF2" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_SECOFI" class="form-label fw-bold">SECTOR OFICINA: </label>
                                        <input type="text" class="form-control" id="CE_SECOFI" name = "CE_SECOFI" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_CAENT1" class="form-label fw-bold">CALLE ENTREGA 1: </label>
                                        <input type="text" class="form-control" id="CE_CAENT1" name = "CE_CAENT1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_CAENT2" class="form-label fw-bold">CALLE ENTREGA 2: </label>
                                        <input type="text" class="form-control" id="CE_CAENT2" name = "CE_CAENT2" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_SECENT" class="form-label fw-bold">SECTOR ENTREGA: </label>
                                        <input type="text" class="form-control" id="CE_SECENT" name = "CE_SECENT" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_TELDOM" class="form-label fw-bold">TELEFONO DOMICILIO: </label>
                                        <input type="number" class="form-control" id="CE_TELDOM" name = "CE_TELDOM" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_TELOFI" class="form-label fw-bold">TELEFONO OFICINA: </label>
                                        <input type="number" class="form-control" id="CE_TELOFI" name = "CE_TELOFI" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_TELBOD" class="form-label fw-bold">TELEFONO BODEGA: </label>
                                        <input type="number" class="form-control" id="CE_TELBOD" name = "CE_TELBOD" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_FAX" class="form-label fw-bold">FAX: </label>
                                        <input type="number" class="form-control" id="CE_FAX" name = "CE_FAX" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CE_EMAIL" class="form-label fw-bold">EMAIL: </label>
                                        <input type="email" class="form-control" id="CE_EMAIL" name = "CE_EMAIL" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 form-check d-flex justify-content-center">
                                        <input type="checkbox" class="form-check-input mr-3" id="terminos">
                                        <label class="form-check-label" for="terminos">Acepta los términos y condiciones.</label>
                                    </div>
                                </div>
                            </div>


                            

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="guardarBtn">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<div class="spinner-border text-info d-none" id="spinner" style="width: 3rem; height: 3rem;" role="status"></div>



<?php 
    $script .="
        <script src='build/js/index.js'></script>
    ";
?> 
