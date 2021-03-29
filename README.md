Set up project by:
-cloning the repository

-running composer install

-Setting up a mySQL database

-Migrating the database and project together


## Installation

Clone the repository-
```
git clone https://github.com/soojung96/mfourproject.git
```

Then cd into the folder with this command-
```
cd laravel-todo
```

Then do a composer install
```
composer install
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `db` through mySQL and then do a database migration using this command-
```
php artisan migrate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.