"use strict";

const likeForms = document.querySelectorAll(".post-like-form");

// Adds a like to a post

likeForms.forEach(likeForm =>
  likeForm.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(likeForm);

    if (likeForm[1].value === "unliked") {
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
          const likeBtn = event.target.querySelector(".like-btn");

          form.value = "liked";
          likeCounter.innerHTML = numberOfLikes;
          likeCounter.innerHTML += " likes";
          likeBtn.innerHTML = "Unlike";
        });
    } else {
      console.log("unliked");

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
          const likeBtn = event.target.querySelector(".like-btn");

          likeCounter.innerHTML = numberOfLikes;
          likeCounter.innerHTML += " likes";
          form.value = "unliked";
          likeBtn.innerHTML = "Like";
        });
    }
  })
);
