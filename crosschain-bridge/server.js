

/*
    const express = require('express');
const Web3 = require('web3');
const bodyParser = require('body-parser');
require('dotenv').config();

const app = express();
const port = process.env.PORT || 3000;

// Middleware
app.use(bodyParser.json());
app.use(express.static('public'));

// Initialize Web3
const web3 = new Web3(Web3.givenProvider || 'http://localhost:8545');

// Endpoint to connect with MetaMask and get the wallet address
app.post('/connect-wallet', async (req, res) => {
    try {
        const accounts = await web3.eth.requestAccounts();
        res.json({ account: accounts[0] });
    } catch (error) {
        res.status(500).json({ error: 'Failed to connect wallet' });
    }
});

// Endpoint to handle the swap calculation
app.post('/calculate-fee', (req, res) => {
    const { amount, feePercentage } = req.body;
    if (isNaN(amount) || isNaN(feePercentage)) {
        return res.status(400).json({ error: 'Invalid input' });
    }

    const feeAmount = (amount * feePercentage) / 100;
    res.json({ feeAmount });
});

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
*/

const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');
const PDFDocument = require('pdfkit');
const fs = require('fs');
const path = require('path');

const app = express();
const port = process.env.PORT || 3000;

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(express.static('public'));

// Generate PDF and Email
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

    for (let i = 1; i <= 100; i++) {
        doc.text(`${i}. Risk assessment item ${i}`);
    }

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

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
