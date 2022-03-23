<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
    <h2>Selected Doctors</h2>


    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Title</th>
            <th>Hospital</th>
            <th>Address</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>

            @if(isset($doctor))
            <tr>
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->title}}</td>
                <td>{{$doctor->hospital->name}}</td>
                <td>{{$doctor->hospital->address}}</td>
                <td>{{$doctor->created_at}}</td>
            </tr>
            @endif

        </tbody>
    </table>
</div>

</body>
</html>


