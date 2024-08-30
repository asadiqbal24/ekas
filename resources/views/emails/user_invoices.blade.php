<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice Email Template</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      -webkit-text-size-adjust: none;
      width: 100% !important;
    }

    .container {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .invoice-preview-header {
      border-bottom: 1px solid #eee;
    }

    .header-content {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .logo-section p, .invoice-details p {
      margin: 4px 0;
    }

    .invoice-details h5 {
      margin-bottom: 10px;
      font-size: 26px;
      font-weight: 500;
    
    }

    .bill-info {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    .invoice-table th, .invoice-table td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    .summary-table {
      text-align: right;
      padding: 20px 0;
    }

    .summary-table td {
      padding: 8px 0;
    }

    .note-section {
      padding-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="invoice-preview-header">
      <div class="header-content">
        <div class="logo-section">
          <div class="svg-illustration">
            <!-- Replace SVG with an image -->
            <img src="your-logo-url-here.png" alt="Company Logo" width="100" height="auto" style="max-width: 100px;">
           
          </div>
        
        
         
        </div>
        <div class="invoice-details">
          <h5>Invoice #86423</h5>
          <p>Issued: 01/01/2024</p>
          <p>Due: 01/01/2024</p>
        </div>
      </div>
    </div>

    <div class="bill-info">
      <div>
        <h6 style="font-size: medium;">From:</h6>
        <p>ekas</p>
        <p>Address</p>
        <p>Phone</p>
        
       
      </div>
      <div>
        <h6 style="font-size: medium;">Bill To:</h6>
        <table>
           <tr><td>Name: <td> <td>Name</td></tr>
          <tr><td>Email: <td> <td>Name</td></tr>
           <tr><td>Phone: <td> <td>Name</td> </tr>
       
         
        </table>
      </div>
    </div>

    <div class="table-responsive">
      <table class="invoice-table">
        <thead>
          <tr>
           <th>Description</th>
            <th>Qty</th>
           
            <th>Price</th>
            <th>Total</th>
           
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Vuexy Admin Template</td>
            <td>1</td>
            <td>$32</td>
           
            <td>$32.00</td>
          </tr>
        
      
        
        </tbody>
      </table>
    </div>

    <div class="summary-table">
      <table>
       
       
      
    
        <tr>
          <td>Total:</td>
          <td>$204.25</td>
        </tr>
      </table>
    </div>

    <hr>

    <div class="note-section">
      <span><strong>Note:</strong></span>
      <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</span>
    </div>
  </div>
</body>
</html>
