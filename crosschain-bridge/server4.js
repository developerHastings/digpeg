app.post('/verify-project', (req, res) => {
    const { project, fee, email } = req.body;

    // Create PDF
    const doc = new PDFDocument();
    const pdfPath = path.join(__dirname, 'reports', `${project}-report.pdf`);

    doc.pipe(fs.createWriteStream(pdfPath));
    doc.fontSize(18).text(`Risk Management Report for ${project}`, { align: 'center' });
    doc.moveDown();
    doc.fontSize(14).text(`Verification Fee: $${fee}`, { align: 'center' });
    doc.moveDown();
    doc.fontSize(12).text('List of 100 Risk Management Assessments:', { align: 'left' });

    const riskAssessments = [
        "Smart Contract Security Audit",
        "Code Vulnerability Scanning",
        "Formal Verification of Smart Contracts",
        "Penetration Testing",
        "Access Control Policies",
        "User Authentication Mechanisms",
        "Multi-Signature Wallet Implementation",
        "Cold Wallet Storage for Funds",
        "Hot Wallet Risk Management",
        "Private Key Security",
        "Encryption of Sensitive Data",
        "Backup and Disaster Recovery Plans",
        "Incident Response Plan",
        "Governance Model Review",
        "Decentralization Level Assessment",
        "Oracles Security",
        "Consensus Algorithm Analysis",
        "Network Security",
        "Firewall Configuration",
        "DDoS Protection",
        "Load Balancing",
        "Monitoring and Logging",
        "Data Integrity Checks",
        "Cross-Chain Compatibility",
        "Interoperability Testing",
        "Scalability Assessment",
        "Latency and Performance Testing",
        "Transaction Throughput Analysis",
        "Gas Fee Optimization",
        "Front-End Security",
        "Client-Side Code Audit",
        "Browser Compatibility Testing",
        "Mobile Responsiveness",
        "User Interface Security",
        "API Security",
        "Rate Limiting and Throttling",
        "Credential Management",
        "Session Management",
        "Cross-Site Scripting (XSS) Prevention",
        "Cross-Site Request Forgery (CSRF) Prevention",
        "SQL Injection Protection",
        "Input Validation",
        "Error Handling and Logging",
        "Third-Party Library Review",
        "Supply Chain Security",
        "Dependency Management",
        "License Compliance",
        "Regulatory Compliance Check",
        "AML (Anti-Money Laundering) Compliance",
        "KYC (Know Your Customer) Procedures",
        "Data Privacy Regulations Compliance",
        "GDPR Compliance",
        "Tokenomics Review",
        "Economic Model Analysis",
        "Liquidity Risk Assessment",
        "Market Manipulation Risk",
        "Volatility Risk",
        "Collateralization Risk",
        "Interest Rate Risk",
        "Insurance Coverage Review",
        "Operational Risk Analysis",
        "Human Error Prevention",
        "Insider Threat Management",
        "Employee Training and Awareness",
        "Role-Based Access Control",
        "Audit Trails and Logging",
        "Change Management Procedures",
        "Vendor Risk Management",
        "Third-Party Service Provider Assessment",
        "Partnership Risk Evaluation",
        "Community Governance Risk",
        "Voting Mechanism Security",
        "Proposal Submission and Review Process",
        "Treasury Management",
        "Asset Custody Evaluation",
        "Revenue Model Analysis",
        "Profit Distribution Plan",
        "User Engagement and Retention Strategies",
        "Marketing and PR Risk",
        "Reputation Management",
        "Customer Support Readiness",
        "Communication Channels Security",
        "Social Media Risk",
        "Public Relations Crisis Management",
        "Bug Bounty Program",
        "Open Source Contributions Review",
        "Community Code Contributions Policy",
        "Community Moderation Guidelines",
        "DeFi Protocol Integration Risk",
        "Liquidity Pool Vulnerability",
        "Yield Farming Risk",
        "Staking Mechanism Security",
        "Delegated Proof of Stake (DPoS) Security",
        "Stablecoin Integration Risk",
        "Cross-Protocol Interactions Risk",
        "Layer 2 Scaling Solutions Review",
        "Bridging Protocol Security",
        "Cross-Chain Swaps Security",
        "Exit Strategy Plan",
        "Post-Launch Security Audit"
    ];

    // Add the list to the PDF
    riskAssessments.forEach((item, index) => {
        doc.text(`${index + 1}. ${item}`);
    });

    doc.end();

    // Send Email with PDF attachment
    const transporter = nodemailer.createTransport({
        service: 'Gmail',
        auth: {
            user: 'your-email@gmail.com', // Replace with your email
            pass: 'your-password' // Replace with your email password
        }
    });

    const mailOptions = {
        from: 'your-email@gmail.com',
        to: email,
        subject: `Verification Report for ${project}`,
        text: `Dear ${project} owner, please find the attached risk management report.`,
        attachments: [{
            filename: `${project}-report.pdf`,
            path: pdfPath
        }]
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.log(error);
            res.status(500).send('Error sending email.');
        } else {
            res.status(200).send('Verification report has been emailed.');
            console.log('Email sent: ' + info.response);
        }
    });
});
