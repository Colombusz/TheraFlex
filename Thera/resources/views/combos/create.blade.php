<!DOCTYPE html>
<html>
<head>
    <title>Dropdown Example</title>
</head>
<body>

    @php
        // dd($service, $product);
    @endphp

    <form action="{{route('combos.store')}}" method="post">
        @csrf
        <label for="product">Select a product:</label>
        <select name="product" id="dropdown">

            @foreach ($product as $prod)
                <option value= {{$prod->id}} >{{$prod->productname}}</option>
            @endforeach
        </select>

        <label for="service">Select a service:</label>
        <select name="service" id="dropdown">
            @foreach ($service as $serv)
                <option value= {{$serv->id}} >{{$serv->servicetype}}</option>
            @endforeach

        </select>
        <input type="file" class="form-control-file" id="Image" name="Image">
        <button type="submit">Submit</button>
    </form>

</body>
</html>
