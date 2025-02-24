<?php
include("setting/global.php");
if(isset($_FILES['upload'])){
   
        $filen = $_FILES['upload']['tmp_name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if($ext=='pdf')
		{ 
        $con_file = PAGE_UP_DOCUMENT_PATH.create_filename(md5(rand()).$_FILES['upload']['name']);
        move_uploaded_file($filen, $con_images );
		}
		else if( $ext=='jpeg' || $ext=='jpg' || $ext=='png' || $ext=='gif')
		{ 
        $con_file = PAGE_UP_IMAGE_PATH.create_filename(md5(rand()).$_FILES['upload']['name']);
        move_uploaded_file($filen, $con_images );
		}
       $url = WEB_SITE_PATH.$con_images;

   $funcNum = $_GET['CKEditorFuncNum'] ;
   // Optional: instance name (might be used to load a specific configuration file or anything else).
   $CKEditor = $_GET['CKEditor'] ;
   // Optional: might be used to provide localized messages.
   $langCode = $_GET['langCode'] ;
    
   // Usually you will only assign something here if the file could not be uploaded.
   $message = '';
   echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
}
?>