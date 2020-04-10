<?php
/*
* This script loads content from a file setting the header to 
* Access-Control-Allow-Origin: *'
*
* This meets the requirements of the CORS policy.
*
* Access to XMLHttpRequest at 'https://X'' from origin 'http://Y' has been blocked by CORS policy:
*  No 'Access-Control-Allow-Origin' header is present on the requested resource.
*
* You should invoke the script using the POST method. Parameters:
* content_url : the URL that you want to load
* 
*/

# set the http headers
header("Cache-Control: no-cache, must-revalidate");

header('Access-Control-Allow-Origin: *');

# the directory is hardcoded for security
$file_directory='../weewx/json/';


if (isset($_GET['file-name'])) {

    $file_name = ($_GET['file-name']);

    # remove any slashes 
    $file_name = trim($file_name);
    $file_name = stripslashes($file_name);
    
    # concatenate our directory name with out filename
    $file_path = $file_directory . $file_name;

    if (file_exists($file_path)) {
        $file_contents = file_get_contents($file_path, False);
        http_response_code(200);
        echo $file_contents;
    } else {
        http_response_code(404);
        echo "File not found: " , $file_path;
        
    }

    
} else {
    echo "No file-name parameter provided.";
    http_response_code(500);
    exit;

}

?>