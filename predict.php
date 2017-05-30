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

putenv('GOOGLE_APPLICATION_CREDENTIALS=/Applications/XAMPP/xamppfiles/htdocs/google-key.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope(Google_Service_CloudMachineLearningEngine::CLOUD_PLATFORM);
$service = new Google_Service_CloudMachineLearningEngine($client);

$name = "projects/magnetic-runway-167209/models/census1000";

$data = [
		"instances" => 
          [[
            "age"=> 25,
             "workclass"=> " Private",
             "education"=> " 11th",
             "education_num"=> 7,
             "marital_status"=> " Never-married",
             "occupation"=> " Machine-op-inspct", 
             "relationship"=> " Own-child", 
             "race"=> " Black", 
             "gender"=> " Male", 
             "capital_gain"=> 0, 
             "capital_loss"=> 0, 
             "hours_per_week"=> 40, 
             "native_country"=> " United-States"
           ]]
];

$return = $service->projects->predict($name, new Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictRequest($data));

print("<pre>");
print_r($return);
print("</pre>");


