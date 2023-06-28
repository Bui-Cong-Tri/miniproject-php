# PHP MVC demo

## Required
- Git
- MySQL
- PHP
- Apache

## Setup:
- Clone this repository
- Create database:

*Table 1: employees*

| table_name       | employees |
|----------|---------------------|
| id       | int(Auto-increment) |
| code     | text                |
| name     | text                |
| mobile   | text                |
| email    | text                |
| address  | text                |
| password | text                |

*Table 2: customers*

| table_name       | customers |
|----------|---------------------|
| id       | int(Auto-increment) |
| code     | text                |
| name     | text                |
| mobile   | text                |
| email    | text                |
| address  | text                |

- Change database's info (db_name, username, password) in `models/db_connect.php` and `models/Connect.php`
- Run project with url: `http://localhost/mvc`
