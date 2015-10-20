<?php

namespace EValidator;

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/test/components/Application.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
];

(new \yiitest\Application($config))->run();

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

$m = new EValidator([
	['email', 'email']
]);
// $m->setData([
// 	'email' => 'something'
// ]);

$object = new \StdClass;
$object->email = 'something';
$m->setData($object);

/**
* false
*/
var_dump($m->validate());

/**
* array(1) {
*   ["email"]=>
*   array(1) {
*     [0]=>
*     string(35) "Email is not a valid email address."
*   }
* }
*/
var_dump($m->getErrors());



$m->setData([
	'email' => 'something@gmail.com'
]);

/**
* true
*/
var_dump($m->validate());