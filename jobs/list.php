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
require '../vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=/Applications/XAMPP/xamppfiles/htdocs/google-key.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope(Google_Service_CloudMachineLearningEngine::CLOUD_PLATFORM);
$mlService = new Google_Service_CloudMachineLearningEngine($client);

$jobs = $mlService->projects_jobs->listProjectsJobs('projects/magnetic-runway-167209');

print("Get all the jobs in the projects</br>");

for ($i=0; $i < sizeof($jobs); $i++){
	echo ($jobs->jobs[$i]['jobId']);
	echo "</br>";
}