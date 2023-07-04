


$("#miSpinner").hide();

// Cargar datos del paciente a partir de la cedula
$(function () {
  const $cedula = $("#cedulaPaciente");

  $cedula.change(() => {
    const cedulaId = $cedula.val();

    const url = `/api/get-patient-data/${cedulaId}`;

    const $body = $("body");
    //get the url with the onDoctorsLoaded function and add a spinner while the data is loading. The spinner will be hidden when the data is loaded.
    $.ajax({
      url: url,
      beforeSend: function () {
        $("#miSpinner").show();
        $body.css("opacity", "0.5");
        //quitar un parrafo dentro de la clase .vistoBueno
        $(".vistoBueno").find("i").remove();
        $(".editarCampo").find("i").remove();
      },
    }).done(function (patient) {
      onPatientDataLoaded(patient);
      $("#miSpinner").hide();
      $body.css("opacity", "1");
    });
  });
});

function onPatientDataLoaded(patient) {
  const $nombres = $("#nombres");
  const $edad = $("#edad");
  const $telefono = $("#telefono");
  const $email = $("#email");

  //quitar disabled a celular
  $telefono.removeAttr("disabled");
  $email.removeAttr("disabled");

  //quitar clase border-0 a telefono y email
  $telefono.removeClass("border-0");
  $email.removeClass("border-0");

  //agregar placeholder a telefono y email:
  $telefono.attr("placeholder", "Confirma el numero de celular");
  $email.attr("placeholder", "Confirma el correo electronico");

  //agregar un parrafo dentro de la clase .vistoBueno
  $(".vistoBueno").append(
    '<i class="fa-solid fa-check" style="color: #22ec13;"></i>'
  );
  $(".editarCampo").append(
    '<i class="fa-solid fa-pencil" style="color: #7b9cd5;"></i>'
  );

  $nombres.val(patient.nombres);
  $edad.val(patient.edad);
  $telefono.val(patient.telefono);
  $email.val(patient.email);
}
