<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Trading Platform</title>
</head>
<body>
    <h1>Social Trading Platform</h1>
    <p>Fee on Copy Trading: Charge a fee per copied trade.</p>
    <p>Performance Fee: Charge a fee based on profits from copied trades.</p>

    <h2>Copy Top Trader</h2>
    <form id="copyForm">
        <label for="profit">Profit from Copied Trade (in $):</label>
        <input type="number" id="profit" name="profit" required><br>

        <label for="copyFee">Copy Trading Fee (in %):</label>
        <input type="number" id="copyFee" name="copyFee" value="5" required><br>

        <button type="submit">Calculate Fee</button>
    </form>
 Social Trading Platform:
Fee on Copy Trading: When users follow and replicate trades of top traders on your platform, you could charge a fee per copied trade or a performance fee based on profits.
Fee on Copy Trading:
Copy Trade Fee: 1% to 5% of the value of each copied trade.
Performance Fee: 5% to 20% of profits earned from copied trades.

    <p id="copyResult"></p>

    <script>
        document.getElementById('copyForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const profit = parseFloat(document.getElementById('profit').value);
            const fee = parseFloat(document.getElementById('copyFee').value);
            const feeAmount = (profit * fee) / 100;
            document.getElementById('copyResult').textContent = `Copy Trading Fee: $${feeAmount}`;
        });
    </script>
</body>
</html>
