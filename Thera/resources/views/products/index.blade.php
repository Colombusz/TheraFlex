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
                <th>product name</th>
                <th>product description</th>
                <th>Quantity</th>
                <th>price per piece</th>
                <th>Image</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            @foreach($query as $somth)

                <tr>
                    <td>{{$somth->id}}</td>
                    <td>{{$somth->productname}}</td>
                    <td>{{$somth->description}}</td>
                    <td>{{$somth->quantity}}</td>
                    <td>{{$somth->price}}</td>
                    <td>
                        @if($somth->images)
                        <img src="{{ asset('productimage/' . $somth->images) }}" alt="Profile Image" style="max-width: 50px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>

                        <a href="{{ route('products.edit', ['id'=>$somth->id]) }}">EDIT</a>
                    </td>
                    <td>

                        <form method="POST" action="{{ route('products.delete', ['id' => $somth->id]) }}" >
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
