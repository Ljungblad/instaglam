"use strict";

const unlikeForms = document.querySelectorAll(".post-unlike-form");
const unlikeBtns = document.querySelectorAll(".unlike-btn");

// Adds a like to a post

unlikeForms.forEach(unlikeForm =>
  unlikeForm.addEventListener("submit", event => {
    console.log("pushed!");
    event.preventDefault();

    const formData = new FormData(unlikeForm);

    fetch("/../../app/posts/unlike.php", {
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
