<h1>
  Demonstrate how to use <a href="https://cloud.google.com/ml-engine/docs/">Google Machine Learning Engine</a> with php library.
</h1>
<p>
  In this work I will be illustrating the <a href="https://cloud.google.com/ml-engine/docs/tutorials/samples">example,</a> 
  <a href="https://cloud.google.com/ml-engine/docs/how-tos/getting-started-training-prediction">Predicting Income with the Census Income Dataset</a> from google ml-engine docs with Google PHP apis. We will be using it code from <a hred="https://github.com/GoogleCloudPlatform/cloudml-samples/tree/master/census">Github</a>.
</p>
<p>
  Following are the steps in using machine learning engine for prediction.
  <ol>
    <li><strong>Create a service account</strong> and download the credential json file.</li>
    <li><strong><a href="census/package">Package</a> and upload the code</strong> to Google cloud.</li>
    <li><strong>Composer install</strong> the <a href="composer.json">libraries.</a></li>
    <li><strong>Upload training and testing data</strong> to Google Cloud Storage using <a href="storage.php">storage.php</a></li>
    <li><strong>Train the model</strong> using <a href="jobs/create.php">jobs/create.php</a>. This will set a job to train the model. We can use <a href = "jobs/list.php">jobs/list.php</a> to list all the jobs in our project and <a href="jobs/get.php">jobs/get.php</a> to get a job details by name.</li>
    <li><strong>Deploy the model</strong> using <a href="deploy.php">deploy.php</a></li>
    <li><strong>Predict</strong> using <a href="predict.php">predict.php</a></li>
  </ol>
</p>
