<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Services
    </h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>service name</th>
                <th>service description</th>
                <th>hours per session</th>
                <th>price per hout</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            @foreach($query as $somth)
                <tr>
                    <td>{{$somth->id}}</td>
                    <td>{{$somth->servicetype}}</td>
                    <td>{{$somth->description}}</td>
                    <td>{{$somth->hours}}</td>
                    <td>{{$somth->price}}</td>
                    <td>

                        <a href="{{ route('services.edit', ['id'=>$somth->id]) }}">EDIT</a>
                    </td>
                    <td>

                        <form method="POST" action="{{ route('services.delete', ['id' => $service->id]) }}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

</body>
</html>
