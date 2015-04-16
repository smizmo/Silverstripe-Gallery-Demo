<?php
class GalleryTreePage extends Page {
    private static $db = array(
	);
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		return $fields;
	}
	public function getHolderId(){
		return $this->ID;
	}
}
class GalleryTreePage_Controller extends Page_Controller {
    public function init() {
        parent::init();
		$moduleDir = basename(dirname(__DIR__));
		Requirements::css($moduleDir."/css/gallery.css");
		Requirements::javascript($moduleDir."/javascript/gallery.js");
    }
}