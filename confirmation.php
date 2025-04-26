<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <style>
        body {
            background-image: url("3_pengu.jpg");
            background-color: #cccccc;
            font-family: Algerian;
        }
        .confirmation-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .confirmation-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .confirmation-header h2 {
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 30px 0;
        }

        .detail-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .detail-label {
            font-weight: bold;
            display: block;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .detail-value {
            display: block;
            color: #555;
        }

        .detail-item.total {
            grid-column: span 2;
            background: #f8f9fa;
            padding: 20px;
            margin-top: 10px;
            border-radius: 5px;
            font-size: 1.1em;
        }

        .special-requests {
            margin: 30px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .special-requests h3 {
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="confirmation-container">
    <div class="confirmation-header">
        <h2>Booking Confirmation</h2>
        <p>Thank you, <?php echo isset($_SESSION['booking_data']['name']) ? $_SESSION['booking_data']['name'] : 'Guest'; ?>! Your booking has been confirmed.</p>
    </div>

    <div class="confirmation-details">
        <div class="details-grid">
            <div class="detail-item">
                <span class="detail-label">Confirmation Number:</span>
                <span class="detail-value"><?php echo isset($_SESSION['booking_data']['confirmation_number']) ? $_SESSION['booking_data']['confirmation_number'] : 'N/A'; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Room Type:</span>
                <span class="detail-value"><?php echo isset($_SESSION['booking_data']['room_type']) ? $_SESSION['booking_data']['room_type'] : 'N/A'; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Check-In:</span>
                <span class="detail-value"><?php echo isset($_SESSION['booking_data']['checkin']) ? date('F j, Y', strtotime($_SESSION['booking_data']['checkin'])) : 'N/A'; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Check-Out:</span>
                <span class="detail-value"><?php echo isset($_SESSION['booking_data']['checkout']) ? date('F j, Y', strtotime($_SESSION['booking_data']['checkout'])) : 'N/A'; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Number of Nights:</span>
                <span class="detail-value"><?php echo isset($_SESSION['booking_data']['nights']) ? $_SESSION['booking_data']['nights'] : 'N/A'; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Number of Guests:</span>
                <span class="detail-value"><?php echo isset($_SESSION['booking_data']['guests']) ? $_SESSION['booking_data']['guests'] : 'N/A'; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Price per Night:</span>
                <span class="detail-value">$<?php echo isset($_SESSION['booking_data']['price_per_night']) ? $_SESSION['booking_data']['price_per_night'] : 'N/A'; ?></span>
            </div>
            <div class="detail-item total">
                <span class="detail-label">Total Price:</span>
                <span class="detail-value">$<?php echo isset($_SESSION['booking_data']['total_price']) ? $_SESSION['booking_data']['total_price'] : 'N/A'; ?></span>
            </div>
        </div>

        <?php if (isset($_SESSION['booking_data']['special_requests']) && !empty($_SESSION['booking_data']['special_requests'])): ?>
        <div class="special-requests">
            <h3>Your Special Requests:</h3>
            <p><?php echo $_SESSION['booking_data']['special_requests']; ?></p>
        </div>
        <?php endif; ?>

        <p>A confirmation email has been sent to <strong><?php echo isset($_SESSION['booking_data']['email']) ? $_SESSION['booking_data']['email'] : 'N/A'; ?></strong>.</p>
        <p>We look forward to welcoming you to Shimla Hotel!</p>

        <div style="text-align: center; margin-top: 30px;">
            <a href="hotel_home.html" class="btn">Return to Home</a>
        </div>
    </div>
</div>

</body>
</html>
<?php
unset($_SESSION['booking_data']); // Clear the session data after displaying
?>