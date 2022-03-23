
<h1>Hello Admin</h1>
<br><br>
@if(Session::has('success'))
    <h2>{{Session::get('success')}}</h2>
@endif
<br><br>
<h3>You are Auth and your membership is Admin</h3>
