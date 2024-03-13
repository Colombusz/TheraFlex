@vite(['resources/css/calendar.css'])

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

<div class="bg-head">


    <img src="{{ asset('images/scene24.jpg') }}" alt="Background Image">


</div>

  <div id="app">
    <!-- Return Button -->
    <a href="/appointments" class="edit-button">
      <p>Return to appointments</p>
    </a>
    <!-- Calendar Container -->
    <div class="calendar-container">
      <div class="white-container">
        <p>Select the appointment date you prefer</p>
      </div>
      <!-- Calendar Header -->
      <div class="calendar-header">
        <button id="prevMonthButton" onclick="prevMonth()">Previous Month</button>
        <h2 id="currentMonthYear"></h2>
        <button id="nextMonthButton" onclick="nextMonth()">Next Month</button>
      </div>
      <!-- Calendar Days -->
      <div class="calendar-days" id="calendarDays">
        <!-- Dynamically generated days will be inserted here -->
      </div>
    </div>

    <!-- Display real-time date and time using JavaScript -->
    <div id="real-time"></div>

    <script type = "module">
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        let isMonthView = true;

        document.addEventListener('DOMContentLoaded', function () {
        updateCalendarView();
        updateRealTime();
        });

        function switchCalendarView() {
        isMonthView = !isMonthView;
        updateCalendarView();
        }

        function prevMonth() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        updateCalendarView();
        }

        function nextMonth() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        updateCalendarView();
        }

        function updateCalendarView() {
        const calendarHeader = document.getElementById('currentMonthYear');
        calendarHeader.innerHTML = `${getMonthName(currentMonth)} ${currentYear}`;

        const calendarDays = document.getElementById('calendarDays');
        calendarDays.innerHTML = ''; // Clear existing days

        const daysInMonth = getDaysInMonth(currentYear, currentMonth);
        const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();

        // Add empty grid cells for days before the first day of the month
        for (let i = 0; i < firstDayOfMonth; i++) {
            const emptyDay = document.createElement('div');
            emptyDay.className = 'day empty-day';
            calendarDays.appendChild(emptyDay);
        }

        // Display days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = createDayElement(day, currentMonth);
            calendarDays.appendChild(dayElement);
        }
        }

        function cancelDate() {
        const expandableContent = document.querySelector('.expandable-content');
        expandableContent.style.display = 'none';
        }

        function createDayElement(day, month) {
        const dayElement = document.createElement('div');
        dayElement.className = 'day';
        dayElement.innerHTML = `
            <div class="date-num">${day}</div>
            <div class="date-day">${getDayName(new Date(currentYear, month, day).getDay())}</div>
            <div class="expandable-content">
                <p><strong>Time of the Day:</strong> 9 AM - 5 PM</p>
                <p><strong>Employer's Availability:</strong> Available</p>
                <p><strong>Can User Make an Appointment:</strong> Yes</p>
                <p><strong>Date Clicked:</strong> ${getMonthName(month)} ${day}, ${currentYear}</p>
                // @php
                //     dd($appointments);
                // @endphp
                <button class="select-date-button" onclick="selectDate()">Select Date</button>
                <button class="cancel-date-button" onclick="cancelDate()">Cancel</button>
            </div>
        `;
        dayElement.addEventListener('click', function () {
            toggleExpandableContent(this);
        });
        return dayElement;
        }

        function toggleExpandableContent(dayElement) {
        const expandableContent = dayElement.querySelector('.expandable-content');
        expandableContent.style.display = (expandableContent.style.display === 'none') ? 'block' : 'none';
        }

        function updateRealTime() {
        const realTimeElement = document.getElementById('real-time');
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
        const formattedTime = now.toLocaleString('en-US', options);
        realTimeElement.textContent = formattedTime;
        }

        function getMonthName(month) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return months[month];
        }

        function getDayName(day) {
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        return days[day];
        }

        function getDaysInMonth(year, month) {
        return new Date(year, month + 1, 0).getDate();
        }

        // Add event listeners for the buttons
        document.getElementById('prevMonthButton').addEventListener('click', prevMonth);
        document.getElementById('nextMonthButton').addEventListener('click', nextMonth);

    </script>
  </div>
</body>

</html>
