<?php

/**
 * @package redaxo\users
 *
 * @internal
 */
class rex_form_perm_select_element extends rex_form_select_element
{
    protected $checkboxLabel = 'All';

    public function getSaveValue()
    {
        if (false !== strpos($this->getValue(), '|' . rex_complex_perm::ALL . '|')) {
            return rex_complex_perm::ALL;
        }
        return $this->getValue();
    }

    public function setCheckboxLabel($label)
    {
        $this->checkboxLabel = $label;
    }

    /**
     * @return string
     */
    public function get()
    {
        $field = new rex_form_checkbox_element('', $this->table);
        $field->setAttribute('name', $this->getAttribute('name'));
        $field->setAttribute('id', $this->getAttribute('id'));
        if (rex_complex_perm::ALL == trim($this->getValue(), '|')) {
            $field->setValue('|' . rex_complex_perm::ALL . '|');
        }
        $field->addOption($this->checkboxLabel, rex_complex_perm::ALL);
        $this->setAttribute('class', 'form-control');
        return $field->get() . parent::get();
    }
}
