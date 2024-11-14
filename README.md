# Beliven Fullstack Senior exercise

This is my repo for the fullstack senior exercise done in Laravel and Blade.

I have created and started this project using [Laravel Herd](https://herd.laravel.com/). I recommend to use Laravel Herd to use this project locally.

## Commands
To operate this project please follow this list:

1. Create a new .env file from the .env.example file

2. Use his command migrate the database and seeds it:
````
php artisan game:prepare
````

This command create a test user with this credentials:
Email: test@test.com
Password: password

3. Use this command for start broadcasting:
````
php artisan reverb:start
````

4. Use this command for starting the queue:
````
php artisan queue:work
````

5. Finally use this command to start the game:
````
npm run dev
````

Now in your browser you can access the website from http://fullstack-senior-exercise.test/.

___
## Known errors or defects
1. Hamburger menu from the exercise text is missing
2. Hiring an employee from HR page do not refresh HR employees list (delete an employee does)
3. There is no game over screen: the game proceed removing money every 10 seconds even when under 0€
