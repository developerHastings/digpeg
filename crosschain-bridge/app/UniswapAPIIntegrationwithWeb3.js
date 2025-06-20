/*
npm init -y
npm install express axios web3 @walletconnect/client dotenv

*/

const Web3 = require('web3');
const uniswapRouterABI = [...] // Uniswap Router ABI
const web3 = new Web3(Web3.givenProvider);

const uniswapRouterAddress = "0x..."; // Uniswap Router contract address
const uniswapRouter = new web3.eth.Contract(uniswapRouterABI, uniswapRouterAddress);

async function swapTokens() {
    const accounts = await web3.eth.requestAccounts();
    const fromToken = document.getElementById('fromToken').value;
    const toToken = document.getElementById('toToken').value;
    const fromAmount = web3.utils.toWei(document.getElementById('fromAmount').value, 'ether');

    const path = [fromToken, toToken];
    const deadline = Math.floor(Date.now() / 1000) + 60 * 20; // 20 minutes from the current Unix time

    uniswapRouter.methods.swapExactTokensForTokens(
        fromAmount,
        0, // Accept any amount of output tokens
        path,
        accounts[0], // User's address
        deadline
    ).send({ from: accounts[0] });
}
