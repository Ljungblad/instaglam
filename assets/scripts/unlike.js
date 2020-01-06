"use strict";

const unlikeForms = document.querySelectorAll(".post-unlike-form");
const likeBtn = `<form method="post" class="post-like-form">
                  <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                  <button class="like-btn" type="submit">Like</button>
                  </form>`;

// Removes a like from a post

unlikeForms.forEach(unlikeForm =>
  unlikeForm.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(unlikeForm);

    fetch("/../../app/posts/unlike.php", {
      method: "POST",
      body: formData
    })
      .then(response => response.json())
      .then(numberOfLikes => {
        // Make something happen here to show that the post is liked!
        const likeCounter = document.querySelector(
          `.like-count${unlikeForm[0].value}`
        );
        likeCounter.innerHTML = numberOfLikes;
        likeCounter.innerHTML += " likes";
      });
    const btnContainer = event.currentTarget.parentElement;
    btnContainer.innerHTML = likeBtn;
  })
);
