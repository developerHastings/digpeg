// Import the required libraries
const { ethers } = require('ethers');
const uniswapRouterAbi = require('./UniswapRouterABI.json'); // Assuming you have the ABI
const sushiswapRouterAbi = require('./SushiswapRouterABI.json');

// Connect to Ethereum (assuming the exchanges are on Ethereum)
const provider = new ethers.providers.JsonRpcProvider('https://mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID');
const wallet = new ethers.Wallet('YOUR_PRIVATE_KEY', provider);

// Define routers
const uniswapRouter = new ethers.Contract('UNISWAP_ROUTER_ADDRESS', uniswapRouterAbi, wallet);
const sushiswapRouter = new ethers.Contract('SUSHISWAP_ROUTER_ADDRESS', sushiswapRouterAbi, wallet);

// Tokens and amounts
const tokenIn = 'TOKEN_IN_ADDRESS';
const tokenOut = 'TOKEN_OUT_ADDRESS';
const amountIn = ethers.utils.parseUnits('1', 18); // 1 TokenIn
const amountOutMin = ethers.utils.parseUnits('0.9', 18); // Minimum output (to avoid slippage)

// Swapping on Uniswap
async function swapOnUniswap() {
    const uniswapTx = await uniswapRouter.swapExactTokensForTokens(
        amountIn,
        amountOutMin,
        [tokenIn, tokenOut],
        wallet.address,
        Math.floor(Date.now() / 1000) + 60 * 10 // 10 minutes from now
    );
    const uniswapReceipt = await uniswapTx.wait();
    console.log('Swapped on Uniswap:', uniswapReceipt);
}

// Swapping on Sushiswap
async function swapOnSushiswap() {
    const sushiswapTx = await sushiswapRouter.swapExactTokensForTokens(
        amountIn,
        amountOutMin,
        [tokenIn, tokenOut],
        wallet.address,
        Math.floor(Date.now() / 1000) + 60 * 10 // 10 minutes from now
    );
    const sushiswapReceipt = await sushiswapTx.wait();
    console.log('Swapped on Sushiswap:', sushiswapReceipt);
}

// Execute the cross-exchange swaps
async function crossExchangeSwap() {
    await swapOnUniswap();
    await swapOnSushiswap();
}

crossExchangeSwap().catch(console.error);
