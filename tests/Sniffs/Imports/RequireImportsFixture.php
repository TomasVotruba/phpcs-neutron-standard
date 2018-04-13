<?php

namespace CAR_APP\Vehicles;

use Physics\MovementType;
use function Roads\getSpeedLimit;
use function monitor_begin;
use function Physics\{
	setMoving,
	setStopped
};
use CAR_APP_GLOBALS;
use WeatherStore;
use WeatherModels\Storm;
use const Weather\SNOW;
use const Weather\{RAIN};

const TYPE = 'Car';

class Car {
	public function drive() {
		// next line has unimported function
		$currentWeather = getWeather();
		if ($currentWeather === SNOW) {
			// next line has unimported class
			return new DrivingProblem('weather is too harsh');
		}
		if ($currentWeather === RAIN) {
			// next line has unimported class
			return new DrivingProblem('weather is too harsh');
		}
		// next line has unimported const
		if ($currentWeather === SUN) {
			// next line has unimported class
			if (DataStore::readyToMark()) {
				WeatherStore::markGoodDay();
			}
		}
		if ($currentWeather instanceof Storm) {
			return false;
		}
		// next line has unimported class
		if ($currentWeather instanceof Drizzle) {
			throw new Exception();
		}
		if (getSpeedLimit() < 1) {
			// next line has unimported class
			return new DrivingProblem('no speed limit');
		}
		setMoving(TYPE, true);
		// next line has an explicit namespace call
		\Physics\setMoving(TYPE, 'drive');
		startMonitor();
		$data = new stdClass(PHP_VERSION);
		$store = new WeatherStore($data);
		$store->trackWeather($store->key);
		$name = $store->current_name_as_string;
		return new MovementType('driving in ' . $name);
	}
}

function startMonitor() {
	new Car();
	echo str_replace('Foo', 'Bar', 'Foobar...');
	monitor_begin();
}
