<?php

class Route {

	private $controller;

	private $method;

	private $pattern;

	public function __construct($controller, $method, $pattern) {
		$this->controller = $controller;
		$this->method = $method;
		$this->pattern = $pattern;
	}

	public function isMatched($request, &$args) {
		$result = preg_match($this->pattern, $request, $args);
		unset($args[0]);
		$args = array_values($args);
		return $result;
	}

	public function getController() {
		return $this->controller;
	}

	public function getMethod() {
		return $this->method;
	}

	public function getPattern() {
		return $this->pattern;
	}

	public function __toString() {
		return sprintf('%s->%s()', $this->controller, $this->method);
	}
}
