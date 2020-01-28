"use strict";

const searchInput = document.querySelector(".search-form");

if (searchInput) {
  searchInput.addEventListener("input", event => {
    event.preventDefault();

    const search = document.getElementById("search-txt").value;
    console.log(search);
    const resultUl = document.getElementById("search-result");

    fetch(`/app/users/search-user.php?search=${search}`, {
      method: "GET"
    })
      .then(response => {
        return response.json();
      })
      .then(json => {
        resultUl.innerHTML = " ";

        if (event.target.value.length <= 0) {
          resultUl.innerHTML = " ";
        } else {
          json.forEach(user => {
            const username = user.username;
            const id = user.id;
            const avatar = user.profile_avatar;

            let li = document.createElement("li");

            let markUp = `<div class="post-creator">
        <img class="post-profile-picture" src="/uploads/${avatar}" alt="profile picture" loading="lazy">
        <a href="/view-profile.php?user_id=${id}">
            <h3 class="post-username">${username}</h3>
        </a>
      </div> `;

            li.innerHTML = markUp;

            resultUl.appendChild(li);
          });
        }
      });
  });
}
