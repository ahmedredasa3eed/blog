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
    <h2>{{__('messages.Offer Data')}}</h2>

    <h2 id="success_msg" style="display:none;">تم الحذف بنجاح</h2>


    <table class="table">
        <thead>
        <tr>
            <th>Title Ar</th>
            <th>Title En</th>
            <th>price</th>
            <th>photo</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($offers as $offer)
        <tr class="offer{{$offer->id}}">
            <td>{{$offer->title_ar}}</td>
            <td>{{$offer->title_en}}</td>
            <td>{{$offer->price}}</td>
            <td><img style="height:50px;width:50px;" src="{{asset('images/offers/'.$offer->photo)}}"></td>
            <td>
                <a href="{{route('ajax-offers.edit',$offer->id)}}"> edit</a> <br>
                <a href="" offer_id="{{$offer->id}}" class="delete_btn"> Delete</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

    $(document).on('click','.delete_btn',function (e) {
        e.preventDefault();

        var offer_id = $(this).attr('offer_id');
        $.ajax({
            'type':'post',
            'url':'{{route('ajax-offers.delete')}}',
            'data':{
                '_token':'{{csrf_token()}}',
                'id' : offer_id,
            },
            success:function (data){
                if(data.status == true){
                    $('#success_msg').show();
                    $('.offer'+data.id).remove();

                }
            },
            error:function (reject){}
        });
    });

</script>


