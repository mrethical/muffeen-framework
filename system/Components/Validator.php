<?php

namespace Muffeen\Framework\Components;

abstract class Validator
{
    /** @var array */
    protected $errors = array();

    /** @var bool */
    protected $has_errors = false;

    /**
     * Return if errors are detected.
     *
     * @return bool
     */
    public function hasErrors()
    {
        return $this->has_errors;
    }

    /**
     * Get error[s].
     *
     * @param  string $key
     * @return mixed
     */
    public function errors($key = null)
    {
        if ($key) {
            return $this->errors[$key];
        }

        return $this->errors;
    }
}
