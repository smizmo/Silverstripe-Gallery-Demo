<?php
class GalleryImage extends DataObject {
  public static $db = array(  
      'Title' => 'Varchar',
  );
  public static $has_one = array(
    'Image' => 'Image',
  );
   public static $belongs_many_many = array(
    'GalleryPages' => 'GalleryPage'
  );
  public function getCMSFields() {
    $fields = parent::getCMSFields();
    return $fields;    
  }
   public static $summary_fields = array(
    'ID' => 'ID',
    'Title' => 'Title',
    'Thumbnail' => 'Thumbnail'    
   );
   public function getThumbnail() {
     return $this->Image()->CMSThumbnail();
  }

}