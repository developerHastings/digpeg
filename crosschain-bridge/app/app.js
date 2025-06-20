// app.js

// Simulate fetching data from a DeFi API


const profileData = {
    totalValue: 59.9,
    totalLiquidity: 56.68,
    unclaimedFees: 3.23,
    feesGenerated: 3.23,
    profitAndLoss: -13.75,
    roi: -18.67,
    positions: [
        {
            poolName: 'USDT/DPC',
            liquidity: 129.15,
            profitLoss: 18.27,
            apr: 0,
            age: 'about 2 months'
        },
        {
            poolName: 'ETH/BNB',
            liquidity: 22.6,
            profitLoss: -5.29,
            apr: 0,
            age: 'about 2 months'
        }
        // More positions
    ]
};

function updateUI() {
    document.querySelector('.summary-item:nth-child(1) p').innerText = `$${profileData.totalValue}`;
    document.querySelector('.summary-item:nth-child(2) p').innerText = `$${profileData.totalLiquidity}`;
    document.querySelector('.summary-item:nth-child(3) p').innerText = `$${profileData.unclaimedFees}`;
    document.querySelector('.summary-item:nth-child(4) p').innerText = `$${profileData.feesGenerated}`;
    
    // Populate positions
    const tbody = document.querySelector('.positions-section tbody');
    profileData.positions.forEach(position => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${position.poolName}</td>
            <td>$${position.liquidity}</td>
            <td>$${position.profitLoss}</td>
            <td>$0</td>
            <td>${position.apr}%</td>
            <td>1.0 - 1.5</td>
            <td>${position.age}</td>
            <td><button>Add Liquidity</button></td>
        `;
        tbody.appendChild(row);
    });
}

updateUI();





// Simulate fetching exchange rates or use a DEX API
const exchangeRates = {
    'ETH_USDT': 3000,
    'USDT_ETH': 0.00033,
    'BNB_USDT': 400,
    'USDT_BNB': 0.0025,
    'ETH_BNB': 0.13,
    'BNB_ETH': 7.69
};

document.getElementById('fromAmount').addEventListener('input', updateToAmount);
document.getElementById('fromToken').addEventListener('change', updateToAmount);
document.getElementById('toToken').addEventListener('change', updateToAmount);

function updateToAmount() {
    const fromToken = document.getElementById('fromToken').value;
    const toToken = document.getElementById('toToken').value;
    const fromAmount = parseFloat(document.getElementById('fromAmount').value) || 0;

    const rateKey = `${fromToken}_${toToken}`;
    const rate = exchangeRates[rateKey] || 0;

    const toAmount = fromAmount * rate;
    document.getElementById('toAmount').value = toAmount.toFixed(6);
}

document.getElementById('swapButton').addEventListener('click', swapTokens);

function swapTokens() {
    const fromToken = document.getElementById('fromToken').value;
    const toToken = document.getElementById('toToken').value;
    const fromAmount = parseFloat(document.getElementById('fromAmount').value);

    if (fromAmount <= 0) {
        alert("Enter a valid amount to swap.");
        return;
    }

    // Placeholder for API integration to execute the swap
    alert(`Swapping ${fromAmount} ${fromToken} to ${toToken}`);
    
    // Integrate with a smart contract or API to execute the swap
    // Example using Web3.js or ethers.js with a DEX API
}


// Simulate fetching exchange rates or use a DEX API

const platformFeePercentage = 0.005; // 0.5% platform fee

document.getElementById('fromAmount').addEventListener('input', updateToAmount);
document.getElementById('fromToken').addEventListener('change', updateToAmount);
document.getElementById('toToken').addEventListener('change', updateToAmount);
document.getElementById('slippage').addEventListener('input', updateToAmount);

// Populate chain selection dropdown with 100 chains
/*
const chainSelect = document.getElementById('chainSelect');
for (let i = 1; i <= 100; i++) {
    const option = document.createElement('option');
    option.value = `Chain${i}`;
    option.textContent = `Chain ${i}`;
    chainSelect.appendChild(option);
}

*/


function updateToAmount() {
    const fromToken = document.getElementById('fromToken').value;
    const toToken = document.getElementById('toToken').value;
    const fromAmount = parseFloat(document.getElementById('fromAmount').value) || 0;
    const slippage = parseFloat(document.getElementById('slippage').value) || 0.10;

    const rateKey = `${fromToken}_${toToken}`;
    const rate = exchangeRates[rateKey] || 0;

    const toAmount = fromAmount * rate;
    const minReceived = toAmount * (1 - slippage / 100);
    const platformFee = fromAmount * platformFeePercentage;

    document.getElementById('toAmount').value = toAmount.toFixed(6);
    document.getElementById('minReceived').textContent = minReceived.toFixed(6);
    document.getElementById('minValue').textContent = `$${(minReceived * rate).toFixed(2)}`;
    document.getElementById('platformFee').textContent = `$${platformFee.toFixed(2)}`;
}

document.getElementById('swapButton').addEventListener('click', swapTokens);

function swapTokens() {
    const fromToken = document.getElementById('fromToken').value;
    const toToken = document.getElementById('toToken').value;
    const fromAmount = parseFloat(document.getElementById('fromAmount').value);
    const selectedChain = document.getElementById('chainSelect').value;

    if (fromAmount <= 0) {
        alert("Enter a valid amount to swap.");
        return;
    }

    // Placeholder for API integration to execute the swap
    alert(`Swapping ${fromAmount} ${fromToken} to ${toToken} on ${selectedChain}`);

    // Integrate with a smart contract or API to execute the swap
    // Example using Web3.js or ethers.js with a DEX API
}

