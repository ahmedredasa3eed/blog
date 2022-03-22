
<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>

<h1>{{ __('messages.Create_new_offer') }}</h1>

@if(Session::has('not-found'))
    <h2>{{Session::get('not-found')}}</h2>
@endif


<form method="post" action="{{url('offers/update/'.$offer->id)}}">
    @csrf
    <input type="text" value="{{$offer->title_ar}}" name="title_ar" class="form-control" placeholder="title_ar">
    @error('title_ar')
    <small>{{$message}}</small>
    @enderror
    <br>
    <input type="text" value="{{$offer->title_en}}" name="title_en" class="form-control" placeholder="title_en">
    @error('title_en')
    <small>{{$message}}</small>
    @enderror
    <br>
    <input type="text" value="{{$offer->price}}" name="price" class="form-control" placeholder="price">
    @error('price')
    <small>{{$message}}</small>
    @enderror
    <hr>
    <input type="submit" name="save" value="Save Changes">
</form>
