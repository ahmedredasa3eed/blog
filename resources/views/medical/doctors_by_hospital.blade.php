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
    <h2>All Doctors in Hospital</h2>


    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Title</th>
            <th>Hospital</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($doctors) && $doctors->count() > 0)
        @foreach($doctors as $doctor)
        <tr>
            <td>{{$doctor->name}}</td>
            <td>{{$doctor->title}}</td>
            <td>{{$doctor->hospital->name}}</td>
            <td>{{$doctor->hospital->address}}</td>
            <td>
                <a href="{{url('offers/delete/'.$doctor->id)}}" class="btn btn-danger btn-sm"> Delete Doctor</a>
                <a href="{{url('getOneDoctor/'.$doctor->id)}}" class="btn btn-success btn-sm">  View</a>
            </td>
        </tr>
        @endforeach
        @endif

        </tbody>
    </table>
</div>

</body>
</html>


