
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross-Chain Swap Aggregator</title>
    <style>
        /* Basic Styling */
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

        h2 {
            color: #0056b3;
            margin-top: 30px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        /* Form Styling */
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

        input[type="number"] {
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

        #result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        /* Info Section Styling */
        .info-section {
            margin-top: 30px;
            padding: 20px;
            background-color: #e9ecef;
            border-radius: 5px;
        }

        .info-section ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        /* Responsiveness */
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            input[type="number"] {
                padding: 6px;
                margin-bottom: 10px;
            }

            button {
                padding: 8px 12px;
            }

            #result {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <h1>Cross-Chain Swap Aggregator</h1>

    <!-- Information Section -->
    <div class="info-section">
        <p>With our Cross-Chain Swap Aggregator, you can earn revenue through various streams:</p>
        <ul>
            <li><strong>Integrate Transaction Fees:</strong> Charge a fee for each cross-chain swap transaction.</li>
            <li><strong>Liquidity Provider Fees:</strong> Earn a portion of fees from DEX trades facilitated by your liquidity.</li>
        </ul>
    </div>

    <!-- MetaMask Connection -->
    <h2>Connect Wallet</h2>
    <button id="connectWallet">Connect MetaMask</button>
    <p id="walletAddress"></p>

    <!-- Swap Fee Calculator Section -->
    <h2>Calculate Your Swap Fees</h2>
    <form id="swapForm">
        <label for="amount">Amount to Swap:</label>
        <input type="number" id="amount" name="amount" min="0" required>

        <label for="fee">Transaction Fee (in %):</label>
        <input type="number" id="fee" name="fee" value="0.5" min="0" step="0.1" required>

        <button type="submit">Calculate Fee</button>
    </form>

    <p id="result"></p>

    <!-- Script for MetaMask and Fee Calculation -->
    <script>
        const connectWalletButton = document.getElementById('connectWallet');
        const walletAddressDisplay = document.getElementById('walletAddress');

        connectWalletButton.addEventListener('click', async () => {
            try {
                const response = await fetch('/connect-wallet', { method: 'POST' });
                const data = await response.json();
                if (data.account) {
                    walletAddressDisplay.textContent = `Connected Wallet Address: ${data.account}`;
                } else {
                    walletAddressDisplay.textContent = 'Failed to connect wallet.';
                }
            } catch (error) {
                walletAddressDisplay.textContent = 'Error connecting to wallet.';
            }
        });

        document.getElementById('swapForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const amount = parseFloat(document.getElementById('amount').value);
            const fee = parseFloat(document.getElementById('fee').value);

            try {
                const response = await fetch('/calculate-fee', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ amount, feePercentage: fee })
                });
                const data = await response.json();
                if (data.feeAmount !== undefined) {
                    document.getElementById('result').textContent = `Transaction Fee: ${data.feeAmount.toFixed(2)} units`;
                } else {
                    document.getElementById('result').textContent = 'Error calculating fee.';
                }
            } catch (error) {
                document.getElementById('result').textContent = 'Failed to calculate fee.';
            }
        });
        
        
        connectWalletButton.addEventListener('click', async () => {
    if (window.ethereum) {
        try {
            const accounts = await ethereum.request({ method: 'eth_requestAccounts' });
            const account = accounts[0];
            walletAddressDisplay.textContent = `Connected Wallet Address: ${account}`;
        } catch (error) {
            walletAddressDisplay.textContent = 'Error connecting to MetaMask.';
        }
    } else {
        walletAddressDisplay.textContent = 'MetaMask is not installed.';
    }
});


    </script>
</body>

</html>
