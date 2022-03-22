

<h1>{{ __('messages.Create_new_offer') }}</h1>



<h2 id="success_msg" style="display:none;">تم الحفظ بنجاح</h2>



<form method="post" action="" id="offerForm"  enctype="multipart/form-data">

    @csrf
    <input type="text" name="title_ar" class="form-control" placeholder="title_ar">
    <small id="title_ar_error"></small>
    <br>
    <input type="text" name="title_en" class="form-control" placeholder="title_en">
    <small id="title_en_error"></small>
    <br>
    <input type="text" name="price" class="form-control" placeholder="price">
    <small id="price_error"></small>
    <hr>
    <input type="file" name="photo" class="form-control">
    <small id="photo_error"></small>
    <hr>
    <input type="submit" id="save_ajax_offers" value="save">
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).on('click','#save_ajax_offers',function (e){
        e.preventDefault();

        // rest error validation
        $('#title_ar_error').text('');
        $('#title_en_error').text('');
        $('#price_error').text('');
        $('#photo_error').text('');

        var  $formData = new FormData($('#offerForm')[0]);
        $.ajax({
            'type':'post',
            encrypt:'multipart/form-data',
            'url':'{{route('ajax-store.store')}}',
            'data':$formData,
            processData:false,
            contentType:false,
            cache:false,
            success:function (data){
                if(data.status == true){
                    $('#success_msg').show();
                }
            },
            error:function (reject){
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors,function (key,value){
                    $('#' + key + '_error').text(value[0]);
                });
            }
        });
    })
</script>
