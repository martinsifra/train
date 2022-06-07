<?php declare(strict_types=1);

define('OK', 'OK');
define('FAILED', 'FAILED');


require '../vendor/autoload.php';


function carriageToString(\Train\Carriage $carriage): string {
	$previous = $carriage->previous() === NULL ? 'null' : $carriage->previous()->order();
	$current = $carriage->order();
	$next = $carriage->next() === NULL ? 'null' : $carriage->next()->order();

	return sprintf('%s|%s|%s', $previous, $current, $next);
}


function testUnsorted()
{
	echo 'TEST: Unsorted', PHP_EOL;
	$train = new \Train\Train(new \Train\Sort\Unsorted());
	$train
		->attach(new \Train\Carriage\Coach(42))
		->attach(new \Train\Carriage\Coach(10))
		->attach(new \Train\Carriage\Coach(5))
		->attach(new \Train\Carriage\Coach(13))
	;

	$fortyTwo = $train->head();
	echo carriageToString($fortyTwo) === 'null|42|10' ? OK : FAILED, PHP_EOL;

	$ten = $fortyTwo->next();
	echo carriageToString($ten) === '42|10|5' ? OK : FAILED, PHP_EOL;

	$five = $ten->next();
	echo carriageToString($five) === '10|5|13' ? OK : FAILED, PHP_EOL;

	$thirteen = $five->next();
	echo carriageToString($thirteen) === '5|13|null' ? OK : FAILED, PHP_EOL;

	$tail = $train->tail();
	echo carriageToString($tail) === '5|13|null' ? OK : FAILED, PHP_EOL;
}


function testAscending()
{
	echo 'TEST: Ascending', PHP_EOL;
	$train = new \Train\Train(new \Train\Sort\Ascending());
	$train
		->attach(new \Train\Carriage\Coach(42))
		->attach(new \Train\Carriage\Coach(10))
		->attach(new \Train\Carriage\Coach(5))
		->attach(new \Train\Carriage\Coach(13))
		->attach(new \Train\Carriage\Coach(50))
	;

	$five = $train->head();
	echo carriageToString($five) === 'null|5|10' ? OK : FAILED, PHP_EOL;

	$ten = $five->next();
	echo carriageToString($ten) === '5|10|13' ? OK : FAILED, PHP_EOL;

	$thirteen = $ten->next();
	echo carriageToString($thirteen) === '10|13|42' ? OK : FAILED, PHP_EOL;

	$fortyTwo = $thirteen->next();
	echo carriageToString($fortyTwo) === '13|42|50' ? OK : FAILED, PHP_EOL;

	$fifty = $fortyTwo->next();
	echo carriageToString($fifty) === '42|50|null' ? OK : FAILED, PHP_EOL;

	$head = $train->head();
	echo carriageToString($head) === 'null|5|10' ? OK : FAILED, PHP_EOL;

	$tail = $train->tail();
	echo carriageToString($tail) === '42|50|null' ? OK : FAILED, PHP_EOL;
}



// Tests
testUnsorted();
testAscending();


return 0;
