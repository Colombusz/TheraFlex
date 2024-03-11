<!-- resources/views/managers/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Customer Details</h1>

<ul>
    <li><strong>ID:</strong> {{ $customer->id }}</li>
    <li><strong>First Name:</strong> {{ $customer->fname }}</li>
    <li><strong>Last Name:</strong> {{ $customer->lname }}</li>
    <li><strong>Phone Number:</strong> {{ $customer->phoneNum }}</li>
    <li><strong>Address:</strong> {{ $customer->address }}</li>
    <li><strong>Username:</strong> {{ $customer->username }}</li>
    <li><strong>Address:</strong> {{ $customer->address }}</li>
    <li><strong>Profile Image:</strong> <img src="{{ asset('images/customers/' . $customer->images) }}" alt="Profile Image"></li>
</ul>

<a href="{{ route('customers.index') }}" class="btn btn-primary">Back</a>

</body>
</html>



    
