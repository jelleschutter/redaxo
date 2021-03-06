<?php

/**
 * @package redaxo\structure
 */
class rex_form_widget_linklist_element extends rex_form_element
{
    private $category_id = 0;

    // 1. Parameter nicht genutzt, muss aber hier stehen,
    // wg einheitlicher Konstrukturparameter
    public function __construct($tag = '', rex_form_base $form = null, array $attributes = [])
    {
        parent::__construct('', $form, $attributes);
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function formatElement()
    {
        static $widget_counter = 1;

        $html = rex_var_linklist::getWidget($widget_counter, $this->getAttribute('name'), $this->getValue(), ['category' => $this->category_id]);

        ++$widget_counter;
        return $html;
    }
}
