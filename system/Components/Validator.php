<?php

namespace Muffeen\Framework\Components;

abstract class Validator
{
	protected $errors = array();
	protected $has_errors = false;

	public function hasErrors()
	{
		return $this->has_errors;
	}

	public function errors($key = null)
	{
		if ($key) {
			return $this->errors[$key];
		}
		return $this->errors;
	}
}