"use strict";

const searchInput = document.querySelector(".search-form");

searchInput.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(form);

    fetch(`http://localhost:8000/search.php`, {
      method: "POST",
      body: formData
    })
      .then(response => {
        return response.json();
      })
      .then(json => {});
  });
});
