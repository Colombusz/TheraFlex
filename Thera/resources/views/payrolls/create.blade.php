<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <!-- Include Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<form action="{{ route('payrolls.store') }}" method="POST" enctype="multipart/form-data">
    @if($errors->any())
                    <div class="alert alert-danger text-red-500">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="fname">WorkedHours</label>
        <input type="text" class="form-control" id="WorkedHours" name="WorkedHours" required>
    </div>

    <div class="form-group">
        <label for="lname">PayRate:</label>
        <input type="text" class="form-control" id="PayRate" name="PayRate" required>
    </div>
    <button type="submit" class="btn btn-success">Add Payroll</button>
</form>



<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
