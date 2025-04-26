<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $checkin = htmlspecialchars($_POST['checkin']);
    $checkout = htmlspecialchars($_POST['checkout']);
    $room_type = htmlspecialchars($_POST['room_type']);
    $guests = htmlspecialchars($_POST['guests']);
    $special_requests = htmlspecialchars($_POST['special_requests']);
    
    // Calculate number of nights
    $checkin_date = new DateTime($checkin);
    $checkout_date = new DateTime($checkout);
    $nights = $checkin_date->diff($checkout_date)->days;
    
    // Calculate total price based on room type
    $room_prices = [
        'standard' => 99,
        'deluxe' => 149,
        'suite' => 249
    ];
    
    $price_per_night = $room_prices[$room_type] ?? 0;
    $total_price = $price_per_night * $nights;
    
    // Room type display names
    $room_display_names = [
        'standard' => 'Standard Room',
        'deluxe' => 'Deluxe Room',
        'suite' => 'Suite'
    ];
    
    $room_display_name = $room_display_names[$room_type] ?? 'Unknown Room Type';
    
    // Start session and store booking data
    session_start();
    $_SESSION['booking_data'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'checkin' => $checkin,
        'checkout' => $checkout,
        'room_type' => $room_display_name,
        'guests' => $guests,
        'nights' => $nights,
        'price_per_night' => $price_per_night,
        'total_price' => $total_price,
        'special_requests' => $special_requests,
        'confirmation_number' => 'SH' . strtoupper(uniqid())
    ];
    
    header("Location: confirmation.php");
    exit();
} else {
    // If someone tries to access this page directly, redirect to booking page
    header("Location: booking.php");
    exit();
}
?>