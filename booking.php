<?php
$page_title = "Book Your Stay - Shimla Hotel";
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> booking </title>
    <style>
        body {
            background-image: url("hotel.jpg");
            background-color: #cccccc;
            font-family: Times New Roman;
            color: #040273;
        }

        .booking-header {
            padding: 80px 20px;
            text-align: center;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("hotel.jpg");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            color: white;
        }

        .booking-header h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .booking-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Side Panel Navigation */
        .sidepanel {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: #2c3e50;
            padding-top: 60px;
            transition: 0.5s;
            z-index: 1000;
        }

        .sidepanel a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 1.2rem;
            color: white;
            display: block;
            transition: 0.3s;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidepanel a:hover {
            background-color: #34495e;
            color: #f1f1f1;
            padding-left: 30px;
        }

        .sidepanel .closebtn {
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 2rem;
            color: white;
            cursor: pointer;
        }

        .openbtn {
            position: fixed;
            top: 20px;
            left: 20px;
            font-size: 1.5rem;
            cursor: pointer;
            background-color: #2c3e50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            z-index: 100;
            transition: 0.3s;
        }

        .openbtn:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>
    <div class="booking-header">
        <h1>Book Your Stay</h1>
        <p>Fill out the form below to reserve your room</p>
    </div>

    <div class="booking-container">
        <form action="process-booking.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="checkin">Check-In Date</label>
                    <input type="date" id="checkin" name="checkin" required>
                </div>

                <div class="form-group">
                    <label for="checkout">Check-Out Date</label>
                    <input type="date" id="checkout" name="checkout" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="room-type">Room Type</label>
                    <select id="room-type" name="room_type" required>
                        <option value="">Select Room Type</option>
                        <option value="standard">Standard Room ($99/night)</option>
                        <option value="deluxe">Deluxe Room ($149/night)</option>
                        <option value="suite">Suite ($249/night)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="guests">Number of Guests</label>
                    <select id="guests" name="guests" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>

            <h3>Guest Information</h3>

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
            </div>

            <div class="form-group">
                <label for="special-requests">Special Requests</label>
                <textarea id="special-requests" name="special_requests" rows="4"></textarea>
            </div>

            <button type="submit" class="btn">Complete Booking</button>
        </form>
    </div>

<?php include_once 'footer.php'; ?>

</body>
</html>