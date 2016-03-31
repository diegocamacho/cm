<?php
require(dirname(__FILE__) . '/plugins/uploader/Uploader.php');
sleep(5);
// Directory where we're storing uploaded images
// Remember to set correct permissions or it won't work
$upload_dir = 'facturacion/csd/';

$uploader = new FileUpload('uploadfile');

// Handle the upload
$result = $uploader->handleUpload($upload_dir);

if (!$result) {
  exit(json_encode(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
}

echo json_encode(array('success' => true));
