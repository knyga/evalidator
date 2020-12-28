<?php

namespace EValidator;

class EValidator extends \yii\base\Model {
	private array $_attributes = [];
	private array $_rules = [];
	protected array $_labels = [];

	public function __construct($rules) {
		$this->_rules = $rules;
		parent::__construct();
	}

	public function rules() {
		return $this->_rules;
	}

	public function setData($attributes) {
		$this->_attributes = (array)$attributes;
	}

	public function __get($name)
	{
		return isset($this->_attributes[$name]) ? $this->_attributes[$name] : null;
	}

	public function setAttributeLabels(array $labels)
	{
		$this->_labels = $labels;
	}

	public function getAttributeLabel($attribute): string
	{
		return $this->_labels[$attribute] ?? parent::getAttributeLabel($attribute);
	}
}