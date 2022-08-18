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
};
