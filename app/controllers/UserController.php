<?php

class UserController extends Controller {

	public function index() {

		$this->set('title', 'Usuários');

        $users = UserModel::all();
        foreach ($users as $user) {
            $user->birth_date = Utils::formatDateAndTime($user->birth_date);
            $user->created_at = Utils::formatDateAndTime($user->created_at);
            $user->updated_at = Utils::formatDateAndTime($user->updated_at);
        }
        $this->set('users', $users);
	}

    public function create() {

        $this->set('title', 'Cadastrar usuário');

    }

    public function store() {

        if (!Http::isPost()) {
            return;
        }

        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $birth_date = filter_input(INPUT_POST, 'birth_date', FILTER_SANITIZE_STRING);

        if (empty($first_name) ||
            empty($last_name) ||
            empty($email) ||
            empty($phone) ||
            empty($cpf) ||
            empty($birth_date)) {
            Http::setJsonHeaders();
            $this->set('error', 'erro de validação');
            echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
            die;
        }

        $user = UserModel::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'cpf' => $cpf,
            'birth_date' => Utils::formatDateDB($birth_date),
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
        $this->set('redirect', Config::BASE . 'users');
        echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
        die;
    }

    public function edit($id) {

        $this->setUser($id);

        $this->set('title', 'Editar usuário');

    }

    public function update($id) {

        if (!Http::isPost()) {
            return;
        }

        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $birth_date = filter_input(INPUT_POST, 'birth_date', FILTER_SANITIZE_STRING);

        if (empty($first_name) ||
            empty($last_name) ||
            empty($email) ||
            empty($phone) ||
            empty($cpf) ||
            empty($birth_date)) {
            Http::setJsonHeaders();
            $this->set('error', 'erro de validação');
            echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
            die;
        }

        $user = UserModel::update($id, [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'cpf' => $cpf,
            'birth_date' => Utils::formatDateDB($birth_date),
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
        $this->set('redirect', Config::BASE . 'users');
        echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
        die;
    }

    public function delete($id) {
        UserModel::delete($id);
        Http::setJsonHeaders();
        $this->set('success', 'Registro removido com sucesso!');
        $this->set('redirect', Config::BASE . 'users');
        echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
        die;
    }

    private function setUser($id, $name = 'user') {
        $user = UserModel::find($id);
        $this->set($name, $user);
    }
}
