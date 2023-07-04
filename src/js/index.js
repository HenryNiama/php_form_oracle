//------------------------------------------------VARIABLES------------------------------------------------
const btnBuscar = document.getElementById("btnBuscar");
let CE_RUCIC = document.getElementById("CE_RUCIC_CEDULA_PASSPORT");
const form = document.getElementById("formulario");
const guardarBtn = document.getElementById("guardarBtn");
const formularioActualizado = document.getElementById("formularioActualizado");


//------------------------------------------------EVENTOS------------------------------------------------

document.addEventListener("DOMContentLoaded", function () {

  buscarCedulaRUC();
  guardarInformacion();
  submitFormulario();
});

//------------------------------------------------FUNCIONES------------------------------------------------

 function buscarCedulaRUC() {
   // Agregar evento de clic al botón "Buscar"
   btnBuscar.addEventListener("click", function (event) {
     // Detener el envío del formulario
     event.preventDefault();

     // Realizar la validación manualmente
     if (validarCedulaRUC()) {
       // Activar el modal manualmente
       const myModal = new bootstrap.Modal(document.getElementById("myModal"));
       myModal.show();

        // Realizar la petición a la API utilizando Fetch API
        consultarClienteAPI();
     }
   });
 }


// Función para validar el campo CE_RUCIC
  function validarCedulaRUC() {
    const cedulaInput = CE_RUCIC.value;

    if (!cedulaInput) {
      // alert("El RUC o Cédula es obligatorio.");
      Swal.fire("Error", "El RUC o Cédula es obligatorio.", "error");
      return false;
    }

    const longitud = cedulaInput.length;

    if (longitud !== 10 && longitud !== 13) {
      // alert("El RUC o Cédula debe tener 10 o 13 dígitos.");
      Swal.fire("Error", "El RUC o Cédula debe tener 10 o 13 dígitos.", "error");
      return false;
    }

    return true;
  }

  async function consultarClienteAPI(){
    var cedula = CE_RUCIC.value;
    
    try{
      const url = `/api/get-client-data?CE_RUCIC=${cedula}`;

      const respuesta = await fetch(url);

      const resultado = await respuesta.json();

      imprimirDatos(resultado);
    } 
    catch(error){
      console.log(error);
    }
  }

  function imprimirDatos(datos){
    const {CE_NOMBRE, CE_APELLI, CE_RAZONS, CE_RUCIC, CE_NOMREP, CE_APEREP, CE_CADOM1, CE_CADOM2, CE_SECDOM, CE_CAOFI1, CE_CAOF2, CE_SECOFI, CE_CAENT1, CE_CAENT2, CE_SECENT, CE_TELDOM, CE_TELOFI, CE_TELBOD, CE_FAX, CE_EMAIL} = datos;

    document.getElementById("CE_NOMBRE").value = CE_NOMBRE;
    document.getElementById("CE_APELLI").value = CE_APELLI;
    document.getElementById("CE_RAZONS").value = CE_RAZONS;
    document.getElementById("CE_RUCIC").value = CE_RUCIC;
    document.getElementById("CE_NOMREP").value = CE_NOMREP;
    document.getElementById("CE_APEREP").value = CE_APEREP;
    document.getElementById("CE_CADOM1").value = CE_CADOM1;
    document.getElementById("CE_CADOM2").value = CE_CADOM2;
    document.getElementById("CE_SECDOM").value = CE_SECDOM;
    document.getElementById("CE_CAOFI1").value = CE_CAOFI1;
    document.getElementById("CE_CAOF2").value = CE_CAOF2;
    document.getElementById("CE_SECOFI").value = CE_SECOFI;
    document.getElementById("CE_CAENT1").value = CE_CAENT1;
    document.getElementById("CE_CAENT2").value = CE_CAENT2;
    document.getElementById("CE_SECENT").value = CE_SECENT;
    document.getElementById("CE_TELDOM").value = CE_TELDOM;
    document.getElementById("CE_TELOFI").value = CE_TELOFI;
    document.getElementById("CE_TELBOD").value = CE_TELBOD;
    document.getElementById("CE_FAX").value = CE_FAX;
    document.getElementById("CE_EMAIL").value = CE_EMAIL;
  }


  function guardarInformacion(){
    // Obtenemos el botón "Guardar" y le asignamos el controlador de evento
    guardarBtn.addEventListener("click", () => {

      // Validamos que todos los campos estén llenos y el checkbox esté marcado
      if (validarDatosLlenados()) {
          enviarDatosAPI();
      } else {
        // Si algún campo está vacío o el checkbox no está marcado, mostramos un SweetAlert2 de error
        Swal.fire(
          "Error",
          "Por favor, completa todos los campos y acepta los términos y condiciones",
          "error"
        );
        return; // Detenemos la ejecución si hay campos vacíos o el checkbox no está marcado.
      }

    });
  }


  function validarDatosLlenados(){
      // Obtenemos los valores de los campos
      const nombre = document.getElementById("CE_NOMBRE").value;
      const apellido = document.getElementById("CE_APELLI").value;
      const razonSocial = document.getElementById("CE_RAZONS").value;
      const ruc = document.getElementById("CE_RUCIC").value;
      const nombreRepresentante = document.getElementById("CE_NOMREP").value;
      const apellidoRepresentante = document.getElementById("CE_APEREP").value;
      const domicilio1 = document.getElementById("CE_CADOM1").value;
      const domicilio2 = document.getElementById("CE_CADOM2").value;
      const secDomicilio = document.getElementById("CE_SECDOM").value;
      const oficina1 = document.getElementById("CE_CAOFI1").value;
      const oficina2 = document.getElementById("CE_CAOF2").value;
      const secOficina = document.getElementById("CE_SECOFI").value;
      const entre1 = document.getElementById("CE_CAENT1").value;
      const entre2 = document.getElementById("CE_CAENT2").value;
      const secEntre = document.getElementById("CE_SECENT").value;
      const telDomicilio = document.getElementById("CE_TELDOM").value;
      const telOficina = document.getElementById("CE_TELOFI").value;
      const telBodega = document.getElementById("CE_TELBOD").value;
      const fax = document.getElementById("CE_FAX").value;
      const email = document.getElementById("CE_EMAIL").value;

      // Obtenemos el estado del checkbox
      const aceptaTerminos = document.getElementById("terminos").checked;

      // Validamos que todos los campos estén llenos y el checkbox esté marcado
      if (
        nombre.trim() === "" ||
        apellido.trim() === "" ||
        razonSocial.trim() === "" ||
        ruc.trim() === "" ||
        nombreRepresentante.trim() === "" ||
        apellidoRepresentante.trim() === "" ||
        domicilio1.trim() === "" ||
        domicilio2.trim() === "" ||
        secDomicilio.trim() === "" ||
        oficina1.trim() === "" ||
        oficina2.trim() === "" ||
        secOficina.trim() === "" ||
        entre1.trim() === "" ||
        entre2.trim() === "" ||
        secEntre.trim() === "" ||
        telDomicilio.trim() === "" ||
        telOficina.trim() === "" ||
        telBodega.trim() === "" ||
        fax.trim() === "" ||
        email.trim() === "" ||
        !aceptaTerminos
      ) {
        return false;
      }else{
        return true;
      }
  }


  async function enviarDatosAPI()
  {
    // Si todos los campos están llenos y el checkbox está marcado, podemos proceder a guardar los datos
    // Aquí puedes agregar tu lógica de guardado, ya sea usando AJAX o cualquier otra forma
    const formData = new URLSearchParams(new FormData(formularioActualizado));
    // const formData = new FormData(formularioActualizado);

    // try{
    //   const url = '/';

    //   const response = await fetch(url, {
    //     method: 'POST',
    //     body: formData,
    //     headers: {
    //       'Content-Type': 'multipart/form-data'
    //     }
    //   });

    //   const data = await response.json();

    //   console.log(data);

    //   Swal.fire({
    //     title: "Datos actualizados correctamente",
    //     text: "Se actualizaron los datos correctamente",
    //     icon: "success",
    //     didClose: () => {
    //       window.location.href = "/";
    //     }
    //   });
    // }catch(error){
    //   console.log(error);
    //   Swal.fire({
    //     title: "Error al actualizar los datos",
    //     text: "Ocurrió un error al actualizar los datos",
    //     icon: "error",
    //     didClose: () => {
    //       window.location.href = "/";
    //     }
    //   });
    // }
    fetch("/", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        console.log(data);
        Swal.fire({
          title: "Datos actualizados correctamente",
          text: "Se actualizaron los datos correctamente",
          icon: "success",
          didClose: () => {
            window.location.href = "/";
          },
        });
      })
      .catch((error) => {
        console.error(error);
      });

  }


  function submitFormulario(){
    formularioActualizado.addEventListener("submit", function (e) {
      e.preventDefault();
      console.log("Enviando formulario...");
    });
  }




