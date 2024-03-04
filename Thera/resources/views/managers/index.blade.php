<!-- resources/views/managers/index.blade.php -->
@vite(['../../css/admin.css','../../js/admin.js'])
@extends( 'layouts.adminSidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager List</title>
    <!-- Include Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Manager List</h2>
    <a href="{{ route('managers.create') }}" class="btn btn-success mb-3">Add Manager</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Username</th>
                <th>Profile Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($managers as $manager)
                <tr>
                    <td>{{ $manager->id }}</td>
                    <td>{{ $manager->fname }}</td>
                    <td>{{ $manager->lname }}</td>
                    <td>{{ $manager->phoneNum }}</td>
                    <td>{{ $manager->address }}</td>
                    <td>{{ $manager->username }}</td>
                    <td>
                        <!-- @if($manager->images)
                            <img src="{{ asset($manager->images) }}" alt="Profile Image" style="max-width: 50px;">
                        @else
                            No Image
                        @endif -->
                        @if($manager->images)
                        <img src="{{ asset('profiles/' . $manager->images) }}" alt="Profile Image" style="max-width: 50px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('managers.delete', $manager->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- @php
    dd($managers);
@endphp -->
<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
