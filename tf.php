<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Flower Classification</title>
  </head>
  <body>
    <h1>Flower Classification</h1>
    <form>
      <input type="file" id="image-input">
      <button type="button" id="classify-button">Classify</button>
    </form>
    <div id="result"></div>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.14.0/dist/tf.min.js"></script>
    <script src="app.js"></script>
  </body>
</html>


