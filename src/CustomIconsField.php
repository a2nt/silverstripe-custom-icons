<?php

namespace A2nt\CustomIcons;

use SilverStripe\Forms\OptionsetField;

class CustomIconsField extends OptionsetField
{
    public function __construct($name, $title = null, $source = [], $value = null)
    {
        $source = CustomIcon::get()->map('ID', 'CMSThumbnail');
        $source->push('', '(no icon)');

        parent::__construct($name, $title, $source, $value);
    }
}
