# BanguBank

BanguBank is a simple banking application with features for both 'Admin' and 'Customer' users. It's a HTML template starter pack for Laravel Career Path by Interactive Cares students.

### Admin Features

- See all transactions made by all users.
- Search and view transactions by a specific user using their email.
- View a list of all registered customers.

### Customer Features

- Customers can register using their `name`, `email`, and `password`.
- Customers can log in using their registered email and password.
- See a list of all their transactions.
- Deposit money to their account.
- Withdraw money from their account.
- Transfer money to another customer's account by specifying their email address.
- See the current balance of their account.

## Installation

Clone the repository to your local machine (branch `bagubank`):

```bash
git clone -b bangubank https://github.com/kamruleu/laravel-career-path.git
```

```bash
cd laravel-career-path
```

## Usage web app

1. After clone the app and open `index.php` file.
2. Update project name `$project_name = "/laravel-career-path"` replace the `laravel-career-path` to your `project-name`;
3. Open `config.php` file and update `host`, `dbname`, `user` and `password`.
4. Migration the project to use this command bellow:

```bash
php migration.php
```

## Usage CLI app

1. Open cli project to use this command bellow:

```bash
php cli.php
```

2. To create admin to use this command below:

```bash
php create-admin.php
```
