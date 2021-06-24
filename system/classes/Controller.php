<?php

abstract class Controller {

	private $data = [];

	abstract public function index();

	protected function set($key, $value) {
		$this->data[$key] = $value;
	}

	public function getData() {
		return $this->data;
	}

	public function __pre() {}

	public function __post() {}

}
