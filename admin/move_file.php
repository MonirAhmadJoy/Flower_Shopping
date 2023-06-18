<?php
if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
  $tempFilePath = $_FILES["photo"]["tmp_name"];
  $targetDir = "images/";
  $targetFilePath = $targetDir . $_FILES["photo"]["name"];

  if (move_uploaded_file($tempFilePath, $targetFilePath)) {
    echo "Image file moved successfully.";
  } else {
    echo "Error moving image file.";
  }
} else {
  echo "No image file received.";
}
?>
