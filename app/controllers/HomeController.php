<?php

class HomeController extends Controller {

	public function index() {

		$this->set('title', 'Home');

        $user = UserModel::all();
        $this->set('total_users', count($user));

        $address = AddressModel::all();
        $this->set('total_address', count($address));

        $address_type = AddresTypeModel::all();
        $this->set('address_type', count($address_type));

	}

	public function e404() {
        http_response_code(404);
		die('HTTP: 404 not found.');
	}

}
