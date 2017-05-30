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

$create_job = new Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job();

$input = new Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingInput();
$input->setScaleTier('BASIC');
$input->setPackageUris(['gs://drupal-ml/trainer-0.0.0.tar.gz']);
$input->setPythonModule('trainer.task');
$input->setRegion('us-central1');
$input->setJobDir("gs://drupal-ml/out");

$input->setArgs([
    "--train-files" ,
    "gs://drupal-ml/data/adult.data.csv" ,
    "--eval-files" ,
    "gs://drupal-ml/data/adult.test.csv" ,
    "--train-steps" ,
    "1000" ,
    "--verbosity" ,
    "DEBUG"
]);

$create_job->setTrainingInput($input);

/**
echo "<pre>";
    print_r($create_job);
echo "</pre>";
**/

echo "<pre>";
$create_job->setJobId('census12231');



$job = $mlService->projects_jobs->create("projects/magnetic-runway-167209",$create_job);
print_r ($job);
echo "</pre>";
