<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeFi Risk Management Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            color: #007BFF;
        }
        form {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #verificationResult {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>DeFi Risk Management Tool</h1>
    <p>Verification as a Service: Charge projects for risk assessments.</p>
    <p>Certification Programs: Sell certification programs for Web3 projects.</p>

    <h2>Verify Project</h2>
    <form id="verifyForm">
        <label for="project">Project Name:</label>
        <input type="text" id="project" name="project" required><br>

        <label for="fee">Verification Fee:</label>
        <input type="number" id="fee" name="fee" value="100" required><br>

        <label for="email">Owner Email:</label>
        <input type="email" id="email" name="email" required><br>

        <button type="submit">Verify Project</button>
    </form>

    <p id="verificationResult"></p>

    <script>
        document.getElementById('verifyForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const project = document.getElementById('project').value;
            const fee = parseFloat(document.getElementById('fee').value);
            const email = document.getElementById('email').value;

            try {
                const response = await fetch('/verify-project', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ project, fee, email })
                });
                const data = await response.text();
                document.getElementById('verificationResult').textContent = data;
            } catch (error) {
                document.getElementById('verificationResult').textContent = 'Failed to verify the project.';
            }
        });
    </script>
</body>
</html>
