<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .email-container {
            background-color: #fff;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .email-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .email-header h2 {
            color: #4CAF50;
        }
        .email-content p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }
        .email-footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Booking Confirmation</h2>
            <p>Thank you for your booking!</p>
        </div>

        <div class="email-content">
            {{-- @foreach($data as $key => $value)
                <p><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</p>
            @endforeach --}}
            <p><strong>Name:</strong> {{ $data['name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
        </div>

        <div class="email-footer">
            <p>This is an automated message. Please do not reply.</p>
        </div>
    </div>
</body>
</html>
