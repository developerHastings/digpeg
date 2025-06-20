<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulatory and Compliance Monitoring</title>
</head>
<body>
    <h1>Regulatory and Compliance Monitoring</h1>
    <p>KYC/AML Verification Fees: Charge Web3 projects for KYC/AML services.</p>

    <h2>KYC/AML Verification</h2>
    <form id="kycForm">
        <label for="company">Company Name:</label>
        <input type="text" id="company" name="company" required><br>

        <label for="kycFee">KYC Verification Fee:</label>
        <input type="number" id="kycFee" name="kycFee" value="50" required><br>

        <button type="submit">Verify</button>
    </form>

    <p id="kycResult"></p>

    <script>
        document.getElementById('kycForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const company = document.getElementById('company').value;
            const fee = parseFloat(document.getElementById('kycFee').value);
            document.getElementById('kycResult').textContent = `${company} has been KYC verified for $${fee}.`;
        });
    </script>
</body>
</html>
