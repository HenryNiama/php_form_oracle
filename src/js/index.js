
// Ocultar spinner
const spinner = document.getElementById("spinner");
spinner.style.display = "none";



// Mostrar campos de pasaporte o cédula y nombre de empresa de auerdo con el tipo de cliente
// var tipoClienteSelect = document.getElementById("tipo_cliente");
// var campoPasaporteCedula = document.getElementById("campo_pasaporte_cedula");
// var campoNombreEmpresa = document.getElementById("campo_nombre_empresa");

// tipoClienteSelect.addEventListener("change", function () {
//   if (tipoClienteSelect.value === "N" || tipoClienteSelect.value === "P") {
//     campoPasaporteCedula.style.display = "block";
//     campoNombreEmpresa.style.display = "none";
//   } else if (
//     tipoClienteSelect.value === "J" ||
//     tipoClienteSelect.value === "R"
//   ) {
//     campoPasaporteCedula.style.display = "none";
//     campoNombreEmpresa.style.display = "block";
//   }
// });


// Obtener el formulario y el botón de enviar
const form = document.getElementById("formulario");
const btnBuscar = document.getElementById("btnBuscar");

// Agregar evento de clic al botón "Buscar"
btnBuscar.addEventListener("click", function (event) {
  // Detener el envío del formulario
  event.preventDefault();

  // Realizar la validación manualmente
  if (validarCedulaRUC()) {
    // Activar el modal manualmente
    const myModal = new bootstrap.Modal(
      document.getElementById("myModal")
    );
    myModal.show();
  }
});

// Función para validar el campo CE_RUCIC
function validarCedulaRUC() {
  const CE_RUCIC = document.getElementById("CE_RUCIC_CEDULA_PASSPORT").value;

  if (!CE_RUCIC) {
    // alert("El RUC o Cédula es obligatorio.");
    Swal.fire("Error", "El RUC o Cédula es obligatorio.", "error");
    return false;
  }

  const longitud = CE_RUCIC.length;

  if (longitud !== 10 && longitud !== 13) {
    // alert("El RUC o Cédula debe tener 10 o 13 dígitos.");
    Swal.fire("Error", "El RUC o Cédula debe tener 10 o 13 dígitos.", "error");
    return false;
  }

  return true;
}



// Consulta Endopoint para encontrar Cliente por medio de Cedula/RUC
// $(document).ready(function () {
//   $("#CE_RUCIC").on("change", function () {
//     var cedula = $(this).val();

//     // Realizar la petición AJAX al endpoint /api/cliente
//     $.ajax({
//       url: "/api/cliente",
//       data: { CE_RUCIC: cedula },
//       dataType: "json",
//       success: function (response) {
//         // Actualizar los campos del formulario con los datos del cliente
//         $("#CE_NOMBRE").val(response.CE_NOMBRE);
//         $("#CE_APELLI").val(response.CE_APELLIDO);
//         $("#CE_RUCIC").val(response.CE_APELLIDO);
//         // $("#CE_RAZONS").val(response.CE_RAZONS);
//         // ... continuar con los demás campos
//       },
//       error: function () {
//         // Mostrar un mensaje de error si no se encontró el cliente
//         alert("Cliente no encontrado");
//       },
//     });
//   });
// });

document.addEventListener("DOMContentLoaded", function () {

  var cedulaInput = document.getElementById("CE_RUCIC_CEDULA_PASSPORT");

  cedulaInput.addEventListener("change", function () {
    var cedula = cedulaInput.value;

    // Mostrar el spinner
    showSpinner();

    // Realizar la petición a la API utilizando Fetch API
    fetch("/api/get-client-data?CE_RUCIC=" + cedula)
      .then(function (response) {
        if (response.ok) {
          return response.json();
        } else {
          throw new Error("Cliente no encontrado");
        }
      })
      .then(function (response) {
        // Actualizar los campos del formulario con los datos del cliente
        document.getElementById("CE_NOMBRE").value = response.CE_NOMBRE;
        document.getElementById("CE_APELLI").value = response.CE_APELLI;
        document.getElementById("CE_RAZONS").value = response.CE_RAZONS;
        document.getElementById("CE_RUCIC").value = response.CE_RUCIC;
        document.getElementById("CE_NOMREP").value = response.CE_NOMREP;
        document.getElementById("CE_APEREP").value = response.CE_APEREP;
        document.getElementById("CE_CADOM1").value = response.CE_CADOM1;
        document.getElementById("CE_CADOM2").value = response.CE_CADOM2;
        document.getElementById("CE_SECDOM").value = response.CE_SECDOM;
        document.getElementById("CE_CAOFI1").value = response.CE_CAOFI1;
        document.getElementById("CE_CAOF2").value = response.CE_CAOF2;
        document.getElementById("CE_SECOFI").value = response.CE_SECOFI;
        document.getElementById("CE_CAENT1").value = response.CE_CAENT1;
        document.getElementById("CE_CAENT2").value = response.CE_CAENT2;
        document.getElementById("CE_SECENT").value = response.CE_SECENT;
        document.getElementById("CE_TELDOM").value = response.CE_TELDOM;
        document.getElementById("CE_TELOFI").value = response.CE_TELOFI;
        document.getElementById("CE_TELBOD").value = response.CE_TELBOD;
        document.getElementById("CE_FAX").value = response.CE_FAX;
        document.getElementById("CE_EMAIL").value = response.CE_EMAIL;


        // Ocultar el spinner
        hideSpinner();
      })
      .catch(function (error) {
        // Mostrar un mensaje de error si no se encontró el cliente
        alert(error.message);

        // Ocultar el spinner
        hideSpinner();
      });
  });

  function showSpinner() {
    // Mostrar el spinner (puedes adaptar este código para mostrar tu spinner específico)
    // Por ejemplo, puedes agregar una clase CSS para mostrar el spinner:
    document.getElementById("spinner").classList.add("d-none");
  }

  function hideSpinner() {
    // Ocultar el spinner (puedes adaptar este código para ocultar tu spinner específico)
    // Por ejemplo, puedes quitar la clase CSS que muestra el spinner:
    document.getElementById("spinner").classList.remove("d-none");
  }
});



// Sweet Alert 2 antes de actualizar los datos:
// Obtenemos el botón "Guardar" y le asignamos el controlador de evento
const guardarBtn = document.getElementById('guardarBtn');

guardarBtn.addEventListener('click', () => {
  // Obtenemos los valores de los campos
  const nombre = document.getElementById('CE_NOMBRE').value;
  const apellido = document.getElementById('CE_APELLI').value;
  const razonSocial = document.getElementById('CE_RAZONS').value;
  const ruc = document.getElementById('CE_RUCIC').value;
  const nombreRepresentante = document.getElementById('CE_NOMREP').value;
  const apellidoRepresentante = document.getElementById('CE_APEREP').value;
  const domicilio1= document.getElementById('CE_CADOM1').value;
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
  const aceptaTerminos = document.getElementById('terminos').checked;

  // Validamos que todos los campos estén llenos y el checkbox esté marcado
  if (
    nombre.trim() === '' ||
    apellido.trim() === '' ||
    razonSocial.trim() === '' ||
    ruc.trim() === '' ||
    nombreRepresentante.trim() === '' ||
    apellidoRepresentante.trim() === '' ||
    domicilio1.trim() === '' ||
    domicilio2.trim() === '' ||
    secDomicilio.trim() === '' ||
    oficina1.trim() === '' ||
    oficina2.trim() === '' ||
    secOficina.trim() === '' ||
    entre1.trim() === '' ||
    entre2.trim() === '' ||
    secEntre.trim() === '' ||
    telDomicilio.trim() === '' ||
    telOficina.trim() === '' ||
    telBodega.trim() === '' ||
    fax.trim() === '' ||
    email.trim() === '' ||
    !aceptaTerminos
  ) {
    // Si algún campo está vacío o el checkbox no está marcado, mostramos un SweetAlert2 de error
    Swal.fire('Error', 'Por favor, completa todos los campos y acepta los términos y condiciones', 'error');
    return; // Detenemos la ejecución si hay campos vacíos o el checkbox no está marcado.
  }else{
    // Si todos los campos están llenos y el checkbox está marcado, podemos proceder a guardar los datos
    // Aquí puedes agregar tu lógica de guardado, ya sea usando AJAX o cualquier otra forma
    const formularioActualizado = document.getElementById("formularioActualizado");

    // const formData = new FormData(formularioActualizado);
    const formData = new URLSearchParams(new FormData(formularioActualizado));

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
          }
        });
      })
      .catch((error) => {
        console.error(error);
      });
  }
});

const formularioActualizado = document.getElementById("formularioActualizado");
formularioActualizado.addEventListener("submit", function (e) {
  e.preventDefault();
  console.log("Enviando formulario...");
});



