<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Video Generator</title>
    <!-- Predis.ai SDK -->
    <script type="text/javascript" src="https://predis.ai/sdk/embed.js" async defer crossorigin="anonymous"></script>
    <!-- Link CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Ad Video Generator</h1>

        <div class="section">
            <h2>_________</h2><br><br>
            <h2>Chatbot for Video Concept</h2><br>
            <label for="text">Ask Ad Video Concept or Theme:</label>
            <input type="text" id="text" class="input-field"><br>
            <button onclick="generateResponse();" class="btn-gradient">Generate Concept</button><br><br>
            <div id="response"></div><br>
        </div>

        <div class="section">
            <h2>Generate Video</h2>
            <label for="inputText">Enter Concept or Theme for the Ad Video:</label>
            <textarea id="inputText" class="input-field" rows="3" placeholder="  "></textarea><br>
            <button id="generateButton" class="btn-gradient">Generate Video</button>
            <p id="statusMessage"></p>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        document.getElementById("generateButton").addEventListener("click", function () {
            const inputText = document.getElementById("inputText").value;
            const statusMessage = document.getElementById("statusMessage");
            
            if (!inputText) {
                alert("Text cannot be empty!");
                return;
            }

            // Update status message
            statusMessage.textContent = "Initializing AI for Video Generator...";

            try {
                // Create an object from the SDK
                const predis = new window.Predis();
                console.log("Predis object created:", predis);
                
                predis.initialize({ appId: "q2GmHILmSYxJ1GPUvOCkU03BTYSQJSgJ" });
                console.log("Predis initialized with appId");

                predis.on("ready", () => {
                    console.log("Predis.ai is ready");
                    // Update status message
                    statusMessage.textContent = "AI for Video Generator is ready. Creating ad video...";

                    // Open Predis.ai post creator
                    predis.createPost({
                        inputText: inputText,  // Pass the input text to Predis.ai
                        onPostPublish: function (err, data) {
                            if (err) {
                                console.error("Error publishing post:", err);
                                statusMessage.textContent = "Error publishing the video.";
                            } else {
                                console.log("Published post data:", data);
                                statusMessage.textContent = "Video successfully created!";
                            }
                        },
                    });
                });

                predis.on("error", (e) => {
                    console.error("Predis.ai initialization error event:", e);
                    statusMessage.textContent = "Error initializing Predis.ai.";
                });

            } catch (e) {
                console.error("Exception caught during Predis initialization:", e);
                statusMessage.textContent = "Exception during Predis.ai initialization: " + e.message;
            }
        });
    </script>
</body>

</html>
