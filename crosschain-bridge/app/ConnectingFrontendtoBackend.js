// Example of fetching pools from Uniswap
fetch('/uniswap/pools')
    .then(response => response.json())
    .then(data => {
        console.log('Uniswap Pools:', data);
    })
    .catch(error => console.error('Error:', error));

// Example of connecting a wallet
fetch('/connect-wallet', {
    method: 'POST',
})
    .then(response => response.json())
    .then(data => {
        console.log('Connected Wallet Address:', data.account);
    })
    .catch(error => console.error('Error:', error));
