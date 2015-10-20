<?php

namespace EValidator\Test;

use EValidator\EValidator;

require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
class Application extends \yii\console\Application {
	public function runAction($route, $params = []) {
		return false;
	}
}

class EValidatorTest extends \PHPUnit_Framework_TestCase {
	protected function createApp() {
		$config = [
		    'id' => 'basic',
		    'basePath' => dirname(__DIR__),
		];

		(new Application($config))->run();
	}

	protected function setUp() {
		$this->createApp();
	}

    public function testIntegratedEmailValidatorFromArray() {
		$validator = new EValidator([
			['email', 'email']
		]);
		$validator->setData([
			'email' => 'something'
		]);

		$this->assertFalse($validator->validate());

		$validator->setData([
			'email' => 'something@gmail.com'
		]);

		$this->assertTrue($validator->validate());
    }

    public function testIntegratedEmailValidatorFromObject() {
		$validator = new EValidator([
			['email', 'email']
		]);

		$odata = new \StdClass;
		$odata->email = 'something';
		$validator->setData($odata);

		$this->assertFalse($validator->validate());

		$odata->email = 'something@gmail.com';
		$validator->setData($odata);

		$this->assertTrue($validator->validate());
    }
}