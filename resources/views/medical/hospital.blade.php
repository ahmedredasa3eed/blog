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
    <h2>All Hospitals</h2>


    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>address</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($hospitals) && $hospitals->count() > 0)
        @foreach($hospitals as $hospital)
            <tr>
                <td>{{$hospital->name}}</td>
                <td>{{$hospital->address}}</td>
                <td>
                    <a href="{{url('deleteHospital/'.$hospital->id)}}" class="btn btn-danger btn-sm"> Delete</a>
                    <a href="{{url('getDoctorsInSelectedHospital/'.$hospital->id)}}" class="btn btn-success btn-sm">  View Doctors</a>
                </td>
            </tr>
        @endforeach
            @endif

        </tbody>
    </table>
</div>

</body>
</html>


