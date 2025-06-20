<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automated Trading and Alerts</title>
</head>
<body>
    <h1>Automated Trading and Alerts</h1>
    <p>Trading Bot Subscription Fees: Charge users for advanced trading bots.</p>
    <p>Fee per Trade Executed: Charge a fee for each trade executed by bots.</p>

    <h2>Subscribe to Trading Bot</h2>
    <form id="botForm">
        <label for="bot">Select Bot:</label>
        <select id="bot" name="bot" required>
            <option value="basic">Basic Bot - $10/month</option>
            <option value="pro">Pro Bot - $50/month</option>
        </select><br>

        <button type="submit">Subscribe</button>
    </form>

    <p id="subscription"></p>

    <script>
        document.getElementById('botForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const bot = document.getElementById('bot').value;
            const fee = bot === 'basic' ? 10 : 50;
            document.getElementById('subscription').textContent = `You have subscribed to the ${bot} bot for $${fee}/month.`;
        });
    </script>
</body>
</html>
