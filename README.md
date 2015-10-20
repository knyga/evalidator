See tests.

```php
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
```