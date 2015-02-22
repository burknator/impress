<?php namespace Impress\Contracts;

interface ValidatableContract
{
    public function getValidationErrors();

    /**
     * @return bool
     */
    public function hasRules();

    /**
     * Get the validation rules for this model.
     *
     * @return null|array
     */
    public function getRules();

    /**
     * @param array $data
     * @return bool
     */
    public function isValidWith(array $data);
}