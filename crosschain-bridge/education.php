<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Platform</title>
</head>
<body>
    <h1>Educational Platform</h1>
    <p>Paid Courses on Verification: Offer paid courses on verifying Web3 projects.</p>

    <h2>Enroll in Verification Course</h2>
    <form id="courseForm">
        <label for="course">Select Course:</label>
        <select id="course" name="course" required>
            <option value="basic">Basic Verification - $20</option>
            <option value="advanced">Advanced Verification - $100</option>
        </select><br>

        <button type="submit">Enroll</button>
    </form>

    <p id="courseResult"></p>

    <script>
        document.getElementById('courseForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const course = document.getElementById('course').value;
            const fee = course === 'basic' ? 20 : 100;
            document.getElementById('courseResult').textContent = `You have enrolled in the ${course} course for $${fee}.`;
        });
    </script>
</body>
</html>
