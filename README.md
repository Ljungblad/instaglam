<img src="https://media.giphy.com/media/3E2PjzNzMVCwrXnXwC/giphy.gif" width="100%">

# Instaglam
Instaglam (Picture This) - An Assignment in web development

## How to use  
1. Download or clone [this directory](https://github.com/Ljungblad/instaglam) with Github Desktop or bash

    `git clone https://github.com/Ljungblad/instaglam`
    
2. Install PHP on your computer if you haven't.

3. Start a local server in the instaglam folder with the command line to open the index.php file in your browser

    `php -S localhost:8888`

5. Create an account and have fun!

## Made with
- PHP
- Javascript
- HTML
- CSS

## Features

- As a user I should be able to create an account.

- As a user I should be able to login.

- As a user I should be able to logout.

- As a user I should be able to edit my account email, password and biography.

- As a user I should be able to upload a profile avatar image.

- As a user I should be able to create new posts with image and description.

- As a user I should be able to edit my posts.

- As a user I should be able to delete my posts.

- As a user I should be able to like posts.

- As a user I should be able to remove likes from posts.


## Testers
* [Julia Karlsson](https://github.com/Juljulia)
* [Maja Alin](https://github.com/majaalin)
* [Terese Thulin](https://github.com/teresethulin)

## License
MIT License

## Author
[Victor Ljungblad](https://github.com/Ljungblad)

## Code Review

by [Thomas Sönnerstam](https://github.com/ThomasSonnerstam)

- feed.php:38, view-profile.php:25, view-post.php:36, 44, create-post.php:10 - You are missing some indentation here and there that could make your code look slightly more readable.
- view-post.php:16 - this div seems a bit obsolete, seeing as “feed-post-article” only contains one div. 
- profile.php:8 - it is a bit unintuitive to have an article tag inside a div tag. Maybe you could flip those around? 
- views/navigation.php: this ul for the menu could use one if-statements instead of the current six. If (isLoggedIn()) to show the li’s necessary and else to show the “logged out” li’s.
- views/login-wall.php: maybe this file could be a function instead? 
- assets/styles/feed.css:80 - maybe the like button could have an .like-btn:active {outline: none} to remove the not-so-fun outline that appears once clicking the like button.
- account.php:16 - it would be nice if the “select a file”-button had a cursor: pointer in its respective CSS-file for accessibility reasons.
- assets/styles/account.css:17-18: you could replace these two lines with a shorthand by using “margin:” instead of using both top and bottom. 
- app/users/upload-profile-picture.php:28-65: This is a very long if-statement. Maybe you could break out some good for better readability? 
- App/users/registration.php & edit.php: when doing prepare statements, you’re using two methods: bindParam and also adding the parameters directly into the execute. Both are fine, but maybe you could stick to using one of the methods. 

Overall very cohesive, readable and well-structured code. Good job! :) 
