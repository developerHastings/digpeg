const express = require('express');
const axios = require('axios');
const Web3 = require('web3');
require('dotenv').config();

const app = express();
const PORT = process.env.PORT || 3000;

// Web3 and WalletConnect initialization
const web3 = new Web3(new Web3.providers.HttpProvider(process.env.INFURA_URL)); // Replace with your Infura URL
const walletConnect = require('@walletconnect/client');

// Middleware to parse JSON
app.use(express.json());

app.get('/', (req, res) => {
    res.send('DeFi Backend is running!');
});

// Listen to the server
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});


//fetch data from the graph
app.get('/uniswap/pools', async (req, res) => {
    const query = `
        {
            pools(first: 5) {
                id
                token0 {
                    symbol
                }
                token1 {
                    symbol
                }
                totalValueLockedUSD
                volumeUSD
            }
        }
    `;

    try {
        const response = await axios.post('https://api.thegraph.com/subgraphs/name/uniswap/uniswap-v3', {
            query: query
        });
        res.json(response.data.data.pools);
    } catch (error) {
        console.error('Error fetching data from The Graph:', error);
        res.status(500).send('Server Error');
    }
});



// Using Uniswap/PancakeSwap APIs
//To fetch pool details or execute swaps, you can use the Uniswap or PancakeSwap smart contracts via Web3.js. Here’s an example of fetching pool data:

const uniswapRouterAddress = '0x...'; // Uniswap Router contract address
const uniswapRouterABI = [...]; // Uniswap Router ABI

app.get('/pools/:poolId', async (req, res) => {
    const poolId = req.params.poolId;
    const contract = new web3.eth.Contract(uniswapRouterABI, uniswapRouterAddress);

    try {
        const poolData = await contract.methods.getPool(poolId).call();
        res.json(poolData);
    } catch (error) {
        console.error('Error fetching pool data:', error);
        res.status(500).send('Server Error');
    }
});

/*
WalletConnect or Web3.js Integration
To allow users to interact with the application via their wallets, you can integrate WalletConnect or directly use Web3.js.
*/

app.post('/connect-wallet', async (req, res) => {
    const connector = new walletConnect({
        bridge: 'https://bridge.walletconnect.org' // Required
    });

    connector.createSession();

    connector.on("connect", (error, payload) => {
        if (error) {
            throw error;
        }

        const { accounts } = payload.params[0];
        res.json({ account: accounts[0] });
    });

    connector.on("disconnect", (error, payload) => {
        if (error) {
            throw error;
        }

        res.send('Wallet disconnected');
    });
});

//Web3.js Interaction Example:

app.post('/swap-tokens', async (req, res) => {
    const { fromToken, toToken, amount, userAddress } = req.body;

    const contract = new web3.eth.Contract(uniswapRouterABI, uniswapRouterAddress);

    try {
        const tx = await contract.methods.swapExactTokensForTokens(
            web3.utils.toWei(amount, 'ether'),
            0, // Accept any amount of output tokens
            [fromToken, toToken],
            userAddress,
            Math.floor(Date.now() / 1000) + 60 * 20 // 20 minutes from now
        ).send({ from: userAddress });

        res.json({ transactionHash: tx.transactionHash });
    } catch (error) {
        console.error('Error swapping tokens:', error);
        res.status(500).send('Server Error');
    }
});



