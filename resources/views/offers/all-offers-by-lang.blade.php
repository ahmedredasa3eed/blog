<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
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
    <table class="table">
        <thead>
        <tr>
            <th>{{__('messages.Title Ar')}}</th>
            <th>{{__('messages.price')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offersByLang as $offer)
        <tr>
            <td>{{$offer->title}}</td>
            <td>{{$offer->price}}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>

</body>
</html>


