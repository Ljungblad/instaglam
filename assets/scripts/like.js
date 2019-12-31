"use strict";

const likeForms = document.querySelectorAll(".post-like-form");
const likeBtns = document.querySelectorAll(".like-btn");

// Adds a like to a post

likeForms.forEach(likeForm =>
  likeForm.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(likeForm);

    fetch("/../../app/posts/like.php", {
      method: "POST",
      body: formData
    })
      .then(response => response.json())
      .then(json => {
        // Make something happen here to show that the post is liked!
      });
    // this will now make the form red
    event.currentTarget.classList.add("liked");
  })
);
