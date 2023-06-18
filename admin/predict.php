<!-- <div>Teachable Machine Image Model</div>
<button type="button" onclick="start()">Start</button>
<button type="button" onclick="stop()">Stop</button>
<div id="webcam-container"></div>
<div id="label-container"></div>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
<script type="text/javascript">
    // the link to your model provided by Teachable Machine export panel
    const URL = "./my_model/";

    let model, webcam, labelContainer, maxPredictions, isPredicting;

    // Load the image model and setup the webcam
    async function start() {
        const modelURL = URL + "model.json";
        const metadataURL = URL + "metadata.json";

        // load the model and metadata
        model = await tmImage.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

        // Convenience function to setup a webcam
        const flip = true; // whether to flip the webcam
        webcam = new tmImage.Webcam(200, 200, flip); // width, height, flip
        await webcam.setup(); // request access to the webcam
        await webcam.play();
        isPredicting = true;
        window.requestAnimationFrame(predictLoop);

        // append elements to the DOM
        document.getElementById("webcam-container").appendChild(webcam.canvas);
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) { // and class labels
            labelContainer.appendChild(document.createElement("div"));
        }
    }

    // Stop the webcam and prediction loop
    function stop() {
        if (webcam) {
            webcam.stop();
        }
        isPredicting = false;
    }

    // Run the webcam image through the image model
    async function predictLoop() {
        if (!isPredicting) {
            return;
        }
        webcam.update(); // update the webcam frame
        await predict();
        window.requestAnimationFrame(predictLoop);
    }

    async function predict() {
        // predict can take in an image, video, or canvas html element
        const prediction = await model.predict(webcam.canvas);
        for (let i = 0; i < maxPredictions; i++) {
            const classPrediction =
                prediction[i].className + ": " + prediction[i].probability.toFixed(2);
            labelContainer.childNodes[i].innerHTML = classPrediction;
        }
    }
</script> -->
<?php


?>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        text-align: center;
        padding: 20px;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .button {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        margin: 5px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .input-container {
        margin-top: 20px;
    }

    .label-container {
        margin-top: 20px;
        text-align: left;
    }

    .label-container div {
        margin-bottom: 5px;
    }

    #webcam-container {
        margin-top: 20px;
    }

    #uploaded-image {
        display: block;
        margin: 20px auto;
        max-width: 200px;
        max-height: 200px;
    }
</style>

<div class="container">
    <div class="title">Flower Classification Using Tensorflow </div>

    <div id="file-name-container"></div>
    <div>
        <button class="button" onclick="startw()">Start Webcam</button>
        <button class="button" onclick="stopw()">Stop Webcam</button>
    </div>

    <div id="webcam-container"></div>
    <div id="label-containerw" class="label-container"></div>

    <div class="input-container">
        <input type="file" accept="image/*" onchange="handleImageUpload(event)">
    </div>

    <div id="label-container" class="label-container"></div>

    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
    <script type="text/javascript">
        // the link to your model provided by Teachable Machine export panel
        const URL = "./my_model/";

        let model, labelContainer, maxPredictions, isPredicting, uploadedImage;
        let modelw, webcam, labelContainerw, maxPredictionsw, isPredictingw;

        // Handle the image upload and load the model
        async function handleImageUpload(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = async function(e) {
                uploadedImage = new Image();
                uploadedImage.src = e.target.result;
                uploadedImage.id = "uploaded-image";
                uploadedImage.onload = async function() {
                    await start();
                };
                document.getElementById("webcam-container").innerHTML = '';
                document.getElementById("label-containerw").innerHTML = '';
                document.getElementById("label-container").innerHTML = '';
                document.getElementById("webcam-container").appendChild(uploadedImage);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
            const fileName = file.name;
            const fileNameContainer = document.getElementById("file-name-container");
            fileNameContainer.innerText = `File Name: ${fileName}`;
        }

        // Load the image model and setup the webcam
        async function startw() {
            const modelURL = URL + "model.json";
            const metadataURL = URL + "metadata.json";

            document.getElementById("label-containerw").innerHTML = '';
            document.getElementById("webcam-container").innerHTML = '';

            // load the model and metadata
            modelw = await tmImage.load(modelURL, metadataURL);
            maxPredictionsw = modelw.getTotalClasses();

            // Convenience function to setup a webcam
            const flip = true; // whether to flip the webcam
            webcam = new tmImage.Webcam(200, 200, flip); // width, height, flip
            await webcam.setup(); // request access to the webcam
            await webcam.play();
            isPredictingw = true;
            window.requestAnimationFrame(predictLoop);

            // append elements to the DOM
            document.getElementById("webcam-container").appendChild(webcam.canvas);
            labelContainerw = document.getElementById("label-containerw");
            for (let i = 0; i < maxPredictionsw; i++) { // and class labels
                labelContainerw.appendChild(document.createElement("div"));
            }
        }

        // Stop the webcam and prediction loop
        function stopw() {
            if (webcam) {
                webcam.stop();
            }
            isPredictingw = false;
        }

        // Run the webcam image through the image model
        async function predictLoop() {
            if (!isPredictingw) {
                return;
            }
            webcam.update(); // update the webcam frame
            await predictw();
            window.requestAnimationFrame(predictLoop);
        }

        async function predictw() {
            // predict can take in an image, video, or canvas html element
            const prediction = await modelw.predict(webcam.canvas);
            for (let i = 0; i < maxPredictionsw; i++) {
                const classPrediction =
                    prediction[i].className + ": " + prediction[i].probability.toFixed(2) * 100 + " %";
                labelContainerw.childNodes[i].innerHTML = classPrediction;
            }
        }

        // Load the model
        async function start() {
            const modelURL = URL + "model.json";
            const metadataURL = URL + "metadata.json";

            // load the model and metadata
            model = await tmImage.load(modelURL, metadataURL);
            maxPredictions = model.getTotalClasses();

            predict(); // Predict the uploaded image
        }

        // Stop the prediction loop
        function stop() {
            isPredicting = false;
        }

        async function predict() {
            if (!uploadedImage) {
                return;
            }

            // predict can take in an image, video, or canvas html element
            const prediction = await model.predict(uploadedImage);
            labelContainer = document.getElementById("label-container");
            labelContainer.innerHTML = ''; // Clear previous labels

            for (let i = 0; i < maxPredictions; i++) {
                const className = prediction[i].className;
                const probability = (prediction[i].probability * 100).toFixed(2);
                const classPrediction = `${className}: ${probability}%`;

                const labelDiv = document.createElement("div");
                labelDiv.innerHTML = classPrediction;
                labelContainer.appendChild(labelDiv);
            }

            // Create the "Add" button
            const addButton = document.createElement("button");
            addButton.innerText = "Add";
            addButton.addEventListener("click", sendData);
            document.getElementById("add-button-container").innerHTML = '';
            document.getElementById("add-button-container").appendChild(addButton);

        }

        function sendData() {
            // Get the image name and class name
            const imageName = uploadedImage.id;
            const className = labelContainer.firstChild.innerHTML.split(":")[0].trim();

            // Create a form and append input fields for the data
            const form = document.createElement("form");
            form.method = "POST";
            form.action = "insert.php";

            const imageNameInput = document.createElement("input");
            imageNameInput.type = "hidden";
            imageNameInput.name = "imageName";
            imageNameInput.value = imageName;

            const classNameInput = document.createElement("input");
            classNameInput.type = "hidden";
            classNameInput.name = "className";
            classNameInput.value = className;

            // Append the input fields to the form
            form.appendChild(imageNameInput);
            form.appendChild(classNameInput);

            // Append the form to the document and submit it
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</div>