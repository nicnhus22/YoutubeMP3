<?php

# 1. Send url and get the files name using getVideoName() and push it into array 
# 2. Call the downloadFile() with the url and the name
# 3. Zip all the file using the create_zip() function passing the array of names

// Get all the video names
$videos_url  = $_POST['videos'];
$videos_name = array();

// Fill the array of names
for($i=0; $i < sizeof($videos_url); $i++){

	if($videos_url[$i] == "")
		continue;

	$name = getVideoName($videos_url[$i]).'.mp3';
	array_push($videos_name, $name);
	downloadFile($videos_url[$i], $name);
}

$zip_collection = create_zip($videos_name,'Mp3Collection.zip');

//BUILD THE FILE INFORMATION
 $file = 'Mp3Collection.zip';

 // //CREATE/OUTPUT THE HEADER
 header("Content-type: application/force-download");
 header("Content-Transfer-Encoding: Binary");
 header("Content-length: ".filesize($file));
 header("Content-disposition: attachment; filename=\"".basename($file)."\"");
 readfile($file);


/* Download the file from a url */
function downloadFile ($url, $name) {

  $newfname = $name;

  try {
  	  $file = fopen ('http://youtubeinmp3.com/fetch/?video='.$url, "rb");
  }catch(Exception $e) {
  	  echo 'Video too long sorry';
  }

  if ($file) {
    $newf = fopen ($newfname, "wb");

    if ($newf)
    while(!feof($file)) {
      fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
    }
  }

  if ($file) {
    fclose($file);
  }

  if ($newf) {
    fclose($newf);
  }
 }


/* Get the video name */
function getVideoName($urlPassed){

	$cut = strrpos($urlPassed, "=");

	$vidID = substr($urlPassed, $cut+1);

	$json_output = file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$vidID."?v=2&alt=json");
	
	$json = json_decode($json_output, true);

	$video_title = $json['entry']['title']['$t'];

    return $video_title;
}


/* creates a compressed zip file */
function create_zip($files = array(),$destination = '',$overwrite = false) {
	//if the zip file already exists and overwrite is false, return false
	if(file_exists($destination) && !$overwrite) { return false; }
	//vars
	$valid_files = array();
	//if files were passed in...
	if(is_array($files)) {
		//cycle through each file
		foreach($files as $file) {
			//make sure the file exists
			if(file_exists($file)) {
				$valid_files[] = $file;
			}
		}
	}
	//if we have good files...
	if(count($valid_files)) {
		//create the archive
		$zip = new ZipArchive();
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			return false;
		}
		//add the files
		foreach($valid_files as $file) {
			echo $file;
			$zip->addFile($file,$file);
		}
		//debug
		//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
		
		//close the zip -- done!
		$zip->close();
		
		//check to make sure the file exists
		return file_exists($destination);
	}
	else
	{
		return false;
	}
}

?>