<?php

namespace A2nt\CustomIcons;

use A2nt\CMSNiceties\Forms\GridField\GridFieldConfig_Inline;
use A2nt\CMSNiceties\Forms\GridField\GridFieldConfig_RecordEditor;
use Colymba\BulkUpload\BulkUploader;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_Base;
use SilverStripe\ORM\DataExtension;

class SiteConfigEx extends DataExtension
{
    public function updateCMSFields(FieldList $fields)
    {
        $obj = $this->owner;
        $cfg = GridFieldConfig_RecordEditor::create();
        $cfg->addComponent(new BulkUploader());

        $fields->addFieldToTab(
            'Root.CustomIcons',
            GridField::create(
                'CustomIcons',
                'Custom Icons',
                CustomIcon::get(),
                $cfg
            )
        );
    }
}
