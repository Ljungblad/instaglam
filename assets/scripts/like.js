"use strict";

const likeForms = document.querySelectorAll(".post-like-form");

// Adds a like to a post

likeForms.forEach(likeForm =>
  likeForm.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(likeForm);

    if (likeForm[1].value === "Unliked") {
      console.log("liked!");

      fetch("/../../app/posts/like.php", {
        method: "POST",
        body: formData
      })
        .then(response => response.json())
        .then(numberOfLikes => {
          const likeCounter = document.querySelector(
            `.like-count${likeForm[0].value}`
          );
          const form = event.target.action;

          form.value = "Liked";
          likeCounter.innerHTML = numberOfLikes;
          likeCounter.innerHTML += " likes";
        });
    } else {
      console.log("Unliked");

      fetch("/../../app/posts/unlike.php", {
        method: "POST",
        body: formData
      })
        .then(response => response.json())
        .then(numberOfLikes => {
          const likeCounter = document.querySelector(
            `.like-count${likeForm[0].value}`
          );
          const form = event.target.action;

          form.value = "Unliked";
          likeCounter.innerHTML = numberOfLikes;
          likeCounter.innerHTML += " likes";
        });
    }
  })
);
