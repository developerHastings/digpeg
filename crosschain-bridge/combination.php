<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combining Strategies</title>
</head>
<body>
    <h1>Combining Strategies</h1>
    <p>Verified Projects on Social Trading: Allow only verified projects to participate in your social trading platform, ensuring safety and trust.</p>

    <h2>Verified Project Access</h2>
    <form id="verifyAccessForm">
        <label for="project">Project Name:</label>
        <input type="text" id="project" name="project" required><br>

        <button type="submit">Check Access</button>
    </form>

    <p id="accessResult"></p>

    <script>
        document.getElementById('verifyAccessForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const project = document.getElementById('project').value;
            const verifiedProjects = ['Project A', 'Project B', 'Project C']; // Example verified projects
            if (verifiedProjects.includes(project)) {
                document.getElementById('accessResult').textContent = `${project} is verified and has access to the social trading platform.`;
            } else {
                document.getElementById('accessResult').textContent = `${project} is not verified. Please complete the verification process.`;
            }
        });
    </script>
</body>
</html>
