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
require 'vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=/Applications/XAMPP/xamppfiles/htdocs/google-key.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope(Google_Service_CloudMachineLearningEngine::CLOUD_PLATFORM);
$mlService = new Google_Service_CloudMachineLearningEngine($client);


$model = new Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Model();
$model->setName("census1000");
$created_model = $mlService->projects_models->create("projects/magnetic-runway-167209",$model);

echo "<pre>";
    print_r ($created_model);
echo "</pre>";

$version = new Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Version();
$version->setName('v1');
$version->setDescription('This is the initial version of census');
$version->setDeploymentUri('gs://drupal-ml/out/export/Servo/1496118008493');

$created_version = $mlService->projects_models_versions->create("projects/magnetic-runway-167209/models/census1000",$version);

echo "<pre>";
print_r ($created_version);
echo "</pre>";