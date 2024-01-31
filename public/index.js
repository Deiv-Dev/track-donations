function deleteCharity(button) {
  let form = button.parentNode;
  let formData = new FormData(form);

  fetch(form.action, {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      form.closest("tr").remove();
    })
    .catch((error) => {
      console.error("Error deleting charity:", error);
    });
}

function deleteDonation(button) {
  let form = button.parentNode;
  let formData = new FormData(form);

  fetch(form.action, {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      form.closest("tr").remove();
    })
    .catch((error) => {
      console.error("Error deleting donation:", error);
    });
}
