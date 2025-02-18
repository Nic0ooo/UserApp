# USER APP on Laravel

## Requirments to use

### Database config

To use on Mamp, you must re-configure the BDD Conifugration on .env ()

Atcually **DB_PORT=8889**
Because on my mamp MySQL port is 8889

### How to launch App

```bash
# To start Laravel Server
php artisan serve 

# To aliment Database with demonstration Data
php artisan migrate

php artisan db:seed
```
After you can launch http://127.0.0.1:8000/login

----------------------------------------------------------------

#### Demonstration Data

To connect to the app with the **User 1** use:

email: guillandnicolas@icloud.com

password: azerty123

To connect to the app with the **User 2** use:

email: tompaya@demo.com

password: password123

----------------------------------------------------------------

### Technical Documentation

- Usage of Laravel to facilitate the MVC organisation of the project
  
#### MVC organization

- **Models** are created to represent entities of the BDD
  
- **Views** are created to display data and interfaces for users (AI used to improve the visuals of views

- **Controllers** are created to contains logical and to control interaction between model and view
  
#### Authentication

- Authentication (AuthController.php) → Manages login, registration and logout.

- Middleware (RedirectIfAuthenticated.php) → Redirects logged-in users to /tasks when they try to access /login or /register.

- Protecting Routes (auth middleware) → Ensures tasks pages are accessible only to authenticated users.

- To the demonstration usage of Seeder to aliment the database with 2 users and many tasks for each user
  
  ##### Implementing Laravel Session Management to keep users connections

- Session Handling (Auth::attempt()) → Logs users in and remembers their session.

- Logout (Auth::logout()) → Destroys session data.

#### Database management

- Eloquent ORM → Uses hasMany() and belongsTo() to define relationships between User and Task.

- Seeders & Factories (php artisan db:seed) → Pre-populate the database for testing and demo purposes.

----------------------------------------------------------------

## Git commands

- Create a new Git repository

### Initialize the repo

```bash
git init
```

### Add files to the repository

```bash
git add .
```

### Commit for the first time

```bash
git commit -m "first commit"
```

### Create the main branch

```bash
git branch -M main
```

### Add origin remote access to the repository

```bash
git remote add origin https://github.com/Nic0ooo/UserApp.git
```

### Push to the main branch

```bash
git push -u origin main
```
