<p align="center">
	<img src="assets/img/logo.png" alt="PHP MVC Boilerplate">
</p>

# Overview

PHP MVC boilerplate with user authentication, basic security and MySQL CRUD operations.
Framework was developed during the final year of university. It was used for some private projects, however I highly suggest you to use Laravel or some other popular framework for your work.

## Requirements

- **Web server:** Apache with mod_rewrite enabled
- **Database server:** MySQL
- PHP 7.x

## CRUD operations

Each database table should have appropriate model file. For example, table `tasks` have `app/models/TaskModel.php`. There you need to hardcode table name in protected `$tableName` property and eventually add new functions. Provided functions with basic model are:

- read
- readAll
- create
- update
- delete

## Router

All routes should be placed inside `routes.php`. Each route must have following properties:

- Name of the controller whom the route belongs to
- Name of the controller's method (the route callback)
- Request URI, represented via PCRE

For example, if we have following code:

```
new Route('Home', 'index', '|^/?$|'),
```

it means that when user visits URI which matched RegEx `|^/?$|`, `index.php` will instantiate `HomeController.php` and call his `index` method.

### RegEx cheat sheet

Route                    | Regex
:------------------------|:-------------------
`/`                      | \|^/?$\|
`users/`                 | \|^users/?$\|
`users/create/`          | \|^users/create/?$\|
`users/update/15/`       | \|^users/update/([0-9]+)/?$\|
`users/delete/4/`        | \|^users/delete/([0-9]+)/?$\|
`store/iphone-8-64gb/`   | \|^store/([a-z0-9]+(?:\\-[a-z0-9]+)*)/?$\|
Anything                 | \|^.*$\|
