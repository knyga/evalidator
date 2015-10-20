<?php

namespace EValidator;

class EValidator extends \yii\base\Model {
	private $_attributes = [];
	private $_rules = [];

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
        return $this->_attributes[$name];
    }
}