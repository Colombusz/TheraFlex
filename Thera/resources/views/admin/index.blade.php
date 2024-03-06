@vite(['resource/css/admin.css','../../../js/admin.js'])
@extends( 'layouts.adminSidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheraFlex</title>
</head>
<body>
<header class="adminHeader">
    <div class="text" >Manager Profile</div>
</header>


<div class="container">
    <img class="profile-picture" src="profile.jpg" alt="Profile Picture">

    <div class="profile-name">John Doe</div>
<div class="infos">
    <div class="info">
<br>
<br>
        <label>Address:</label>
        <p>123 Main St, Cityville, State, ZIP</p>
    </div>
    <div class="info">
        <label>Phone Number:</label>
        <p>(555) 555-5555</p>
    </div>
    <div class="info">
        <label>Username:</label>
        <p>Joe Doee</p>
    </div>
    <div class="info">
        <label>Email:</label>
        <p>john.doe@example.com</p>
    </div>
    <div class="info">
        <label>Job Title:</label>
        <p>Manager</p>
    </div>
    <div class="info">
        <label>Department:</label>
        <p>Operations</p>

<br>
<br>
    </div>
</div>
</div>

</body>
</html>
