window.onload = () => {
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
      case "recursocarrera": {
        const modelPropertyValue = event.params.data.id;
        updateProperty({
          key: modelPropertyName,
          value: modelPropertyValue,
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
  };

  window.onRectipUpdated = (element, event) => {
    const modelPropertyValue = event.params.data.id;
    $.ajax(`/recurso-tipo/get-one?rectip_id=${modelPropertyValue}`, {
      type: "GET", // http method
      success: function (data, status, xhr) {
        if (data.rectip_multiple) {
            $(`#recursoCarrera `).attr('multiple', true);
        } else {
            $(`#recursoCarrera `).attr('multiple', false);
        }
      },
      error: function (jqXhr, textStatus, errorMessage) {
        $.notify("No se pudieron obtener las carreras", "error");
        onError(errorMessage);
      },
    });
  };
};
