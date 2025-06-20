<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DigPeg Exchange</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <style>
  .img-fluid.animated.zoomIn {
    /* Existing styles for zoomIn animation */
  }

  .digpeg-text {
    opacity: 0; /* Initially hide the text */
    animation: slide-in 0.5s ease-in-out forwards; /* Animation name, duration, easing, and playback */
  }

  @keyframes slide-in {
    from {
      transform: translateX(100%); /* Start from outside the viewable area on the right */
    }
    to {
      transform: translateX(0); /* End at the original position */
      opacity: 1; /* Show the text at the end */
    }
  }
  
  .block1, .block2, .block3, .block4, .block5 { /* Add classes for all blocks */
  opacity: 0; /* Initially hide the blocks */
  animation: drop-down 0.3s ease-in-out forwards; /* Animation properties */
  transform: translateY(-100%); /* Position blocks off-screen */
}

@keyframes drop-down {
  from {
    opacity: 0;
    transform: translateY(-100%);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.digpeg-text {
  animation-delay: 0s; /* No delay */
}

.block1 {
  animation-delay: 0.3s; /* Delay by 0.3s after the text animation */
}

.block2 {
  animation-delay: 0.6s; /* Delay by 0.6s after the text animation */
}

.logo-marquee {
            overflow: hidden;
            white-space: nowrap;
            margin-bottom: 20px;
        }

        .logo-marquee img {
            display: inline-block;
            margin-right: 5px; 
            max-height: 30px; 
            max-width: 30px; 
            object-fit: contain; 
        }

        .logo-marquee-content {
            animation: marquee 20s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }
        
        
        .profile-header {
    background-color: #D9DCF9;
    color: #A4F7A6;
    padding: 10px;
    text-align: center;
}

.summary {
    display: flex;
    justify-content: space-around;
    margin: 20px 0;
}

.summary-item {
    background-color: #fff;
    padding: 15px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.performance-section, .earnings-section, .positions-section, .strategies-section, .automation-section {
    background-color: #fff;
    margin: 20px 0;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

button {
    padding: 8px 12px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}

.swap-section {
    background-color: #fff;
    margin: 20px 0;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.swap-interface {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.token-select {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

label {
    font-weight: bold;
}

select, input {
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 16px;
}

button#swapButton {
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button#swapButton:hover {
    background-color: #0056b3;
}

.swap-section {
    background-color: #fff;
    margin: 20px 0;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.swap-interface, .transaction-overview {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.token-select, .slippage-section, .platform-fee, .chain-select {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

label {
    font-weight: bold;
}

select, input {
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 16px;
}

button#swapButton {
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button#swapButton:hover {
    background-color: #0056b3;
}

.transaction-overview h3 {
    margin-bottom: 10px;
}

.transaction-overview p {
    margin: 5px 0;
}

.basic-2 {
	padding-top: 7.75rem;
	padding-bottom: 5.25rem;
}

.basic-2 .h2-heading {
	margin-bottom: 0.75rem;
	text-align: center;
}

.basic-2 .p-heading {
	margin-bottom: 4rem;
	text-align: center;
}

.basic-2 .text-box {
	margin-bottom: 3rem;
	padding: 3.5rem 1rem 2.125rem 1rem;
	border: 1px solid #cfd7de;
}

.basic-2 .fas,
.basic-2 .far {
	margin-bottom: 1.75rem;
	color: #0b36a8;
	font-size: 3.5rem;
}

.basic-2 h4 {
	letter-spacing: 1px;
}

</style>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        
        <div class="w-full max-w-4xl mx-auto mt-12">
  <!-- Tabs Navigation -->
  <div class="flex justify-center gap-4 bg-white shadow-md rounded-md p-2">
    <button class="tab-button flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600" data-tab="verify">
      <!-- BadgeCheck Icon SVG -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M9 12l2 2l4 -4" />
        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2z" />
      </svg>
      <span>Verify</span>
    </button>
    <button class="tab-button flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600" data-tab="swap">
      <!-- RefreshCcw Icon SVG -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <polyline points="1 4 1 10 7 10" />
        <polyline points="23 20 23 14 17 14" />
        <path d="M20.49 9A9 9 0 0 0 6.5 5.5L1 10" />
        <path d="M3.51 15A9 9 0 0 0 17.5 18.5L23 14" />
      </svg>
      <span>Swap</span>
    </button>
    <button class="tab-button flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600" data-tab="liquidity">
      <!-- Waves Icon SVG -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M2 6c.5 0 1 .2 1.4.6a2 2 0 0 0 2.8 0A2 2 0 0 1 8.6 6a2 2 0 0 1 1.4.6 2 2 0 0 0 2.8 0A2 2 0 0 1 14.6 6a2 2 0 0 1 1.4.6 2 2 0 0 0 2.8 0A2 2 0 0 1 21.6 6" />
        <path d="M2 12c.5 0 1 .2 1.4.6a2 2 0 0 0 2.8 0A2 2 0 0 1 8.6 12a2 2 0 0 1 1.4.6 2 2 0 0 0 2.8 0A2 2 0 0 1 14.6 12a2 2 0 0 1 1.4.6 2 2 0 0 0 2.8 0A2 2 0 0 1 21.6 12" />
        <path d="M2 18c.5 0 1 .2 1.4.6a2 2 0 0 0 2.8 0A2 2 0 0 1 8.6 18a2 2 0 0 1 1.4.6 2 2 0 0 0 2.8 0A2 2 0 0 1 14.6 18a2 2 0 0 1 1.4.6 2 2 0 0 0 2.8 0A2 2 0 0 1 21.6 18" />
      </svg>
      <span>Liquidity Snap</span>
    </button>
    <button class="tab-button flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600" data-tab="gpu">
  <!-- CPU Icon SVG -->
  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path d="M9 12l2 2l4 -4" />
    <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2z" />
  </svg>
  <span>GPU on Solar</span>
</button>

    
  </div>

  <!-- Tabs Content -->
  <div class="mt-4">
    <div class="tab-content" id="verify">
      <iframe src="https://digpegexchange.com/verification/" style="width:100%; height:800px; border:none;"></iframe>
      <div class="p-4 bg-white shadow rounded"></div>
    </div>
    <div class="tab-content hidden" id="swap">
      <!-- Embed the external swap interface -->
        <iframe src="https://mcvaultx.com/" title="Swap Interface" style="width:100%; height:800px; border:none;"></iframe>

    </div>
    <div class="tab-content hidden" id="liquidity">
      <!-- Display mock liquidity pair data -->
      <div class="p-4 bg-white shadow rounded">
        <p></p>
        <div class="tab-content hidden" id="gpu">
  <!-- Embed the GPU on Solar content here -->
  <!--<iframe src="https://yourdomain.com/gpu-on-solar/" title="GPU on Solar Interface" class="w-full h-[600px] border rounded"></iframe>-->
</div>

      </div>
    </div>
  </div>
</div>



        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">DigPeg</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="http://kwelinda.com/" class="nav-item nav-link">Risk Management</a>
                        <a href="#explore" class="nav-item nav-link">Explore DPC</a>
                        <a href="#overview" class="nav-item nav-link">Our RoadMap</a>
                        <a href="#pricing" class="nav-item nav-link">Pricing</a>
                        <a href="#crosschain" class="nav-item nav-link">Cross-Chain Bridge</a>
                        <a href="https://www.digpegexchange.com/walletpage.php" class="nav-item nav-link">Register Details</a>
                        <!--<a href="#testimonial" class="nav-item nav-link">Testimonial</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>-->
                    </div>
                    <a href="digpegexconsultation.php" class="btn btn-light rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Consult For 50$</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">Unlock Your Project's Potential</h1>
                            <p class="text-white pb-3 animated slideInDown">TRANSFORM YOUR PROJECT WITH EXPERT GUIDANCE IN JUST 3 HOURS!</p>
                            <div class="position-relative w-100 mt-3">
                                <!--<input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 58px;">
                                <button type="button" class="btn btn-primary rounded-pill py-2 px-3 shadow-none position-absolute top-0 end-0 m-2">Free Trail</button>-->
                            </div>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <img class="img-fluid rounded animated zoomIn" src="img/DigPeg Ex logo-01.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Feature Start -->
    <div class="col-lg-12">    
    <h2 class="h2-heading">BUILDING A ROBUST ECOSYSTEM FOR DPC</h2>    
        
        <div class="container-xxl py-6">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-edit text-primary mb-4"></i>
                            <h5 class="mb-3">Define Utility</h5>
                            <p class="m-0">Utility: Clearly define the utility of DigPeg, linking it directly to the digital product. For instance, the token could grant access to the ERP software, provide discounts, or offer premium features. Value Proposition: Establish the benefits and advantages of using DigPeg over traditional payment methods or subscription models for the software.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-edit text-primary mb-4"></i>
                            <h5 class="mb-3">Design Token and Utility</h5>
                            <p class="m-0">The Blockchain Platform: Choose a blockchain platform that supports smart contracts (e.g., Ethereum, Binance Smart Chain). Smart Contracts: Develop smart contracts that govern the issuance, distribution, and utility of DigPeg. Ensure they are secure and transparent. Standards: Follow widely accepted token standards (e.g., ERC-20, ERC-721) for compatibility and ease of integration.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-edit text-primary mb-4"></i>
                            <h5 class="mb-3">Create a Digital Product Backing Mechanism</h5>
                            <p class="m-0">Software Integration: Integrate the ERP software with the blockchain to enable seamless token transactions. For example, users can pay with DigPeg to unlock features or access services. Licensing and Access: Ensure that holding a certain amount of DigPeg provides users with a software license or access rights.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-edit text-primary mb-4"></i>
                            <h5 class="mb-3">Compliance</h5>
                            <p class="m-0">Legal Framework: Understand the legal implications of tokenizing software access and ensure compliance with relevant regulations. Consultation: Work with legal experts to navigate the regulatory landscape, focusing on securities and commodity laws.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-edit text-primary mb-4"></i>
                            <h5 class="mb-3">Market Establishment and Liquidity</h5>
                            <p class="m-0">Exchanges: List DigPeg on reputable cryptocurrency exchanges to provide liquidity and accessibility. Market Makers: Engage with market makers to ensure sufficient liquidity and stable pricing. Partnerships: Form partnerships with other businesses and platforms that can utilize or accept Digpeg, expanding its ecosystem.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-edit text-primary mb-4"></i>
                            <h5 class="mb-3">Transparency and Trust</h5>
                            <p class="m-0">Whitepaper: Publish a comprehensive whitepaper detailing the token’s utility, the digital product backing, and the technical aspects. Audits: Conduct regular security and financial audits to maintain transparency and build trust with users and investors.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-sync text-primary mb-4"></i>
                            <h5 class="mb-3">Community and Ecosystem Development</h5>
                            <p class="m-0">Community Building: Engage with your community through forums, social media, and events to foster adoption and loyalty. Developer Support: Encourage developers to build on your platform, creating additional use cases and integrations for DigPeg.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-draw-polygon text-primary mb-4"></i>
                            <h5 class="mb-3">Promotion and Adoption</h5>
                            <p class="m-0">Marketing Campaign: Launch targeted marketing campaigns to promote Digpeg and its association with the ERP software. User Incentives: Offer incentives such as early adopter bonuses, referral rewards, and loyalty programs to drive adoption.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Feature End -->
        
        
        <!-- New Feature Begin -->
    
<div id="explore" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">EMPOWERING THE DIGITAL ECONOMY WITH DPC</h2>
                    <!--<p class="p-heading">Web design and development have been my bread and butter for more than 5 years. During that time I've discovered that I can help startups and companies with the following services</p>-->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-box">
                        <i class="far fa-gem"></i>
                        <h4>PROBLEMS & SOLUTIONS</h4><br>
                        <h5>1. Problem: Lack of Digital Product Accessibility</h5><br>
                        <p>Solution: DPC can serve as a marketplace token, enabling users to access and purchase 1 million digital products, including decentralized software, media, and tools. By tokenizing access, it simplifies transactions and encourages the use of decentralized platforms.</p><br>
                        <h5>2. Problem: Energy Efficiency in Emerging Tech</h5><br>
                        <p>Solution: DPC can incentivize contributions toward energy-efficient technologies like solar, wind, and geothermal energy. With energy contributions, users can receive DPC tokens in exchange, promoting sustainable energy innovations.</p><br>
                        <h5>3. Problem: High Transaction Fees in Cross-Border Payments</h5><br>
                        <p>Solution: DPC offers a low-fee digital currency that can be used for cross-border payments, enabling smooth international transfers for digital products and services, reducing reliance on traditional financial systems.</p><br>
                        <h5>4. Problem: Inefficient Digital Product Distribution</h5><br>
                        <p>Solution: By leveraging blockchain for digital product management, DPC can streamline the distribution of 1 million decentralized products, ensuring quick, secure, and transparent delivery of products like e-books, software, or music.</p><br>
                        <h5>5. Problem: Limited Developer Tools for Decentralized Apps</h5><br>
                        <p>Solution: DPC can fund and incentivize developers to build decentralized applications (dApps) around its ecosystem, providing necessary resources and token rewards for creating digital solutions that scale the platform’s reach.</p><br>
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-box">
                        <i class="fas fa-code"></i>
                        <h4>INTERACTION WITH DEVELOPMENT</h4><br>
                        <h5>1. Open-Source Development Environment</h5>
                        <br>
                        <p>DPC could fund hackathons, provide API access, and documentation for developers to build dApps on its ecosystem, incentivizing them through grants and tokens.</p><br>
                        <h5><p>2. Developer Reward Programs</h5>
                        <br>
                        <p>Developers can be incentivized to create integrations with the DPC platform, such as wallet apps, exchanges, or other blockchain services, by offering rewards based on usage or volume.</p><br>
                        <h5>3. Smart Contract Templates</h5>
                        <br>
                        <p>By providing ready-made smart contract templates for digital product distribution and token incentives, developers can easily implement DPC-based functionalities within their platforms.</p><br>
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-box">
                        <i class="fas fa-tv"></i>
                        <h4>DIGITIZATION OF ONE MILLION DIGITAL PRODUCTS</h4><br>
                        <h5>1. Tokenized Access to DeSoft Software:</h5>
                        <br>
                        <p>DPC can power a platform where 1 million decentralized software products are tokenized, offering users lifetime access upon accumulating certain token thresholds.</p><br>
                        <h5>2. Marketplace for Digital Content</h5>
                        <br>
                        <p>DPC could tokenize 1 million digital products such as e-books, courses, and media content, making them easily purchasable via the DPC platform, ensuring efficient product distribution and access globally.</p><br>
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->        
        
        
        
        
        
        
        
        
        
        
        
        
        <!-- New Feature End -->


        <!-- About Start -->
        <div class="container-xxl py-6" id="about">
            <div class="container">
                <div class="row g-5 flex-column-reverse flex-lg-row">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4">What is DigPeg?</h1>
                        <p class="mb-4">DigiPegCoin (DPC) is a revolutionary cryptocurrency designed to evenly distribute value among its holders by pegging its price to 10% of the average value of one million digital products. DPC aims to provide a fair and decentralized platform where digital product owners can transfer ownership and share value with collaborators. This whitepaper outlines the tokenomics, distribution, functionalities, and roadmap of DPC, detailing its innovative approach to integrating the digital economy with blockchain technology.</p>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary text-white">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="ms-4">
                                <h5>Reliability</h5>
                                <p class="mb-0">In the evolving digital economy, there is a need for a reliable and fair system that allows the seamless transfer of ownership and value among digital product owners and investors. DigiPegCoin (DPC) addresses this need by creating a token that is pegged to the average value of one million digital products, ensuring its value is tied to real digital assets.</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary text-white">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="ms-4">
                                <h5>Access</h5>
                                <p class="mb-0">Receive access to premium ERP features or discounted services by backing DigPeg.</p>
                            </div>
                        </div>
                        <!--<a href="" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill mt-3">Read More</a>-->
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid rounded wow zoomIn" data-wow-delay="0.5s" src="img/about-01.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    
        
        
        
        
         <!-- Roadmap Start -->
        
        <div class="container-xxl bg-light my-6 py-5" id="overview">
            <h1 class="m-0">OUR ROADMAP</h1>
            <div class="container">
                <div class="row g-5 py-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" src="img/overview-1-01.png">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="mb-0">Phase 01</h1>
                            <span class="bg-primary mx-2" style="width: 30px; height: 2px;"></span>
                            <h5 class="mb-0">Token Creation</h5>
                        </div>
                        <!--<p class="mb-4">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo eirmod magna dolore erat amet</p>-->
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Task: Create the DPC Token</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Timeframe: 6 AM - 2 PM</p>
                        <!--<p class="mb-0"><i class="fa fa-check-circle text-primary me-3"></i>More effective & poerwfull</p>-->
                    </div>
                </div>
                <div class="row g-5 py-5 align-items-center flex-column-reverse flex-lg-row">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="mb-0">Phase 02</h1>
                            <span class="bg-primary mx-2" style="width: 30px; height: 2px;"></span>
                            <h5 class="mb-0">Listing On Exchange</h5>
                        </div>
                        <!--<p class="mb-4">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo eirmod magna dolore erat amet</p>-->
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Task: List DPC on an exchange for trading</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Timeframe: 6 AM - 2 PM</p>
                        <p class="mb-0"><i class="fa fa-check-circle text-primary me-3"></i>More effective & poerwfull</p>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" src="img/overview-2-01.png">
                    </div>
                </div>
                <div class="row g-5 py-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" src="img/overview-3-01.png">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="mb-0">Phase 03</h1>
                            <span class="bg-primary mx-2" style="width: 30px; height: 2px;"></span>
                            <h5 class="mb-0">Liquidity Supply</h5>
                        </div>
                        <!--<p class="mb-4">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo eirmod magna dolore erat amet</p>-->
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Task: Allow people to supply liquidity for DPC</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Timeframe: 6 AM - 2 PM</p>
                        <p class="mb-0"><i class="fa fa-check-circle text-primary me-3"></i>More effective & poerwfull</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Roadmap End -->


        <!-- Advanced Feature Start -->
        <!--<div class="container-xxl py-6" id="features">
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Advanced Features</h1>
                    <p class="mb-5">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="advanced-feature-item text-center rounded py-5 px-4">
                            <i class="fa fa-edit fa-3x text-primary mb-4"></i>
                            <h5 class="mb-3">Fully Customizable</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="advanced-feature-item text-center rounded py-5 px-4">
                            <i class="fa fa-sync fa-3x text-primary mb-4"></i>
                            <h5 class="mb-3">App Integration</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="advanced-feature-item text-center rounded py-5 px-4">
                            <i class="fa fa-laptop fa-3x text-primary mb-4"></i>
                            <h5 class="mb-3">High Resolution</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="advanced-feature-item text-center rounded py-5 px-4">
                            <i class="fa fa-draw-polygon fa-3x text-primary mb-4"></i>
                            <h5 class="mb-3">Drag And Drop</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- Advanced Feature End -->


        <!-- Facts Start -->
        <div class="container-xxl bg-primary my-6 py-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="mb-0">The total supply of DigPegCoin (DPC) is 100,000,000 tokens!</h1> <br>
                
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-certificate fa-3x text-white mb-3"></i>
                        <h1 class="mb-2" data-toggle="counter-up">100,000,000</h1>
                        <p class="text-white mb-0">Token Count</p>
                    </div> <br>
                    <h5>This fixed supply ensures scarcity and potential value appreciation over time.</h5>

                                    </div>
            </div>
        </div>
        <!-- Facts End -->


        <!-- Process Start -->
        <!--<div class="container-xxl py-6">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" src="img/process.jpg">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <h1 class="mb-4">Three Simple Steps To Start Working With</h1>
                        <p class="mb-4">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo eirmod magna dolore erat amet</p>
                        <ul class="process mb-0">
                            <li>
                                <span><i class="fa fa-cog"></i></span>
                                <div>
                                    <h5>Install the Software</h5>
                                    <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos erat ipsum et lorem et sit</p>
                                </div>
                            </li>
                            <li>
                                <span><i class="fa fa-address-card"></i></span>
                                <div>
                                    <h5>Setup Your Profile</h5>
                                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo</p>
                                </div>
                            </li>
                            <li>
                                <span><i class="fa fa-check"></i></span>
                                <div>
                                    <h5>Enjoy The Features</h5>
                                    <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- Process End -->


<!-- Pricing Start -->
<div class="container-xxl py-6" id="pricing">
    <div class="container">
        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">WE OFFER TWO</h1>
            <p class="mb-5">PACKAGES</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="price-item rounded overflow-hidden">
                    <div class="bg-dark p-4">
                        <h4 class="text-white mt-2">Digital Products Verification Package</h4>
                        <div class="text-white">
                            <span class="align-top fs-4 fw-bold">$</span>
                            <h1 class="d-inline display-6 text-primary mb-0"> 299.00</h1>
                           
                        </div>
                    </div>
                    <div class="p-4">
                        <form action="checkout-verification.html" method="POST">
                            <input type="hidden" name="package" value="Digital Products Verification">
                            <input type="hidden" name="amount" value="299">
                            <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 mt-3">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="price-item rounded overflow-hidden">
                    <div class="bg-dark p-4">
                        <h4 class="text-white mt-2">Digital Products Exit Package</h4>
                        <div class="text-white">
                            <span class="align-top fs-4 fw-bold">$</span>
                            <h1 class="d-inline display-6 text-primary mb-0"> 100,000.00</h1>
                           
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3"><span>For 10% Ownership Stake</span><i class="fa fa-check text-success pt-1"></i></div>
                        <form action="checkout-exit.html" method="POST">
                            <input type="hidden" name="package" value="Digital Products Exit">
                            <input type="hidden" name="amount" value="100,000">
                            <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 mt-3">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pricing End -->


<!-- Subscription Pricing Start -->
        <!--<div class="container-xxl py-6" id="pricing">
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    
                    <p class="mb-5">SUBSCRIPTION PLANS</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="price-item rounded overflow-hidden">
                            <div class="bg-dark p-4">
                                <h4 class="text-white mt-2">Basic Plan (Free)</h4>
                                <div class="text-white">
                                    <span class="align-top fs-4 fw-bold">$</span>
                                    <h1 class="d-inline display-6 text-primary mb-0"> 0.00</h1>
                                    <span class="align-baseline">/ Month</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3"><span>Basic Portfolio Tracking</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Limited Alerts (e.g 5 Alerts Per Month)</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Access To Free Educational Content</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Target Audience: New users, Hobbyists, or those exploring DeFi tools with minimal risk.</span><i class="fa fa-check text-success pt-1"></i></div>                                
                                <a href="basic-plan-form-collection.php" class="btn btn-dark rounded-pill py-2 px-4 mt-3">Subscribe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="price-item rounded overflow-hidden">
                            <div class="bg-primary p-4">
                                <h4 class="text-white mt-2">Pro Plan</h4>
                                <div class="text-white">
                                    <span class="align-top fs-4 fw-bold">$</span>
                                    <h1 class="d-inline display-6 text-dark mb-0"> 29.00</h1>
                                    <span class="align-baseline">/ Month</span>
                                    <br>
                                    <span class="align-top fs-4 fw-bold">$</span>
                                    <h1 class="d-inline display-6 text-dark mb-0"> 290.00</h1>
                                    <span class="align-baseline">/ Year (2 Months Free. Equivalent to $24.17/Month)</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3"><span>Advanced Portfolio Analytics and Tracking</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Unlimited Alerts</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Access To Predictive Analytics (Basic AI/ML Insights)</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Automated Trading Bots (Limited To A Set Number Of Bots)</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Risk Management Tools (Basic Risk Scores, Limited Insurance Options)</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Access To A Dedicated Support Channel (Email Support)</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Target Audience: Active DeFi Traders, Investors Who Need More Advanced Tools, And Those Who Trade Frequently.</span><i class="fa fa-check text-success pt-1"></i></div>
                                <a href="" class="btn btn-primary rounded-pill py-2 px-4 mt-3">Subscribe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="price-item rounded overflow-hidden">
                            <div class="bg-dark p-4">
                                <h4 class="text-white mt-2">Premium Plan</h4>
                                <div class="text-white">
                                    <span class="align-top fs-4 fw-bold">$</span>
                                    <h1 class="d-inline display-6 text-primary mb-0"> 79.00</h1>
                                    <span class="align-baseline">/ Month</span>
                                    <br>
                                    <span class="align-top fs-4 fw-bold">$</span>
                                    <h1 class="d-inline display-6 text-primary mb-0"> 790.00</h1>
                                    <span class="align-baseline">/ Year (2 Months Free. Equivalent to $65.83/Month)</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3"><span>All Pro Features Included</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Full Access To Predictive Analytics (Advanced AI/ML Insights)</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Unlimited Trading Bots With Advanced Configurations</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Full Risk Management Tools (Detailed Risk Scores, Integration With mMultiple DeFi Insurance Providers)</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Priority Support (24/7 Live Chat and Phone Support)</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Early Access To New Features and Beta Tools</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Access To Exclusive Educational Content and Webinars</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Custom Alerts and Compliance Monitoring</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Target Audience: Professional Traders, Institutional Investors, and Users Who Require Comprehensive Tools and Support.</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Discounts and Incentives</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Annual Plan Discounts: Offering Two Months Free For Annual Plans Is A Common Practice To Encourage Long-Term Commitments.</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Referral Bonuses: Provide Discounts or Free Months For Users Who Refer New Paying Subscribers.</span><i class="fa fa-check text-success pt-1"></i></div>
                                <div class="d-flex justify-content-between mb-3"><span>Access To Exclusive Educational Content and Webinars</span><i class="fa fa-check text-success pt-1"></i></div>
                                <a href="" class="btn btn-dark rounded-pill py-2 px-4 mt-3">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        
        <!-- Subscription Pricing End -->


        <!-- Testimonial Start -->
        <!--<div class="container-xxl py-6" id="testimonial">
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">What Our Clients Say</h1>
                    <p class="mb-5">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- Testimonial End -->


        <!-- Contact Start -->
        <!--<div class="container-xxl py-6" id="contact">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-3">Get In Touch</h1>
                        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary text-white">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Call Us</p>
                                <h5 class="mb-0">+012 345 6789</h5>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary text-white">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Mail Us</p>
                                <h5 class="mb-0">info@example.com</h5>
                            </div>
                        </div>
                        <div class="d-flex mb-0">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary text-white">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Our Office</p>
                                <h5 class="mb-0">123 Street, New York, USA</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- Contact End -->
        
   <div class="container-fluid bg-dark text-body footer wow fadeIn" data-wow-delay="0.1s">     
        <div class="cross-chain-bridge" id="crosschain">
            
            <h1>DeFi Profile: 0xacfba...8d0f</h1>

            <p class="section-title text-white h5 mb-4">DeFi Profile: 0xacfba...8d0r<span></span></p><br>
            <p class="section-title text-white h5 mb-4">0 Followers<span></span></p>
            
        
    </div>

    <div class="summary">
        <div class="summary-item">
            <h2>Total Value</h2>
            <p>$59.90</p>
        </div>
        <div class="summary-item">
            <h2>Total Liquidity</h2>
            <p>$56.68</p>
        </div>
        <div class="summary-item">
            <h2>Unclaimed Fees</h2>
            <p>$3.23</p>
        </div>
        <div class="summary-item">
            <h2>Fees Generated</h2>
            <p>$3.23</p>
        </div>
    </div>

    <div class="performance-section">
        <h2>Performance</h2>
        <p>-73%</p>
        <!-- Performance Chart Placeholder -->
    </div>

    <div class="earnings-section">
        <h2>Earning</h2>
        <p>$3.23</p>
        <small>+0.02</small>
    </div>

    <div class="positions-section">
        <h2>Open Positions (6)</h2>
        <table>
            <thead>
                <tr>
                    <th>Pool Name</th>
                    <th>Liquidity</th>
                    <th>Profit & Loss</th>
                    <th>24h Earning</th>
                    <th>APR</th>
                    <th>Price Range</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>USDT/DPC</td>
                    <td>$129.15</td>
                    <td>$18.27</td>
                    <td>$0</td>
                    <td>0%</td>
                    <td>1.0 - 1.5</td>
                    <td>about 2 months</td>
                    <td><button>Add Liquidity</button></td>
                </tr>
                <tr>
                    <td>ETH/BNB</td>
                    <td>$22.60</td>
                    <td>-$5.29</td>
                    <td>$0</td>
                    <td>0%</td>
                    <td>0.5 - 1.2</td>
                    <td>about 2 months</td>
                    <td><button>Add Liquidity</button></td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
    </div>

    <div class="strategies-section">
        <h2>Strategies</h2>
        <!-- Content for strategies -->
    </div>

    <div class="automation-section">
        <h2>Automation</h2>
        <!-- Content for automation tools -->
    </div>
    
  <div class="swap-section">
        <h2>Swap Tokens</h2>
        <div class="swap-interface">
             <div class="chain-select">
                <label for="chainSelect">Select Chain</label>
               <select id="chainSelect">
    <option value="Ethereum">Ethereum</option>
    <option value="Tron">Tron</option>
    <option value="Solana">Solana</option>
    <option value="BSC">BSC</option>
    <option value="Arbitrum">Arbitrum</option>
    <option value="Base">Base</option>
    <option value="Blast">Blast</option>
    <option value="Avalanche">Avalanche</option>
    <option value="Polygon">Polygon</option>
    <option value="Hyperliquid">Hyperliquid</option>
    <option value="Scroll">Scroll</option>
    <option value="Bitcoin">Bitcoin</option>
    <option value="Sui">Sui</option>
    <option value="Optimism">Optimism</option>
    <option value="TON">TON</option>
    <option value="Linea">Linea</option>
    <option value="Mantle">Mantle</option>
    <option value="Cronos">Cronos</option>
    <option value="Modezk">Modezk</option>
    <option value="Link">Link</option>
    <option value="Nova">Nova</option>
    <option value="Aptos">Aptos</option>
    <option value="Bitlayer">Bitlayer</option>
    <option value="Thorchain">Thorchain</option>
    <option value="PulseChain">PulseChain</option>
    <option value="Gnosis">Gnosis</option>
    <option value="Starknet">Starknet</option>
    <option value="CORE">CORE</option>
    <option value="Near">Near</option>
    <option value="Cardano">Cardano</option>
    <option value="BSquare">BSquare</option>
    <option value="dYdX">dYdX</option>
    <option value="Rootstock">Rootstock</option>
    <option value="Merlin">Merlin</option>
    <option value="Kava">Kava</option>
    <option value="Ronin">Ronin</option>
    <option value="Fantom">Fantom</option>
    <option value="ICP">ICP</option>
    <option value="EOS">EOS</option>
    <option value="Mixin">Mixin</option>
    <option value="Fusion">Fusion</option>
    <option value="MultiversX">MultiversX</option>
    <option value="Osmosis">Osmosis</option>
    <option value="Sei">Sei</option>
    <option value="Celo">Celo</option>
    <option value="Stacks">Stacks</option>
    <option value="zkSync Era">zkSync Era</option>
    <option value="Kaia">Kaia</option>
    <option value="Algorand">Algorand</option>
    <option value="Filecoin">Filecoin</option>
    <option value="Bounce">Bounce</option>
    <option value="BitWEMIX 3.0">BitWEMIX 3.0</option>
    <option value="Tezos">Tezos</option>
    <option value="Hedera">Hedera</option>
    <option value="Hydration">Hydration</option>
    <option value="Injective">Injective</option>
    <option value="Metis">Metis</option>
    <option value="Manta">Manta</option>
    <option value="Reya Network">Reya Network</option>
    <option value="K2">K2</option>
    <option value="BOB">BOB</option>
    <option value="DefiChain">DefiChain</option>
    <option value="Fraxtal">Fraxtal</option>
    <option value="Kujira">Kujira</option>
    <option value="opBNB">opBNB</option>
    <option value="Telos">Telos</option>
    <option value="Radix">Radix</option>
    <option value="NEOM">NEOM</option>
    <option value="Moonbeam">Moonbeam</option>
    <option value="Conflux">Conflux</option>
    <option value="Neutron">Neutron</option>
    <option value="Astar">Astar</option>
    <option value="Bifrost Network">Bifrost Network</option>
    <option value="Flow">Flow</option>
    <option value="Mayachain">Mayachain</option>
    <option value="MAP Protocol">MAP Protocol</option>
    <option value="Canto">Canto</option>
    <option value="Bitcoincash">Bitcoincash</option>
    <option value="Aurora">Aurora</option>
    <option value="IoTeX">IoTeX</option>
    <option value="Immutable">Immutable</option>
    <option value="zkEVM">zkEVM</option>
    <option value="Flare">Flare</option>
    <option value="Taiko">Taiko</option>
    <option value="Polygon zkEVM">Polygon zkEVM</option>
    <option value="Secret">Secret</option>
    <option value="Stellar">Stellar</option>
    <option value="Waves">Waves</option>
    <option value="Venom">Venom</option>
    <option value="Icon">Icon</option>
    <option value="FSCX">FSCX</option>
    <option value="Alephium">Alephium</option>
    <option value="Chiliz">Chiliz</option>
    <option value="XDC">XDC</option>
    <option value="BifrostProton">BifrostProton</option>
    <option value="Ontology">Ontology</option>
    <option value="Onus">Onus</option>
    <option value="Oraichain">Oraichain</option>
    <option value="Carbon">Carbon</option>
    <option value="DFS Network">DFS Network</option>
</select>

            </div>
            <div class="token-select">
                <label for="fromToken">From</label>
                <select id="fromToken">
                    <option value="ETH">ETH</option>
                    <option value="USDT">USDT</option>
                    <option value="BNB">BNB</option>
                    <!-- Add more tokens as needed -->
                </select>
                <input type="number" id="fromAmount" placeholder="Amount" />
            </div>
            <div class="token-select">
                <label for="toToken">To</label>
                <select id="toToken">
                    <option value="USDT">USDT</option>
                    <option value="ETH">ETH</option>
                    <option value="BNB">BNB</option>
                    <!-- Add more tokens as needed -->
                </select>
                <input type="number" id="toAmount" placeholder="Estimated Amount" disabled />
            </div>
            <div class="slippage-section">
                <label for="slippage">Slippage Tolerance</label>
                <input type="number" id="slippage" value="0.10" step="0.01" /> %
            </div>
            <div class="platform-fee">
                <label>Platform Fee</label>
                <p>0.5%</p>
            </div>
           
            <button id="swapButton">Swap</button>
        </div>
        <div class="transaction-overview">
            <h3>Transaction Overview</h3>
            <p>Minimum AAVE received: <span id="minReceived">0.0704744</span></p>
            <p>Minimum USD value received: <span id="minValue">$7.82</span></p>
            <p>Platform Fee: <span id="platformFee">$1.61</span></p>
        </div>
    </div>

    


        <p>Data updated 28 mins ago</p>
        
        
        <div class="logo-marquee">
    <div class="logo-marquee-content">
        <img src="logo1.png" alt="Logo 1">
        <img src="logo2.png" alt="Logo 2">
        <img src="logo3.png" alt="Logo 3">
        <img src="logo4.png" alt="Logo 4">
        <img src="logo5.png" alt="Logo 5">
        <img src="logo6.png" alt="Logo 6">
        <img src="logo7.png" alt="Logo 7">
        <img src="logo8.png" alt="Logo 8">
        <img src="logo9.png" alt="Logo 9">
        <img src="logo10.png" alt="Logo 10">
        <img src="logo11.png" alt="Logo 11">
        <img src="logo12.png" alt="Logo 12">
        <img src="logo13.png" alt="Logo 13">
        <img src="logo14.png" alt="Logo 14">
        <img src="logo15.png" alt="Logo 15">
        <img src="logo16.png" alt="Logo 16">
        <img src="logo17.png" alt="Logo 17">
        <img src="logo18.png" alt="Logo 18">
        <img src="logo19.png" alt="Logo 19">
        <img src="logo20.png" alt="Logo 20">
        <img src="logo21.png" alt="Logo 21">
        <img src="logo22.png" alt="Logo 22">
        <img src="logo23.png" alt="Logo 23">
        <img src="logo24.png" alt="Logo 24">
        <img src="logo25.png" alt="Logo 25">
        <img src="logo26.png" alt="Logo 26">
        <img src="logo27.png" alt="Logo 27">
        <img src="logo28.png" alt="Logo 28">
        <img src="logo29.png" alt="Logo 29">
        <img src="logo30.png" alt="Logo 30">
        <img src="logo31.png" alt="Logo 31">
        <img src="logo32.png" alt="Logo 32">
        <img src="logo33.png" alt="Logo 33">
        <img src="logo34.png" alt="Logo 34">
        <img src="logo35.png" alt="Logo 35">
        <img src="logo36.png" alt="Logo 36">
        <img src="logo37.png" alt="Logo 37">
        <img src="logo38.png" alt="Logo 38">
        <img src="logo39.png" alt="Logo 39">
        <img src="logo40.png" alt="Logo 40">
        <img src="logo41.png" alt="Logo 41">
        <img src="logo42.png" alt="Logo 42">
        <img src="logo43.png" alt="Logo 43">
        <img src="logo44.png" alt="Logo 44">
        <img src="logo45.png" alt="Logo 45">
        <img src="logo46.png" alt="Logo 46">
        <img src="logo47.png" alt="Logo 47">
        <img src="logo48.png" alt="Logo 48">
        <img src="logo49.png" alt="Logo 49">
        <img src="logo50.png" alt="Logo 50">
        <img src="logo51.png" alt="Logo 51">
        <img src="logo52.png" alt="Logo 52">
        <img src="logo53.png" alt="Logo 53">
        <img src="logo54.png" alt="Logo 54">
        <img src="logo55.png" alt="Logo 55">
        <img src="logo56.png" alt="Logo 56">
        <img src="logo57.png" alt="Logo 57">
        <img src="logo58.png" alt="Logo 58">
        <img src="logo59.png" alt="Logo 59">
        <img src="logo60.png" alt="Logo 60">
        <img src="logo61.png" alt="Logo 61">
        <img src="logo62.png" alt="Logo 62">
        <img src="logo63.png" alt="Logo 63">
        <img src="logo64.png" alt="Logo 64">
        </div>
</div>
</div>
        
        
    

<!-- Facts Start -->
<div class="container-xxl bg-primary my-6 py-6 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        
        <h1 class="mb-0">DigPeg Token Pegging Services Have Executed</h1> <br>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-exchange fa-3x text-white mb-3"></i>
                <h1 class="mb-2" data-toggle="counter-up">16,569,555</h1>
                <p class="text-white mb-0">TRANSACTIONS</p>
            </div>
            

            
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-globe fa-3x text-white mb-3"></i>
                <h1 class="mb-2" data-toggle="counter-up">100</h1>
                <p class="text-white mb-0">ON BLOCKCHAIN NETWORKS</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-cogs fa-3x text-white mb-3"></i>
                <h1 class="mb-2" data-toggle="counter-up">11</h1>
                <p class="text-white mb-0">AND PROTOCOLS</p>
            </div>
            
        </div>
    </div>
</div>
<!-- Facts End -->    
        
        
   

    <script src="app/app.js"></script>
    <script src="app/UniswapAPIIntegrationwithWeb3.js"></script>
            
    </div>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-body footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Social<span></span></p>
                        <!--<p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope me-3"></i>info@example.com</p>-->
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://x.com/DigPeg39928?s=08"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Quick Link<span></span></p>
                        <a class="btn btn-link" href="">About</a>
                        <a class="btn btn-link" href="">Contact</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Conditions</a>
                        <a class="btn btn-link" href="">Support</a>
                    </div>
                    <!--<div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Community<span></span></p>
                        <a class="btn btn-link" href="">Career</a>
                        <a class="btn btn-link" href="">Leadership</a>
                        <a class="btn btn-link" href="">Strategy</a>
                        <a class="btn btn-link" href="">History</a>
                        <a class="btn btn-link" href="">Components</a>
                    </div>-->
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">DigPeg White Paper<span></span></p>
                        <div class="position-relative w-100 mt-3">
                            <a href="https://digpegexchange.com/DigiPegCoinWhitepaper.pdf" class="btn btn-light rounded-pill py-2 px-4 ms-3 d-none d-lg-block">White Paper</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="">DigPeg Exchange</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        const target = button.getAttribute('data-tab');

        tabContents.forEach(content => {
          content.classList.add('hidden');
        });

        document.getElementById(target).classList.remove('hidden');

        tabButtons.forEach(btn => {
          btn.classList.remove('text-blue-600', 'font-semibold');
        });

        button.classList.add('text-blue-600', 'font-semibold');
      });
    });

    // Activate the first tab by default
    if (tabButtons.length > 0) {
      tabButtons[0].click();
    }
  });
</script>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>