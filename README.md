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
    <li><h2>Create a service account</h2> and download the credential json file.</li>
    <li><h2>Package and upload the code</h2> to Google cloud.</li>
    <li><h2>Composer install</h2> the <a href="composer.json">libraries.</a></li>
    <li><h2>Upload training and testing data</h2> to Google Cloud Storage using <a href="storage.php">storage.php</a></li>
    <li><h2>Train the model</h2> using <a href="jobs/create.php">jobs/create.php</a>. This will set a job to train the model. We can use <a href = "jobs/list.php">jobs/list.php</a> to list all the jobs in our project and <a href="jobs/get.php">jobs/get.php</a> to get a job details by name.</li>
    <li><h2>Deploy the model</h2> using <a href="deploy.php">deploy.php</a></li>
  </ol>
</p>
