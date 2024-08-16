function generateResponse() {
    var text = document.getElementById("text").value;
    var response = document.getElementById("response");

    response.innerHTML = "Generating response...";

    fetch("response.php", {
        method: "post",
        body: JSON.stringify({ text: text }),
        headers: {
            "Content-Type": "application/json"
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.error) {
            console.error(data.error);
            response.innerHTML = `An error occurred: ${data.error}`;
        } else {
            response.innerHTML = 
                `<p>Generated Ad Video Concept:</p>
                <pre>${data.generatedText}</pre>
                <br>`;
        }
    })
    .catch(err => {
        console.error(err);
        response.innerHTML = "An error occurred while fetching the response.";
    });
}
