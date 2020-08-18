<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Timeline application

Application is built on top of Laravel Framework. In this application users can make a posts which are stored in database (Tested on MySQL).

## Project Setup

1. Clone the project
   `git clone https://github.com/SmokeJaguarr/timeline.git`
2. Lets install all necessary Composer Dependencies - cmd write (make sure you are in project directory)
   `composer install`
3. Lets install all necessary NPM Dependecies - in cmd write (make sure you are in project directory)
   `npm install`
4. Create .env file (there is .env.example).
   Create an empty database for our applicatiom and add database name to .env file
   In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD
5. Lets generate Laravel encryption key (make sure you are in project directory)
   `php artisan key:generate`
6. Migrate the Database
   `php artisan migrate`
7. We are ready just start the server
   `php artisan serve`

## Used technologies

-   PHP 7
-   MySQL
-   Bootstramp
-   Vue.js

## Functionality

-   Each user can publish their created post and it will apear in public timeline together with other users published posts
-   Created Laravel Auth system
-   Elequent Database structure with 3 tables - users, posts, post_user
-   User can Create/Edit/Delete/Publish/View their own posts
-   When post is created it will be possible to see it at Myposts ('/myposts') route. (Available only if user is Logged in) There user can see his own posts and there is option to view detailed view/edit/delete
-   When selecting detailed view it is possible to publish the posts. When clicking on "Publish" button will change its colour to green and name to Published. (Vue.js is used)
-   When post is published it will appear at Timeline ('/') route together with other user posts. Posts are ordered ASC by publishing date
-   In ('/') route "Add Post" and "My Posts" buttons will apear only if user have loged in (Manage by PostPolicy)
    Also it is possible to edit/delete
-   There is option to search published posts by users e-mail. Made with simple form Post method

## Models

-   Project contains two models User and Post model.
-   User model is responsible to determen who is owner of posts or who have published post
-   Post model operates with post detailed data and published posts

## Controllers

-   In project is used three main Controllers - MyPostsController, PostsController, PublishController
-   MyPostsController deals only with '/myposts' index view
-   PostsController handles most of Timelines Application logic. Through this controller we create/edit/show/delete... Posts
-   Publish Controller is used to toggle in database if post is published.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## External Resources used

-   For timeline was used "mylastof" Simple Vertical timeline snipper - https://bootsnipp.com/snippets/xrKXW
-   For myposts table with nice show/edit/delete icons was used "cristina" Bootstrap4 Table with Buttons - https://codepen.io/cristinaconacel/pen/dgxqxj

## ManyToMany relationship

-   For training purpouse I used ManyToMany relationship between post and user to determin whether post is published or not. (pivot table was created)

////// Project done by Davis \\\\\\
