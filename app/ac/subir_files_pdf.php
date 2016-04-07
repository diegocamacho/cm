<?php
$output_dir = "../upload/pdfs/";
if(isset($_FILES["archivo"])){
	$ret = array();
	
//	This is for custom errors;	
/*	$custom_error= array();
	$custom_error['jquery-upload-file-error']="File already exists";
	echo json_encode($custom_error);
	die();
*/
	$error =$_FILES["archivo"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["archivo"]["name"])) //single file
	{
 	 	$fileName = mt_rand(100,999)."_".$_FILES["archivo"]["name"];
 	 	//$fileName2 = base64_encode($fileName);
 		move_uploaded_file($_FILES["archivo"]["tmp_name"],$output_dir.$fileName);
    	$ret[]= $fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["archivo"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = mt_rand(100,999)."_".$_FILES["archivo"]["name"][$i];
	  	//$fileName2 = base64_encode($fileName);
		move_uploaded_file($_FILES["archivo"]["tmp_name"][$i],$output_dir.$fileName);
    	$ret[]= $fileName;
	  }
	
	}
    echo json_encode($ret);
 }