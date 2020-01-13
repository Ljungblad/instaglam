"use strict";

const likeForms = document.querySelectorAll(".post-like-form");

// Adds a like to a post

likeForms.forEach(likeForm =>
  likeForm.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(likeForm);

    if (likeForm[1].value === "unliked") {
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
          const likeImg = event.target.querySelector(".unlike-img");

          likeImg.classList.add("like-img");
          likeImg.classList.remove("unlike-img");
          form.value = "liked";
          likeCounter.innerHTML = numberOfLikes;
          likeCounter.innerHTML += " likes";
        });
    } else {
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
          const likeImg = event.target.querySelector(".like-img");

          likeImg.classList.add("unlike-img");
          likeImg.classList.remove("like-img");
          likeCounter.innerHTML = numberOfLikes;
          likeCounter.innerHTML += " likes";
          form.value = "unliked";
        });
    }
  })
);
