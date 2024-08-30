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
      width: 100% !important;
    }

    .container {
      width: 100%;
      max-width: 600px;
      background-color: #ffffff;
      margin: 0 auto;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .table-header,
    .table-bill-info,
    .table-items,
    .table-summary,
    .table-note {
      width: 100%;
      margin: 20px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      padding: 8px;
    }

    .invoice-title {
      font-size: 24px;
      font-weight: bold;
    }

    .summary-table td {
      text-align: right;
    }

    .note-section {
      padding-top: 20px;
    }

    hr {
      border: 0;
      border-top: 1px solid #eee;
      margin: 20px 0;
    }
  </style>
</head>

<body>
  <table width="100%" bgcolor="#f4f4f4" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center">
        <table class="container" cellpadding="0" cellspacing="0">
          <!-- Invoice Header -->
          <tr>
            <td>
              <table class="table-header" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                <tr>
                  <td align="left">
                    <img src="your-logo-url-here.png" alt="Company Logo" width="100" style="display: block;">
                  </td>
                  <td align="right">
                    <span class="invoice-title">Invoice #86423</span><br>
                    <span>Issued: 01/01/2024</span><br>
                    <span>Due: 01/01/2024</span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Bill Info -->
          <tr>
            <td>
              <table class="table-bill-info" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                <tr>
                  <td align="left">
                    <strong>From:</strong><br>
                    ekas<br>
                    Address<br>
                    Phone
                  </td>
                  <td align="right">
                    <strong>Bill To:</strong><br>
                    Name: Name<br>
                    Email: email@example.com<br>
                    Phone: 1234567890
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Invoice Items -->
          <tr>
            <td>
              <table class="table-items" cellpadding="0" cellspacing="0" bgcolor="#ffffff" border="1" style="border-color: #eee;">
                <thead>
                  <tr>
                    <th align="left" style="padding: 10px;">Description</th>
                    <th align="center" style="padding: 10px;">Qty</th>
                    <th align="right" style="padding: 10px;">Price</th>
                    <th align="right" style="padding: 10px;">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="padding: 10px;">Vuexy Admin Template</td>
                    <td align="center" style="padding: 10px;">1</td>
                    <td align="right" style="padding: 10px;">$32</td>
                    <td align="right" style="padding: 10px;">$32.00</td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>

          <!-- Summary -->
          <tr>
            <td>
              <table class="table-summary" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                <tr>
                  <td align="right" style="padding: 10px;">
                    <strong>Total:</strong>
                    $32.00
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td>
              <hr>
            </td>
          </tr>

          <!-- Note -->
          <tr>
            <td>
              <table class="table-note" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                <tr>
                  <td>
                    <strong>Note:</strong>
                    <p>It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank you!</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>
