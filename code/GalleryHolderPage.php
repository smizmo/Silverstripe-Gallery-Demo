<?php
class GalleryHolderPage extends GalleryTreePage {
    private static $db = array(
		'ThumbWidth' => 'Int',
		'ThumbHeight' => 'Int',
		'MenuWidth' => 'Int',
		'MenuHeight' => 'Int',	
		'FeaturedWidth' => 'Int',
		'FeaturedHeight' => 'Int',
		'FullWidth' => 'Int',
		'FullHeight' => 'Int',
		'DefaultSubHeading' => 'Varchar',
		'GallerySize' => 'Int',
	);
    private static $allowed_children = array('GalleryPage');
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		return $fields;
	}
	public function getSettingsFields() {
		$fields = parent::getSettingsFields();

		$fields->addFieldToTab("Root.Settings", new NumericField('ThumbWidth', _t('GallerySettings.ThumbWidth','Thumbnail Width')));
		$fields->addFieldToTab("Root.Settings", new NumericField('ThumbHeight', _t('GallerySettings.ThumbHeight','Thumbnail Height')));
		$fields->addFieldToTab("Root.Settings", new NumericField('MenuWidth',  _t('GallerySettings.MenuWidth','Menu Icon Width')));
		$fields->addFieldToTab("Root.Settings", new NumericField('MenuHeight',  _t('GallerySettings.MenuHeight','Menu Icon Height')));
		$fields->addFieldToTab("Root.Settings", new NumericField('FeaturedWidth',  _t('GallerySettings.FeaturedWidtht','Featured Image Width')));
		$fields->addFieldToTab("Root.Settings", new NumericField('FeaturedHeight',  _t('GallerySettings.FeaturedHeight','Featured Image Height')));
		$fields->addFieldToTab("Root.Settings", new NumericField('FullWidth',  _t('GallerySettings.FullWidth','Full Image Width')));
		$fields->addFieldToTab("Root.Settings", new NumericField('FullHeight',  _t('GallerySettings.FullHeight','Full Image Height')));		
		$fields->addFieldToTab("Root.Settings", new TextField('DefaultSubHeading',  _t('GallerySettings.DefaultSubHeading','Default Sub Heading')));	
		$fields->addFieldToTab("Root.Settings", new TextField('GallerySize',  _t('GallerySettings.GallerySize','Gallery Pagination Size')));	

		return $fields;
	}
	private static $defaults = array ('GallerySize' => 10);
	public function getAllGalleryImages(){
		$images = ArrayList::create();
		foreach($this->data()->Children() as $Child){
			$images->merge($Child->GalleryImages());
		}
		return $images;
	}
	public function getHolderId(){
		return $this->ID;
	}
	public function MainTitle(){
		return $this->Title;
	}
	public function SectionTitle(){
		return $this->DefaultSubHeading;
	}
	public function GalleryImages() {
		return $this->getAllGalleryImages();
	}
	public function GallerySize(){
		return $this->GallerySize;
	}
}
class GalleryHolderPage_Controller extends GalleryTreePage_Controller {
	public function PaginatedGalleryImages() {
		$GalleryImages = new PaginatedList($this->dataRecord->GalleryImages(), $this->request);
		$GalleryImages->setPageLength(($this->dataRecord->GallerySize()? $this->dataRecord->GallerySize():$GalleryImages->TotalItems));
		return $GalleryImages;
	}
}