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

<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>

<div class="container">
    <h2>{{__('messages.Offer Data')}}</h2>

    @if(Session::has('success'))
        <h2>{{Session::get('success')}}</h2>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>{{__('messages.Title Ar')}}</th>
            <th>{{__('messages.Title En')}}</th>
            <th>{{__('messages.price')}}</th>
            <th>{{__('messages.photo')}}</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
        <tr>
            <td>{{$offer->title_ar}}</td>
            <td>{{$offer->title_en}}</td>
            <td>{{$offer->price}}</td>
            <td><img src="public/images/offers/{{$offer->photo}}"></td>
            <td>
                <a href="{{url('offers/edit/'.$offer->id)}}"> View</a> <br>
                <a href="{{url('offers/delete/'.$offer->id)}}"> Delete</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>

</body>
</html>


