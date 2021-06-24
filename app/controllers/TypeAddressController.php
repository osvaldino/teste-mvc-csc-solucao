<?php

class TypeAddressController extends Controller {

	public function index() {

		$this->set('title', 'Tipos de endereço');

        $type = AddresTypeModel::all();
        foreach ($type as $a) {
            $a->created_at = Utils::formatDateAndTime($a->created_at);
            $a->updated_at = Utils::formatDateAndTime($a->updated_at);
        }
        $this->set('type', $type);
	}

    public function create() {

        $this->set('title', 'Cadastrar Tipo de endereço');

    }

    public function store() {

        if (!Http::isPost()) {
            return;
        }

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

        if (empty($name)) {
            Http::setJsonHeaders();
            $this->set('error', 'erro de validação');
            echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
            die;
        }

        $user = AddresTypeModel::create([
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if (!$user) {
            Http::setJsonHeaders();
            $this->set('error', 'Erro ao criar o registro. Tente novamente.');
            echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
            die;
        }

        Http::setJsonHeaders();
        $this->set('success', 'Registro inserido com sucesso!');
        $this->set('redirect', Config::BASE . 'type-adress');
        echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
        die;
    }

    public function edit($id) {

        $this->setType($id);

        $this->set('title', 'Editar tipo de endereço');

    }

    public function update($id) {

        if (!Http::isPost()) {
            return;
        }

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

        if (empty($name)) {
            Http::setJsonHeaders();
            $this->set('error', 'erro de validação');
            echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
            die;
        }

        $user = AddresTypeModel::update($id, [
            'name' => $name,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if (!$user) {
            Http::setJsonHeaders();
            $this->set('error', 'Erro ao criar o registro. Tente novamente.');
            echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
            die;
        }

        Http::setJsonHeaders();
        $this->set('success', 'Registro atualizado com sucesso!');
        $this->set('redirect', Config::BASE . 'type-adress');
        echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
        die;
    }

    public function delete($id) {
        AddresTypeModel::delete($id);
        Http::setJsonHeaders();
        $this->set('success', 'Registro removido com sucesso!');
        $this->set('redirect', Config::BASE . 'type-adress');
        echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
        die;
    }

    private function setType($id, $name = 'type') {
        $type = AddresTypeModel::find($id);
        $this->set($name, $type);
    }
}
