"use strict";

const likeForms = document.querySelectorAll(".post-like-form");
const unlikeBtn = `<form method="post" class="post-unlike-form">
                  <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                  <button class="unlike-btn" type="submit">Unlike</button>
                  </form>`;

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
      .then(numberOfLikes => {
        // Make something happen here to show that the post is liked!
        const likeCounter = document.querySelector(
          `.like-count${likeForm[0].value}`
        );
        likeCounter.innerHTML = numberOfLikes;
        likeCounter.innerHTML += " likes";
      });
    const btnContainer = event.currentTarget.parentElement;
    btnContainer.innerHTML = unlikeBtn;
  })
);
