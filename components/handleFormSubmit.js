function submitFormOnClick(event) {
  var clickedButton = event.target;
  var nearestForm = $(clickedButton).closest("form");

  if (nearestForm.length > 0) {
    var formData = nearestForm.serialize();
    var formName = nearestForm.attr("name");

    if (formName) {
      $.ajax({
        type: "POST",
        url: "forms/" + formName + ".php",
        data: formData,
        dataType: "html",
        success: function (response) {
          var nearestOutputElement = $(clickedButton)
            .closest("form")
            .find(".output");

          nearestOutputElement.html(response);
        },
        error: function (error) {
          console.error(error);
        },
      });
    } else {
      console.error("Brak formularza z atrybutem name");
    }
  } else {
    console.error("Brak formularza");
  }
}

$(document).ready(function () {
  $("form").on("submit", function (event) {
    event.preventDefault();
    submitFormOnClick(event);
  });
});
