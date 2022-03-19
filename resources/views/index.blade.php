<h1>Hello Oday</h1>


{{--
<h2>{{$obj->gender}}--{{$obj->age}}</h2>
--}}

{{--@if($name1 =='Ahmed')
    <h1>Yes Im ahmed</h1>
@else
    <h1>No  Im not ahmed</h1>
@endif--}}



@forelse($names as $name)
    <h4>{{$name}}<hr></h4>
@empty
    <h3>No Data Found :)</h3>
@endforelse
