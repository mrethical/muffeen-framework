<?php

function array_get($array, $key) {
	if (array_key_exists($key, $array)) {
		return $array[$key];
	}
	return null;
}