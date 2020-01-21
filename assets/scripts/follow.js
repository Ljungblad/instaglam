"use strict";

const followingForm = document.querySelectorAll(".following");

followingForm.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(form);

    fetch("/app/users/follow.php", {
      method: "POST",
      body: formData
    })
      .then(response => {
        return response.json();
      })
      .then(json => {
        const followBtn = event.target.querySelector(".followBtn");
        const followers = document.querySelector(".followers");

        followBtn.textContent = json.button;
        followers.textContent = json.followers;
      });
  });
});
