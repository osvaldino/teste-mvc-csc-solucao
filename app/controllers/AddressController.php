<?php

class AddressController extends Controller {

    public function index(){}

	public function listar($user_id) {

		$this->set('title', 'Endereços');
		$this->set('user_id', $user_id);

        $address = AddressModel::all();
        foreach ($address as $a) {
            $a->type = AddresTypeModel::find($a->address_type_id);
            $a->created_at = Utils::formatDateAndTime($a->created_at);
            $a->updated_at = Utils::formatDateAndTime($a->updated_at);
        }
        $this->set('address', $address);
	}

    public function create($user_id) {

        $types = AddresTypeModel::all();

        $this->set('types', $types);
        $this->set('user_id', $user_id);
        $this->set('title', 'Cadastrar Endereço');

    }

    public function store($user_id) {

        $this->set('user_id', $user_id);

        if (!Http::isPost()) {
            return;
        }

        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
        $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
        $district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
        $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
        $address_type_id = filter_input(INPUT_POST, 'address_type_id', FILTER_SANITIZE_NUMBER_INT);
        $complement = filter_input(INPUT_POST, 'complement', FILTER_SANITIZE_STRING);

        if (empty($zipcode) ||
            empty($street) ||
            empty($district) ||
            empty($city) ||
            empty($state) ||
            empty($number) ||
            empty($address_type_id)) {
            Http::setJsonHeaders();
            $this->set('error', 'erro de validação');
            echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
            die;
        }

        $address = AddressModel::create([
            'zipcode' => Utils::removeMaskZipCode($zipcode),
            'street' => $street,
            'district' => $district,
            'city' => $city,
            'state' => $state,
            'number' => $number,
            'complement' => $complement,
            'address_type_id' => (int) $address_type_id,
            'user_id' => (int) $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if (!$address) {
            Http::setJsonHeaders();
            $this->set('error', 'Erro ao criar o registro. Tente novamente.');
            echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
            die;
        }

        Http::setJsonHeaders();
        $this->set('success', 'Registro inserido com sucesso!');
        $this->set('redirect', Config::BASE . $user_id . '/address');
        echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
        die;
    }

    public function edit($user_id, $id) {

        $types = AddresTypeModel::all();

        $this->set('types', $types);
        $this->set('user_id', $user_id);
        $this->setAddress($id);

        $this->set('title', 'Editar enderço');

    }

    public function update($user_id, $id) {

        if (!Http::isPost()) {
            return;
        }

        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
        $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
        $district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
        $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
        $address_type_id = filter_input(INPUT_POST, 'address_type_id', FILTER_SANITIZE_NUMBER_INT);
        $complement = filter_input(INPUT_POST, 'complement', FILTER_SANITIZE_STRING);

        if (empty($zipcode) ||
            empty($street) ||
            empty($district) ||
            empty($city) ||
            empty($state) ||
            empty($number) ||
            empty($address_type_id)) {
            Http::setJsonHeaders();
            $this->set('error', 'erro de validação');
            echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
            die;
        }

        $address = AddressModel::update($id, [
            'zipcode' => Utils::removeMaskZipCode($zipcode),
            'street' => $street,
            'district' => $district,
            'city' => $city,
            'state' => $state,
            'number' => $number,
            'complement' => $complement,
            'address_type_id' => (int) $address_type_id,
            'user_id' => (int) $user_id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if (!$address) {
            Http::setJsonHeaders();
            $this->set('error', 'Erro ao criar o registro. Tente novamente.');
            echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
            die;
        }

        Http::setJsonHeaders();
        $this->set('success', 'Registro atualizado com sucesso!');
        $this->set('redirect', Config::BASE . $user_id . '/address');
        echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
        die;
    }

    public function delete($user_id, $id) {
        AddressModel::delete($id);
        Http::setJsonHeaders();
        $this->set('success', 'Registro removido com sucesso!');
        $this->set('redirect', Config::BASE . $user_id . '/address');
        echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
        die;
    }

    private function setAddress($id, $name = 'address') {
        $address = AddressModel::find($id);
        $this->set($name, $address);
    }
}
