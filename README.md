
## Running the project

Enter the laravel project directory with
```bash
  cd backend
```

First install the necessary dependencies in the laravel project by running

```bash
  composer install
```

The project is set up to run with MySQL database. It includes the .env file where you can change the database attributes to your local database.

Once you have the database set up run the database migrations with
```bash
  php artisan migrate:fresh
```

Run the project with

```bash
  php artisan serve
```

In the console you can see the port that the application is running on your local machine.
You are free to interact with the api endpoints defined in backend/routes/api.php
To see all available api endpoints you can run
```bash
  php artisan route:list
```

Now to run the frontend React application enter the frontend folder with
```bash
  cd frontend
```

Install dependencies with
```bash
  npm install
```

Check what port the backend is running on and in the ProjectList.jsx component in the fetch api call replace the port with the correct one that your machine uses.

Start the project with
```bash
  npm start
```