<!DOCTYPE html>
<html>
<head>
    <title>NM Technology - New Product Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #111827; /* Dark background matching website */
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #15a34a; /* Green brand color */
            text-align: center;
            padding: 20px;
        }
        .logo-container {
            background-color: #111827; /* Dark background for logo */
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        .logo {
            height: 48px;
        }
        .company-name {
            color: white;
            font-size: 14px;
            font-style: italic;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        h1, h2 {
            color: white;
            margin: 0;
        }
        h1 {
            font-size: 24px;
        }
        h2 {
            font-size: 20px;
            margin-top: 20px;
        }
        .content {
            padding: 20px;
            color: #d1d5db;
        }
        .message-box {
            background-color: #1f2937;
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            color: #d1d5db;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #374151;
        }
        table th {
            background-color: #374151;
            color: white;
        }
        .footer {
            background-color: #1f2937;
            padding: 15px 20px;
            text-align: center;
            color: #9ca3af;
            font-size: 12px;
        }
        .customer-info {
            margin-top: 20px;
            background-color: #1f2937;
            border-radius: 8px;
            padding: 15px;
        }
        .customer-info p {
            margin: 5px 0;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 15px;
            text-align: right;
            padding-right: 10px;
            color: white;
        }
        @media screen and (max-width: 600px) {
            .email-container {
                width: 100%;
                margin: 0;
                border-radius: 0;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Logo Section -->
        @include('components.nm-logo', ['variant' => 'email', 'size' => 'medium', 'showBorder' => false])

        <!-- Header -->
        <div class="header">
            <h1>New CCTV Product Order</h1>
        </div>

        <!-- Main Content -->
        <div class="content">
            <p>A new order has been placed through the website:</p>

            <!-- Customer Information -->
            <div class="customer-info">
                <h2>Customer Information</h2>
                <p><strong>Name:</strong> {{ $orderData['customer']['firstName'] }} {{ $orderData['customer']['lastName'] }}</p>
                <p><strong>Email:</strong> {{ $orderData['customer']['email'] }}</p>
                <p><strong>Phone:</strong> {{ $orderData['customer']['phone'] }}</p>
                @if(isset($orderData['comments']) && $orderData['comments'])
                <div class="message-box">
                    <strong>Customer Comments:</strong>
                    <p>{{ $orderData['comments'] }}</p>
                </div>
                @endif
            </div>

            <!-- Order Items -->
            <h2>Order Items</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderData['items'] as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ isset($item['price']) ? '$' . number_format($item['price'], 2) : 'Call for price' }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ isset($item['price']) ? '$' . number_format($item['price'] * $item['quantity'], 2) : 'Call for price' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Order Total -->
            <div class="total">
                Total: {{ $orderData['total'] }}
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} NM Technology. All rights reserved.</p>
            <p>This is an automated message, please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>