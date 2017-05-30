<?php
/**
 * Copyright 2016 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

# [START storage_quickstart]
# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Storage\StorageClient;

# Your Google Cloud Platform project ID
$projectId = 'magnetic-runway-167209';

$path = "/Applications/XAMPP/xamppfiles/htdocs/google-key.json";
$key = json_decode(file_get_contents($path), true);


# Available methods: __construct, bucket, buckets, createBucket, 
# registerStreamWrapper, unregisterStreamWrapper


# Instantiates a client
$storage = new StorageClient([
    'projectId' => $projectId,
    'keyFile'=>$key
]);

/**

# buckets
$buckets = $storage->buckets();
foreach ($buckets as $bucket) {
    echo $bucket->name() ."<br/>";
}
**/

$bucketName = "drupal-ml";

$bucket = $storage->bucket($bucketName);

$bucketName = 'drupal-ml';
if($bucket->exists()){
	 echo "already exists";
}else{
	 # createBucket
	 $bucket = $storage->createBucket($bucketName);
	 echo 'Bucket ' . $bucket->name() . ' created.';
}


function listFolderFiles($dir){
	$sub_files = array();
    $ffs = scandir($dir);
    
    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);
    unset($ffs[array_search('.DS_Store', $ffs, true)]);

    // prevent empty ordered elements
    (count($ffs) < 1)  ?: array();

    foreach($ffs as $ff){
        if(is_dir($dir.'/'.$ff)) {
        	$sub_files=array_merge($sub_files,listFolderFiles($dir.'/'.$ff));
        }
        else {
        	#echo $dir.'/'.$ff;
        	array_push($sub_files,$dir.'/'.$ff);
        }
    }

    return $sub_files;
}

function upload_folder($bucket,$root,$files){

	$options = [
	     'metadata' => [
	         'contentLanguage' => 'en'
	     ]
	 ];

	foreach ($files as $file){
		$name = str_replace($root,"",$file);
		$options['name'] = $name;
		$object = $bucket->upload(fopen($file,'r'),$options);
		echo "</br>";
		echo "Uploaded ".$name;
	}

}

$root = "/Applications/XAMPP/xamppfiles/htdocs/quickstart/census/";
$sub = listFolderFiles($root.'data');

upload_folder($bucket,$root,$sub);