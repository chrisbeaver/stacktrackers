@extends('layouts.main')

@section('main-content')
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add Images for {{ $holding->name }}</h3>
        </div>
        <div class="panel-body">
            <form action="/holdings/images" method="POST" class="dropzone" id="holding-images-dropzone">
                {{ csrf_field() }}
                {{ Form:: hidden('holding_id', $holding->id) }}
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer-assets')
<script>
Dropzone.options.holdingImagesDropzone = {
    paramName: "image", // The name that will be used to transfer the file
    maxFilesize: 10, // MB
    acceptedFiles: 'image/*'
    // accept: function(file, done) {
    //   if (file.name == "justinbieber.jpg") {
    //     done("Naha, you don't.");
    //   }
    //   else { done(); }
    // }
};
</script>
@endsection

