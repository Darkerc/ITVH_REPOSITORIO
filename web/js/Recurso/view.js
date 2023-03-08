window.onload = function () {
  $("#resourceDelete").on("click", function () {
    krajeeDialog.confirm(
      "¿Esta seguro que desea eliminar el recurso?",
      function (result) {
        if (result) {
          $.ajax(`/recurso/delete?rec_id=${window.rec_id}`, {
            type: "POST", // http method
            success: function (data, status, xhr) {
              $.notify("Recurso eliminado con exito", "success");
              setTimeout(() => {
                  window.location.replace("/recurso/index");
              }, 1000)
            },
            error: function (jqXhr, textStatus, errorMessage) {
              console.error(errorMessage)
              $.notify("No se puedo eliminar el recurso", "error");
            },
          });
        }
      }
    );
  });

  $("#recursoAutorizar").on("click", function () {
    krajeeDialog.confirm(
      "¿Esta seguro que desea autorizar el recurso? \n Una vez autorizado, no podra eliminarse.",
      function (result) {
        if (result) {
          $.ajax(`/recurso/authorize?rec_id=${window.rec_id}`, {
            type: "POST", // http method
            success: function (data, status, xhr) {
              $.notify("Recurso recurso autorizado con exito", "success");
              setTimeout(() => {
                  window.location.reload();
              }, 1000)
            },
            error: function (jqXhr, textStatus, errorMessage) {
              console.error(errorMessage)
              $.notify("No se puedo autorizar el recurso", "error");
            },
          });
        }
      }
    );
  });

  $("#recursoDesautorizar").on("click", function () {
    krajeeDialog.confirm(
      "¿Esta seguro que desea desautorizar el recurso?",
      function (result) {
        if (result) {
          $.ajax(`/recurso/desauthorize?rec_id=${window.rec_id}`, {
            type: "POST", // http method
            success: function (data, status, xhr) {
              $.notify("Recurso recurso desautorizado con exito", "success");
              setTimeout(() => {
                  window.location.reload();
              }, 1000)
            },
            error: function (jqXhr, textStatus, errorMessage) {
              console.error(errorMessage)
              $.notify("No se puedo desautorizar el recurso", "error");
            },
          });
        }
      }
    );
  });

  $("#recursoDC").on("click", function () {
    krajeeDialog.confirm(
      "¿Desea acceso a los archivos de dublin core?",
      function (result) {
        if (result) {
          $.ajax(`/recurso/dc-request?rec_id=${window.rec_id}`, {
            type: "POST", // http method
            success: function (data, status, xhr) {
              $.notify("Solicitud enviada, espere a que sea autorizado", "success");
            },
            error: function (jqXhr, textStatus, errorMessage) {
              console.error(errorMessage)
              $.notify("No se puedo autorizar", "error");
            },
          });
        }
      }
    );
  });
};
