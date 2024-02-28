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
    <form method = "post" action = {{route('services.store')}}>
        @csrf
        @method('post')
        <div>
            <label> Services </label>
            <input type="Services" name = "Services" placeholder="Services"/>
        </div>
        <div>
            <label> Description </label>
            <input type="Description" name = "Description" placeholder="Description"/>
        </div>
        <div>
            <label> Hours Per Session </label>
            <input type="Hours" name = "Hours" placeholder="Hours"/>
        </div>
        <div>
            <label> rate/perhour </label>
            <input type="rate" name = "rate" placeholder="rate"/>
        </div>
        <div>
            <input type= "submit" value="save service"/>
        </div>
    </form>


</body>
</html>
