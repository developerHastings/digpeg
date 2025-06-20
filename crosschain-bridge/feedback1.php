<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>
  <div class="container mt-5">
    <h1>Feedback on Web3.js Application</h1>
    <p>Here is the feedback related to the performance and integration with different blockchains:</p>
    
    <div class="accordion" id="blockchainFeedback">
      <?php
       $blockchains = [
        "Bitcoin (BTC)", "Ethereum (ETH)", "BNB Chain (BNB)", "Tether (USDT)", 
        "Solana (SOL)", "Cardano (ADA)", "XRP (XRP)", "Dogecoin (DOGE)", 
        "Polygon (MATIC)", "Polkadot (DOT)", "Avalanche (AVAX)", "Litecoin (LTC)", 
        "Chainlink (LINK)", "Stellar (XLM)", "Tron (TRX)", "Uniswap (UNI)", 
        "VeChain (VET)", "Cosmos (ATOM)", "Algorand (ALGO)", "Tezos (XTZ)",
        "Bitcoin Cash (BCH)", "Wrapped Bitcoin (WBTC)", "Filecoin (FIL)", 
        "Theta Network (THETA)", "Monero (XMR)", "EOS (EOS)", "Aave (AAVE)", 
        "Elrond (EGLD)", "IOTA (MIOTA)", "Near Protocol (NEAR)", "Kusama (KSM)",
        "Hedera (HBAR)", "Internet Computer (ICP)", "Zilliqa (ZIL)", 
        "PancakeSwap (CAKE)", "Waves (WAVES)", "SushiSwap (SUSHI)", "Dash (DASH)", 
        "Compound (COMP)", "Arweave (AR)", "Maker (MKR)", "Curve DAO (CRV)", 
        "Synthetix (SNX)", "Gala (GALA)", "The Graph (GRT)", "Loopring (LRC)", 
        "Ren (REN)", "1inch (1INCH)", "Balancer (BAL)", "Thorchain (RUNE)", 
        "Secret (SCRT)", "Livepeer (LPT)", "Chiliz (CHZ)", "Audius (AUDIO)", 
        "ICON (ICX)", "Ocean Protocol (OCEAN)", "DigiByte (DGB)", "Celo (CELO)", 
        "Enjin Coin (ENJ)", "Status (SNT)", "Harmony (ONE)", "Basic Attention Token (BAT)", 
        "Anchor Protocol (ANC)", "Orchid (OXT)", "Ardor (ARDR)", "Nervos Network (CKB)", 
        "Ravencoin (RVN)", "Bitcoin SV (BSV)", "NEM (XEM)", "Dfinity (ICP)", 
        "Ontology (ONT)", "Qtum (QTUM)", "Nexus Mutual (NXM)", "Kava (KAVA)", 
        "TomoChain (TOMO)", "Celo Dollar (CUSD)", "IoTeX (IOTX)", "Efinity (EFI)", 
        "API3 (API3)", "Storj (STORJ)", "Holo (HOT)", "UMA (UMA)", 
        "Multichain (MULTI)", "Yearn.Finance (YFI)", "Serum (SRM)", "Raydium (RAY)", 
        "Orbs (ORBS)", "Decentraland (MANA)", "Illuvium (ILV)", "Moonbeam (GLMR)", 
        "Osmosis (OSMO)", "Fantom (FTM)", "Radix (XRD)", "Gnosis (GNO)", 
        "Akash Network (AKT)", "Velas (VLX)", "Syscoin (SYS)", "Frax (FRAX)", 
        "Convex Finance (CVX)", "TrueFi (TRU)"
      ];

      foreach ($blockchains as $index => $blockchain) {
        echo '
        <div class="card">
          <div class="card-header" id="heading'.$index.'">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$index.'" aria-expanded="true" aria-controls="collapse'.$index.'">
                '.$blockchain.'
              </button>
            </h2>
          </div>
          <div id="collapse'.$index.'" class="collapse" aria-labelledby="heading'.$index.'" data-parent="#blockchainFeedback">
            <div class="card-body">
              <p>Feedback for '.$blockchain.':</p>
              <ul>
                <li>Integration: Ensure the Web3.js application interacts smoothly with the '.$blockchain.' network.</li>
                <li>Performance: Optimize API calls to reduce latency when interacting with the '.$blockchain.' blockchain.</li>
                <li>Security: Review smart contract security measures when operating on the '.$blockchain.' platform.</li>
                <li>Scalability: Evaluate how the Web3.js application performs under high transaction volumes on '.$blockchain.'.</li>
                <li>User Experience: Provide clear error messages and loading indicators when processing transactions on '.$blockchain.'.</li>
              </ul>
            </div>
          </div>
        </div>';
      }
      ?>
    </div>

    <!-- Button to Generate PDF -->
    <form action="generate_pdf.php" method="post">
      <button type="submit" class="btn btn-primary mt-4">Generate PDF Report</button>
    </form>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
