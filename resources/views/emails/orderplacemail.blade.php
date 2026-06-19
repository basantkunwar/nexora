<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; background:#f5f5f5; padding:30px;">

<div style="max-width:600px; margin:auto; background:white; border-radius:10px; padding:30px;">

    <h2 style="color:#16a34a;">
        🎉 Thank You For Your Order!
    </h2>

    <p>Hello <strong>{{ $order->customer_name }}</strong>,</p>

    <p>
        We have successfully received your order.
    </p>

    <div style="background:#f3f4f6;padding:20px;border-radius:8px;">
        <h3>Order Details</h3>

        <p><strong>Order Number:</strong> {{ $order->order_number }}</p>

        <p><strong>Total:</strong> Rs. {{ number_format($order->grand_total,2) }}</p>

        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    </div>

    <br>

    <p>
        We will notify you once your order is confirmed and shipped.
    </p>

    <p>
        Thank you for shopping with us ❤️
    </p>

    <br>

    <p>
        Regards,<br>
        <strong>Your Shop Name</strong>
    </p>

</div>

</body>
</html>