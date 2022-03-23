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
    <h2>All Doctor Services</h2>


    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($services) && $services->count() > 0)
            @foreach($services as $service)
                <tr>
                    <td>{{$service->name}}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>


    <br>

    <form method="post" action="{{url('saveDoctorServices')}}" >
        @csrf

        <label>Select Doctor: </label>
        <select  name="doctor_id" class="form-control" >
            @if(isset($allDoctors) && $allDoctors->count() > 0)
                @foreach($allDoctors as $allDoctor)
            <option value="{{$allDoctor->id}}">{{$allDoctor->name}}</option>
                @endforeach
            @endif
        </select>

        <label>Select Services: </label>
        <select  name="service_id[]" multiple class="form-control" >
            @if(isset($allServices) && $allServices->count() > 0)
                @foreach($allServices as $allService)
                    <option value="{{$allService->id}}">{{$allService->name}}</option>
                @endforeach
            @endif
        </select>


        <hr>
        <input type="submit" name="save" value="save">
    </form>


</div>

</body>
</html>


