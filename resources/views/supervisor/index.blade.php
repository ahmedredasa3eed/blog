<br>
<br>

@if(Session::has('success'))
    <h2>{{Session::get('success')}}</h2>
@endif

<h2>Super Visor Is Logged Success</h2>

<a href="{{route('supervisor.logout')}}" class="btn btn-danger">Logout</a>
