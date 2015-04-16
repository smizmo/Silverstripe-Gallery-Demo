<?php
class GalleryPage extends GalleryTreePage {
	private static $many_many = array(
		'GalleryImages' => 'GalleryImage'
	);
	private static $many_many_extraFields=array(
		'GalleryImages'=>array(
			'SortOrder'=>'Int'
		)
	);
	public function getCMSFields() {
		$fields = parent::getCMSFields(); 
		$conf=GridFieldConfig_RelationEditor::create(10);
		$conf->addComponent(new GridFieldSortableRows('SortOrder'));
		$fields->addFieldToTab('Root.Main', new GridField('GalleryImages', _t('GalleryPage.GalleryImages','Gallery Images'), $this->GalleryImages(), $conf));
		return $fields;    
	}
	public function GalleryImages() {
		return $this->getManyManyComponents('GalleryImages')->sort('SortOrder');
	}
	public function getHolderId(){
		return $this->parent()->ID;
	}
	public function ThumbWidth(){
		return $this->parent()->ThumbWidth;
	}
	public function ThumbHeight(){
		return $this->parent()->ThumbHeight;
	}
	public function MenuWidth(){
		return $this->parent()->MenuWidth;
	}
	public function MenuHeight(){
		return $this->parent()->MenuHeight;
	}
	public function FeaturedWidth(){
		return $this->parent()->FeaturedWidth;
	}
	public function FeaturedHeight(){
		return $this->parent()->FeaturedHeight;
	}
	public function FullWidth(){
		return $this->parent()->FullWidth;
	}
	public function FullHeight(){
		return $this->parent()->FullHeight;
	}
	public function MainTitle(){
		return $this->parent()->Title;
	}
	public function SectionTitle(){
		return $this->Title;
	}
	public function GallerySize(){
		return $this->parent()->GallerySize;
	}
}
class GalleryPage_Controller extends GalleryTreePage_Controller {
    public static $allowed_actions = array (
    );
    public function init() {
        parent::init();
    }
	public function PaginatedGalleryImages() {
		$GalleryImages = new PaginatedList($this->dataRecord->GalleryImages(), $this->request);
		$GalleryImages->setPageLength(($this->dataRecord->GallerySize()? $this->dataRecord->GallerySize():$GalleryImages->TotalItems));
		return $GalleryImages;
	}
}