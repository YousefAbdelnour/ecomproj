<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=20">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.11/index.min.css">
    <title>Service Booking</title>
</head>

<body>
    <?php include('app/views/navbarMaid.php'); ?>
    <div class="title_div">
        <h1>Schedule</h1>
        <h2>Don't worry, we got you covered!</h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div id="calendar"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.11/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    <?php foreach ($data['bookings'] as $booking) : ?> {
                            title: '<?= $booking->Description ?>',
                            start: '<?= date('c', strtotime($booking->Time_Of_Job)) ?>'
                        },
                    <?php endforeach; ?>
                ]
            });
            calendar.render();
        });
    </script>
    <div id="booking-info"></div>

</body>

</html>