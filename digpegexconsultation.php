<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIY Project Consultation</title>
    <link rel="stylesheet" href="styles.css">
    
     <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    
    
</head>
<body>
    
    
    
    
    
    
    
    
    <div class="container">
        <h1>Unlock Your Project's Potential</h1>
        <a href="https://digpegexchange.com/DigiPegCoinWhitepaper.pdf">DigPeg White Paper</a>
        <p>Transform your project with expert guidance in just 3 hours.</p>
        <form action="submit.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="project_description" placeholder="Briefly describe your project"></textarea>
            <button type="submit">Book Your Consultation for $50</button>
        </form> <br>
        
       <a href="https://www.digpegexchange.com/" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; text-decoration: none;">Home</a>
        <br>
        <br>
        <br>
        
    
        
        
        
        
        <a href="digpegpayments.php" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; text-decoration: none;">Payments</a>
        <br>
        <br>
        
    <style>#dexscreener-embed{position:relative;width:100%;padding-bottom:125%;}@media(min-width:1400px){#dexscreener-embed{padding-bottom:65%;}}#dexscreener-embed iframe{position:absolute;width:100%;height:100%;top:0;left:0;border:0;}</style><div id="dexscreener-embed"><iframe src="https://dexscreener.com/bsc/0x1AAA2d0F2E0922924153d9CAAb95B9A5DbCF8Bca?embed=1&theme=dark"></iframe></div> <br>
        
        
        
        
 
    
    </div>
    
    
    
    
    
</body>
</html>


<style type="text/css">
    
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    text-align: center;
    padding: 20px;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

</style>

<?php
// Database configuration
$servername = "localhost";
$username = "digpegex_wp343";
$password = "tx-7]{AEgQ&8";
$dbname = "digpegex_digpegexDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$project_description = $_POST['project_description'];

// Insert data into database
$sql = "INSERT INTO users (name, email, project_description) VALUES ('$name', '$email', '$project_description')";

if ($conn->query($sql) === TRUE) {
    echo "Consultation booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

/*
sql
CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    project_description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

*/
?>


<?php
$servername = "localhost";
$username = "digpegex_wp343";
$password = "tx-7]{AEgQ&8";
$dbname = "digpegex_digpegexDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch users who registered today
$today = date('Y-m-d');
$sql = "SELECT * FROM users WHERE DATE(reg_date) = '$today'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Send email to each user
    while($row = $result->fetch_assoc()) {
        $to = $row['email'];
        $subject = "Your DIY Project Consultation Confirmation";
        $message = "Dear " . $row['name'] . ",\n\nThank you for booking a DIY project consultation with us. We look forward to helping you achieve your project goals.\n\nBest regards,\nYour Project Consultation Team";
        $headers = "From: your_email@example.com";

        // Send email
        mail($to, $subject, $message, $headers);
    }
} else {
    echo "No new registrations today.";
}

$conn->close();

// 0 0 * * * php /path/to/send_email.php


// email sequence

/*

Follow-Up Email Sequence
Day 1: Welcome & Introduction

Email Content: Welcome the subscriber, introduce yourself and your services.
Video Content: Introduction to your DIY project consultation service.
Day 2: Understanding Project Goals

Email Content: Discuss the importance of defining clear project goals.
Video Content: Tips on setting SMART goals for your project.
Day 3: Planning Phase

Email Content: Guide on planning the project effectively.
Video Content: Example project planning walkthrough.
Day 4: Budgeting Tips

Email Content: Tips on budgeting and cost management.
Video Content: Strategies for budget-friendly project execution.
Day 5: DIY Execution Techniques

Email Content: Highlight DIY execution benefits and techniques.
Video Content: Demonstration of a simple DIY project.
Day 6: Overcoming Challenges

Email Content: Common challenges and how to overcome them.
Video Content: Real-life examples of overcoming project obstacles.
Day 7: Review & Feedback

Email Content: Importance of reviewing progress and gathering feedback.
Video Content: How to conduct effective project reviews.
Day 8: Resource Allocation

Email Content: Allocating resources effectively for project success.
Video Content: Techniques for optimizing resource allocation.
Day 9: Customer Satisfaction

Email Content: Ensuring customer satisfaction throughout the project.
Video Content: Tips on enhancing customer experience.
Day 10: Scaling Your Project

Email Content: Strategies for scaling up your project.
Video Content: Case studies of successful project scaling.
Day 11: Time Management

Email Content: Importance of time management in project execution.
Video Content: Time management tools and techniques.
Day 12: Quality Control

Email Content: Implementing quality control measures in your project.
Video Content: Examples of quality assurance in projects.
Day 13: Stakeholder Engagement

Email Content: Engaging stakeholders effectively in your project.
Video Content: Strategies for stakeholder communication.
Day 14: Celebrating Milestones

Email Content: Importance of celebrating project milestones.
Video Content: Examples of milestone celebrations.
Day 15: Feedback Loop

Email Content: Creating a feedback loop for continuous improvement.
Video Content: Feedback gathering techniques.
Day 16: Sustainability Practices

Email Content: Incorporating sustainability practices in your project.
Video Content: Examples of sustainable project initiatives.
Day 17: Team Collaboration

Email Content: Enhancing team collaboration in project teams.
Video Content: Tools for remote team collaboration.
Day 18: Risk Management

Email Content: Strategies for identifying and managing project risks.
Video Content: Risk assessment and mitigation techniques.
Day 19: Project Documentation

Email Content: Importance of project documentation and record-keeping.
Video Content: Best practices for project documentation.
Day 20: Flexibility in Projects

Email Content: The value of flexibility in adapting to project changes.
Video Content: Adapting to unexpected project challenges.
Day 21: Project Close-Out

Email Content: Steps for effectively closing out a project.
Video Content: Case study of a successful project close-out.
Day 22: Reflection & Learning

Email Content: The importance of reflection and continuous learning.
Video Content: Personal growth through project experiences.
Day 23: Future Projects

Email Content: Planning for future projects based on current learnings.
Video Content: Future trends in project management.
Day 24: Customer Testimonials

Email Content: Showcase customer testimonials and success stories.
Video Content: Interviews with satisfied clients.
Day 25: Exclusive Offers

Email Content: Special offers or discounts for returning customers.
Video Content: Exclusive behind-the-scenes content.
Day 26: Community Engagement

Email Content: Building a community around your projects.
Video Content: Engaging with your project community.
Day 27: Industry Insights

Email Content: Insights into industry trends and innovations.
Video Content: Expert interviews on industry topics.
Day 28: Recap & Thank You

Email Content: Recap of key learnings and thank subscribers for their engagement.
Video Content: Personal thank you message.
Day 29: Stay Connected

Email Content: Encourage subscribers to stay connected on social media.
Video Content: How to stay connected with ongoing projects.
Day 30: Conclusion & Next Steps

Email Content: Final thoughts, encouragement, and next steps for subscribers.
Video Content: Closing remarks and farewell message.


*/
?>



