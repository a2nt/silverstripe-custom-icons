<?php

namespace A2nt\CustomIcons;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\Parsers\HTMLValue;

class CustomIcon extends DataObject
{
    private static $table_name = 'A2nt-CustomIcon';

    private static $db = [
        'Title' => 'Varchar(255)',
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $summary_fields = [
        'CMSThumbnail' => 'Icon',
        'Title' => 'Title',
    ];

    private static $searchable_fields = [
        'Title',
    ];

    private static $owns = [
        'Image',
    ];

    public function CMSThumbnail()
    {
        $thumb = $this->Image();
        if (!$thumb->ID) {
            return;
        }

        return HTMLValue::create('<img src="'.$thumb->CMSThumbnail()->Link().'" loading="lazy" alt="'.$this->Title.'" />');
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $img = $this->Image();
        if (!$this->Title && $img) {
            $this->Title = $img->Title;
        }
    }

    public function onBeforeDelete()
    {
        $img = $this->Image();
        if ($img) {
            $img->delete();
        }

        parent::onBeforeDelete();
    }
}
