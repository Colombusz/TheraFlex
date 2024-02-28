
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
        Create prod
    </h1>
    <form method = "post" action = {{route('services.update')}}>
        @csrf
        @method('post')
        <div>
            <label> Services </label>
            {{-- used so that i can pass id --}}
            <input type="hidden" name="id" value="{{ $query->id }}" />

            <input type="Services" name = "Services" placeholder="Services" value = "{{$query->servicetype}}"/>
        </div>
        <div>
            <label> Description </label>
            <input type="Description" name = "Description" placeholder="Description"  value = "{{$query->description}}"/>
        </div>
        <div>
            <label> Hours Per Session </label>
            <input type="Hours" name = "Hours" placeholder="Hours"  value = "{{$query->hours}}"/>
        </div>
        <div>
            <label> rate/perhour </label>
            <input type="rate" name = "rate" placeholder="rate" value = "{{$query->price}}"/>
        </div>
        <div>
            <input type= "submit" value="save service" />
        </div>
    </form>


</body>
</html>

