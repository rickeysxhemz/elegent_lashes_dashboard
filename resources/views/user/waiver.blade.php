<!-- resources/views/signature.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Signature Page</title>
    <link href="{{asset('assets/css/waiver.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- Include Signature Pad -->
    <script src="https://unpkg.com/signature_pad"></script>
   
    <style>
    body {
    font-family: 'Arial', sans-serif;
    text-align: center;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

#pdf-container {
    max-width: 800px;
    margin: 0 auto;
    border: 1px solid #ccc;
    padding: 20px;
}

#signature-container {
    margin-top: 20px;
    margin-bottom: 20px;
}

#signature-pad {
    border: 1px solid #ccc;
}

button {
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}</style>
</head>
<body>



<h2>Liability Waiver</h2>

<div id="pdf-container">
    <!-- Display the complete terms and conditions PDF here -->
    <embed src="{{ asset('assets/Liability_20Waiver.pdf') }}" width="100%" height="800px" />
    <!-- You can embed the PDF using an <iframe> or other appropriate methods -->
</div>

<h2>Sign the Document</h2>

<div id="signature-container">
    <canvas id="signature-pad" width="300" height="150"></canvas>
</div>
<button onclick="saveSignature()">Save Signature</button>
<button onclick="clearSignature()">Clear Signature</button>

<script>
    // Signature Pad initialization
    var canvas = document.getElementById('signature-pad');
    var signaturePad = new SignaturePad(canvas);

    // Function to save the signature
    function saveSignature() {
        var signatureData = signaturePad.toDataURL();

        // Create a new FormData object to send the data
        var formData = new FormData();

        // Append the signature data to the form data
        formData.append('signature', signatureData);

        // Append CSRF token to the form data
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        formData.append('_token', csrfToken);

        // Create and configure an XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("user.generateSignedWaiver") }}', true);

        // Define the onload and onerror callbacks
        xhr.onload = function() {
            // Handle the response, if needed
            if (this.status == 200) {
                // Redirect to the dashboard
                window.location.href = '{{ route("user.dashboard") }}';
            } else {
                console.error('The request returned an error.');
            }
        };

        xhr.onerror = function() {
            // Handle errors, if any
            console.error('An error occurred while sending the request.');
        };

        // Send the form data
        xhr.send(formData);
    }

    // Function to clear the signature
    function clearSignature() {
        signaturePad.clear();
    }
</script>

</body>
</html>
