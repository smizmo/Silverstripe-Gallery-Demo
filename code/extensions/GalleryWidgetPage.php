<?php
class GalleryWidgetPageExtension extends DataExtension {
	private static $db = array(
		'FeatureGallery' => 'Boolean',
		'ImageLimit' => 'Int',
		'ThumbWidthFeature' => 'Int',
		'ThumbHeightFeature' => 'Int',		
	);
	private static $defaults = array(
		'FeatureGallery' => false
	);
	private static $has_one = array(
		'GalleryPage' => 'SiteTree'
	);
	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab("Root.GalleryWidget", new CheckboxField("FeatureGallery", 'Feature Galleries'));
		$fields->addFieldToTab("Root.GalleryWidget", new NumericField("ImageLimit", 'Number of Images'));
        $fields->addFieldToTab('Root.GalleryWidget', new TreeDropdownField('GalleryPageID',_t('GalleryPage','Gallery Page'), 'SiteTree'));
		$fields->addFieldToTab("Root.GalleryWidget", new NumericField('ThumbWidthFeature', _t('GallerySettings.ThumbWidth','Thumbnail Width')));
		$fields->addFieldToTab("Root.GalleryWidget", new NumericField('ThumbHeightFeature', _t('GallerySettings.ThumbHeight','Thumbnail Height')));
	}
	public function __construct()
	{
		$moduleDir = basename(dirname(dirname(__DIR__)));
		Requirements::css($moduleDir."/css/gallery.css");
		parent::__construct();
	}
	public function GalleryWidgetImages() {
		if($this->owner->FeatureGallery && $this->owner->ImageLimit && $this->owner->ThumbWidthFeature && $this->owner->ThumbHeightFeature) {
			$page = $this->owner->GalleryPage();
			if(!$page) return '';
			$images = $page->GalleryImages()->limit($this->owner->ImageLimit);
			return $images;
		}
		return '';
	}
	
}