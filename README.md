# Laravel Blog API

This is a simple Laravel-based API for managing a blog's categories, tags, posts, images, and user roles and permissions.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Postman Collection](#postman-collection)
- [Contributing](#contributing)
- [License](#license)

## Features

- Create, read, update, and delete categories.
- Create, read, update, and delete tags.
- Create, read, update, and delete blog posts with images.
- Associate tags with blog posts.
- User authentication using Laravel Sanctum.
- Admin role and permission management using Spatie Laravel Permission.

## Requirements

- PHP >= 7.3
- Composer
- Laravel 8.x
- MySQL or other compatible database

## Installation

1. Clone the repository:

   ```sh
   git clone https://github.com/your-username/your-repo-name.git
   
2. Navigate to the project directory:
 ```sh
   cd your-repo-name
```
3. Install the dependencies:
 ```sh
   composer install

```
4. Copy the .env.example file to .env:

 ```sh
cp .env.example .env

```


5. Configure your database settings in the .env file:


 ```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

```
6. Run database migrations and seeders:
 ```sh
php artisan migrate --seed

```
7. Run database migrations and seeders:
 ```sh
php artisan serve

```
## Postman Collection
To test the API endpoints, you can import the provided Postman collection:

Postman Collection : https://www.postman.com/cryosat-operator-11077753/workspace/blog/collection/26878430-258e8240-252e-46df-961c-b3f3e814f323?action=share&creator=26878430
## Contributing
1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them with descriptive messages.
4. Push your changes to your forked repository.
5. Create a pull request to the original repository.
## License
This project is open-source and available under the MIT License.


