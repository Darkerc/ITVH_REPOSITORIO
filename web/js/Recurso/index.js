window.onload = () => {
  const isUpdated = window.isUpdated;

  const URL = {
    UPDATE: `/recurso/update-recurso-field?rec_id=${window.rec_id}`,
    DELETE: `/recurso/delete-recurso-field?rec_id=${window.rec_id}`,
  };

  const updateProperty = ({
    key,
    value,
    url,
    onSuccess = (data) => {},
    onError = (error) => {},
  }) => {
    $.notify("Cambiando informacion...", "info");
    $.ajax(url, {
      type: "POST", // http method
      data: {
        [key]: value,
      },
      // data to submit
      success: function (data, status, xhr) {
        $.notify("Realizado con exito", "success");
        onSuccess(data);
      },
      error: function (jqXhr, textStatus, errorMessage) {
        $.notify("A ocurrido un error, intente de nuevo", "error");
        onError(errorMessage);
      },
    });
  };

  window.onChangeSelectValues = (element, event, type = "UPDATE") => {
    const modelPropertyName = event.target.id.split("recurso-").pop();
    switch (modelPropertyName) {
      case "recursoCarrera": {
        const modelPropertyValue = event.params.data.id;
        const rectip_id = $("#rec_fkrecursotipo").val();
        updateProperty({
          key: modelPropertyName,
          value: {
            rectip_id,
            car_id: modelPropertyValue,
          },
          url: URL[type],
        });
        break;
      }
      case "palabrasc": {
        const modelPropertyValue =
          type === "DELETE" ? event.params.data.id : event.params.data.text;
        if (type === "DELETE") {
          updateProperty({
            key: modelPropertyName,
            value: modelPropertyValue,
            url: URL[type],
            onSuccess(pal_id) {
              $(`#recurso-palabrasc option[value="${modelPropertyValue}"]`)
                .remove()
                .trigger("change");
            },
          });
        } else if (type === "UPDATE") {
          updateProperty({
            key: modelPropertyName,
            value: modelPropertyValue,
            url: URL[type],
            onSuccess(pal_id) {
              $(`#recurso-palabrasc option[value="${modelPropertyValue}"]`)
                .remove()
                .trigger("change");
              var data = {
                id: pal_id,
                text: modelPropertyValue,
              };
              var newOption = new Option(data.text, data.id, true, true);
              $("#recurso-palabrasc").append(newOption).trigger("change");
            },
          });
        }
        break;
      }
      case "autores": {
        const modelPropertyValue = event.params.data.id;
        updateProperty({
          key: modelPropertyName,
          value: modelPropertyValue,
          url: URL[type],
        });
        break;
      }
      default: {
        const modelPropertyValue = event.target.value;
        updateProperty({
          key: modelPropertyName,
          value: modelPropertyValue,
          url: URL[type],
        });
        break;
      }
    }
  };

  window.onChangeTextValues = (modelPropertyName) => {
    const elementId = `recurso-${modelPropertyName}`;
    const element = document.getElementById(elementId);
    updateProperty({
      key: modelPropertyName,
      value: element.value,
      url: URL.UPDATE,
    });
  };

  window.onDateChanged = (event, modelPropertyName) => {
    const elementId = `recurso-${modelPropertyName}`;
    var DateTime = luxon.DateTime;
    const newDate = DateTime.fromJSDate(new Date(event.date)).toFormat(
      "yyyy-MM-dd hh:mm:ss"
    );
    updateProperty({
      key: modelPropertyName,
      value: newDate,
      url: URL.UPDATE,
    });
  };

  window.onNivelUpdated = (element, event) => {
    const modelPropertyValue = event.params.data.id;
    const modelPropertyPrevValue = window.rec_fknivel;
    const previousCarriers = $("#recursoCarrera").val();
    if (Array.isArray(previousCarriers) && previousCarriers.length) {
      $.notify(
        "No se puede cambiar a este nivel, contiene carreras que no pertenecen a este nivel",
        "warning"
      );
      $("#rec_fknivel").val(modelPropertyPrevValue);
      $("#rec_fknivel").trigger("change");
      return;
    }
    $.ajax(`/carrera/get-carreras-by-nivel?niv_id=${modelPropertyValue}`, {
      type: "GET", // http method
      success: function (data, status, xhr) {
        $(`#recursoCarrera option`).remove().trigger("change");
        data.forEach((car) => {
          var newOption = new Option(car.car_nombre, car.car_id, false, false);
          $("#recursoCarrera").append(newOption).trigger("change");
        });
      },
      error: function (jqXhr, textStatus, errorMessage) {
        $.notify("No se pudieron obtener las carreras", "error");
        onError(errorMessage);
      },
    });

    if (isUpdated) {
      window.onChangeSelectValues(element, event, "UPDATE");
    }
  };

  window.onRectipUpdated = (element, event) => {
    const modelPropertyValue = event.params.data.id;
    const modelPropertyPrevValue = window.rec_fkrecursotipo;
    const previousCarriers = $("#recursoCarrera").val();
    $.ajax(`/recurso-tipo/get-one?rectip_id=${modelPropertyValue}`, {
      type: "GET", // http method
      success: function (data, status, xhr) {
        if (data.rectip_multiple) {
          $(`#recursoCarrera `).attr("multiple", true);
          $("#recursoCarrera").trigger("change");
        } else {
          if (Array.isArray(previousCarriers) && previousCarriers.length >= 2) {
            $.notify(
              "No se puede cambiar a este tipo, solo se permite 1 carrera",
              "warning"
            );
            $("#rec_fkrecursotipo").val(modelPropertyPrevValue);
            $("#rec_fkrecursotipo").trigger("change");
            return;
          } else {
            $(`#recursoCarrera `).attr("multiple", false);
            $("#recursoCarrera").trigger("change");
          }
        }
        if (isUpdated) {
          window.onChangeSelectValues(element, event, "UPDATE");
        }
      },
      error: function (jqXhr, textStatus, errorMessage) {
        $.notify("No se pudieron obtener las carreras", "error");
        onError(errorMessage);
      },
    });
  };

  setTimeout(() => {
    if (!parseInt(window.rectip_multiple)) {
      $(`#recursoCarrera `).attr("multiple", false);
      $("#recursoCarrera").trigger("change");
    }
  }, 0);
};
