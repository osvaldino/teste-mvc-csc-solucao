<?php

abstract class Model {

	protected static $tableName = null;

	protected static function getTableName() {
		if (!empty(static::$tableName)) {
			return static::$tableName;
		}

		ob_clean();
		die('MODEL: Table name not defined.');
	}

	public static function All() {
		$tableName = sprintf('`%s`', self::getTableName());

		$sql = "SELECT * FROM $tableName;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->execute();

		return $pst->fetchAll();
	}

	public static function find($id) {
		$tableName = sprintf('`%s`', self::getTableName());

		$sql = "SELECT * FROM $tableName WHERE `id` = ?;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, intval($id), PDO::PARAM_INT);
		$pst->execute();

		return $pst->fetch();
	}

	public static function create($data) {
		$tableName = sprintf('`%s`', self::getTableName());
		$fields = $placeholders = $values = [];

		if (!is_array($data) || empty($data)) {
			die('MODEL: Bad input for create.');
		}

		foreach ($data as $field => $value) {
			$fields[] = "`$field`";
			$values[] = $value;
			$placeholders[] = '?';
		}

		$fields = '(' . implode(', ', $fields) . ')';
		$placeholders = '(' . implode(', ', $placeholders) . ')';

		$sql = "INSERT INTO $tableName $fields VALUES $placeholders;";
		$pst = DB::getInstance()->prepare($sql);

		if (!$pst) {
			return false;
		}

		if (!$pst->execute($values)) {
			return false;
		}

		return DB::getInstance()->lastInsertId();
	}

	public static function update($id, $data) {
		$tableName = sprintf('`%s`', self::getTableName());
		$fields = $values = [];

		if (!is_array($data) || empty($data)) {
			ob_clean();
			die('MODEL: Bad input for update.');
		}

		foreach ($data as $field => $value) {
			$fields[] = "`$field` = ?";
			$values[] = $value;
		}

		$fields = implode(', ', $fields);
		$values[] = intval($id);

		$sql = "UPDATE $tableName SET $fields WHERE `id` = ?;";
		$pst = DB::getInstance()->prepare($sql);

		if (!$pst) {
			return false;
		}

		return $pst->execute($values);
	}

	public static function delete($id) {
		$tableName = sprintf('`%s`', self::getTableName());

		$sql = "DELETE FROM $tableName WHERE `id` = ?;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, intval($id), PDO::PARAM_INT);

		return $pst->execute();
	}

	private function __construct() {}

}
