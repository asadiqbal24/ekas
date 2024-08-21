<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f8f8; margin: 0; padding: 0;">

<div style="max-width: 800px; margin: 50px auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <!-- Invoice Header -->
    <div style="border-bottom: 2px solid #007bff; padding-bottom: 20px; margin-bottom: 20px;">
        <h1 style="font-size: 24px; color: #007bff; margin: 0;">INVOICE</h1>
        <div style="font-size: 14px; margin-top: 10px;">
            <strong>Invoice #:</strong>  {{ $details['invoicenumber'] }}<br>
            <strong>Date:</strong>  @php $date = date('Y-m-d')@endphp {{$date}}
        </div>
    </div>

    <!-- Company and Customer Details -->
    <div style="display: flex; justify-content: space-between; margin-bottom: 40px;">
        <div style="font-size: 14px; line-height: 1.6; width: 45%;">
            <strong>Ekas</strong> <br>
            123 Main Street, Suite 600 <br>
            City, State 12345 <br>
            Phone: (123) 456-7890 <br>
            Email: info@ekas.com
        </div>

        <div style="font-size: 14px; line-height: 1.6; width: 45%; text-align: right;">
            <strong>Bill To:</strong> <br>
            {{ $details['name'] }}<br>
            {{ $details['address'] }}<br>
            Phone:  {{ $details['phone_no'] }}<br>
            Email: {{ $details['email'] }}
        </div>
    </div>

    <!-- Invoice Table -->
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr>
                <th style="padding: 15px; border: 1px solid #ddd; background-color: #007bff; color: #ffffff;">Item</th>

                <th style="padding: 15px; border: 1px solid #ddd; background-color: #007bff; color: #ffffff;">Quantity</th>
                <th style="padding: 15px; border: 1px solid #ddd; background-color: #007bff; color: #ffffff;">Unit Price</th>
                <th style="padding: 15px; border: 1px solid #ddd; background-color: #007bff; color: #ffffff;">Total</th>
            </tr>
        </thead>
        <tbody>
        
            <tr>
                <td style="padding: 15px; border: 1px solid #ddd;">{{ $details['service_type'] }}</td>
               
                <td style="padding: 15px; border: 1px solid #ddd;">1</td>
                <td style="padding: 15px; border: 1px solid #ddd;">{{ $details['amount'] }}</td>
                <td style="padding: 15px; border: 1px solid #ddd;">{{ $details['amount'] }}</td>
            </tr>
          
        </tbody>
    </table>

    <!-- Invoice Totals -->
    <div style="text-align: right; margin-top: 20px;">
       
        <p style="font-size: 20px; font-weight: bold; color: #333; margin: 0;">Total: {{ $details['amount'] }}</p>
    </div>

    <!-- Footer -->
    <div style="text-align: center; font-size: 12px; color: #777; margin-top: 30px;">
        <p>Thank you for your business!</p>
        <p>If you have any questions, please contact us at info@ekas.com </p>
    </div>
</div>

</body>
</html>
