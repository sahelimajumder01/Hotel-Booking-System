<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <div id="sidepanel" class="sidepanel">
        
        <a href="hotel_home.html">Home</a>
        <a href="booking.php">Booking</a>
        
    </div>

    <script>
        function openNav() {
            document.getElementById("sidepanel").style.left = "0";
        }

        function closeNav() {
            document.getElementById("sidepanel").style.left = "-250px";
        }
    </script>