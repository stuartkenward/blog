# Blog
This Laravel project was made as part of the Web Development module at Swansea University.

The project goals were to:
 - Create, edit, and delete blog posts.
 - Create, edit, and delete comments on blog posts.
 - Have multiple levels of user authorization.

#Run Project

Clone the repository

```sh
git clone git@github.com:stukenward/blog.git
```

Switch to the repo folder
```sh
cd blog
```
Install all the dependencies using composer
```sh
composer install
```
Generate a new application key
```sh
php artisan key:generate
```
Generate a new JWT authentication secret key
```sh
php artisan jwt:generate
```
Run the database migrations (Set the database connection in .env before migrating)
```sh
php artisan migrate
```
Start the local development server
```sh
php artisan serve
```
You can now access the server at http://localhost:8000
