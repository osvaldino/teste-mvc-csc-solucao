<?php

return [

	// HomeController
	new Route('Home', 'index', '|^/?$|'),

	// UserController
	new Route('User', 'index', '|^users/?$|'),
	new Route('User', 'create', '|^users/create/?$|'),
	new Route('User', 'store', '|^users/store/?$|'),
    new Route('User', 'edit', '|^users/edit/([0-9]+)/?$|'),
    new Route('User', 'update', '|^users/update/([0-9]+)/?$|'),
	new Route('User', 'delete', '|^users/delete/([0-9]+)/?$|'),

    // AddressController
	new Route('Address', 'listar', '|^([0-9])/address/?$|'),
	new Route('Address', 'create', '|^([0-9])/address/create/?$|'),
	new Route('Address', 'store', '|^([0-9])/address/store/?$|'),
    new Route('Address', 'edit', '|^([0-9])/address/edit/([0-9]+)/?$|'),
    new Route('Address', 'update', '|^([0-9])/address/update/([0-9]+)/?$|'),
	new Route('Address', 'delete', '|^([0-9])/address/delete/([0-9]+)/?$|'),

    // TypeAddressController
    new Route('TypeAddress', 'index', '|^type-adress/?$|'),
    new Route('TypeAddress', 'create', '|^type-adress/create/?$|'),
    new Route('TypeAddress', 'store', '|^type-adress/store/?$|'),
    new Route('TypeAddress', 'edit', '|^type-adress/edit/([0-9]+)/?$|'),
    new Route('TypeAddress', 'update', '|^type-adress/update/([0-9]+)/?$|'),
    new Route('TypeAddress', 'delete', '|^type-adress/delete/([0-9]+)/?$|'),


	// 404 - Not Found
	new Route('Home', 'e404', '|^.*$|'),
];
