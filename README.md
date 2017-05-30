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
  <li>Create a service account and download the credential json file.</li>
  <li>Package the code and upload it to Google cloud.</li>
  <li>Using composer install the <a href="composer.json">libraries.</a></li>
  <li>Upload training and testing data to Google Cloud Storage using <a href="storage.php">storage.php</a></li>
  </ol>
</p>
