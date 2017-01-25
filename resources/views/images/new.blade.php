@extends('layouts.main')

@push('styles')
<link href="//cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/css/swiper.min.css">
@endpush


@section('main-content')

{{-- Upload View --}}
<div class="container">
    <div id="upload-view" class="add-view text-center hidden">
        <h1>Upload photos from your {{ BrowserDetect::isDesktop() ? 'computer' : 'device' }}</h1>


        <form action='PhotoController@postUpload' method='POST' accept-charset="UTF-8" enctype="multipart/form-data" class="dropzone" role="form">
            <div class="profile-tip text-center text-md">
                <i class="fa fa-lightbulb-o"></i> Tip: Click any photo to set it as your profile photo.
            </div>
            <div class="fallback">
                <div class="alert alert-warning text-md" role="alert">
                    Note: You may only upload one photo at a time because you are either using an outdated browser or HTML5 features are disabled.
                </div>
                <input id="file" type="file" accept="image/*">
            </div>
        </form>

        <div class="upload-btns mart25">
            <button id="upload-cancel-btn" class="btn btn-default btn-lg">Cancel</button>
            <button id="upload-submit-btn" class="btn btn-success btn-lg hidden" data-onsubmit="Uploading... <i class='fa fa-spinner fa-spin'></i>">Upload Photos</button>
        </div>
        <div id="uploadPreviewTemplate" class="hidden">
            <div class="dz-preview dz-file-preview">
                <div class="dz-image"><img data-dz-thumbnail /></div>
                <div class="dz-details">
                    <div class="dz-filename"><span data-dz-name></span></div>
                    <div class="dz-size" data-dz-size></div>
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <div class="dz-success-mark"><span><i class="fa fa-check-circle"></i></span></div>
                <div class="dz-error-mark"><span><i class="fa fa-times-circle"></i></span></div>
                <div class="dz-error-message"><div data-dz-errormessage></div><button data-dz-remove class="btn btn-sm btn-default">ok</button></div>
                <div class="dz-profile-message"><i class="fa fa-user"></i> Profile Photo</div>
            </div>
        </div>
        <div id="uploadDefaultMessage" class="hidden">
            {{ BrowserDetect::isDesktop() ? 'Drag & drop photos here or click to select.' : 'Click to select photos.' }}
            <p><i class="fa fa-picture-o fa-3x"></i></p>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/js/swiper.jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script type="text/javascript">
$(function() {
    Dropzone.options.myAwesomeDropzone = {
      paramName: "file", // The name that will be used to transfer the file
      maxFilesize: 2, // MB
      acceptedFiles: 'image/*'
    };
})
// try {
//     Dropzone.autoDiscover = false;
//     Dropzone.fileLimitWarningShown = 0;
// } catch(e) {
//     // None found.
// }
// $(function() {

//     dropzone = new Dropzone($('.dropzone').get(0), {
//         url: '/editprofile/photos/saveupload',
//         maxFiles: 5,
//         // maxFilesize: options.maxFilesize,
//         addRemoveLinks: false,
//         acceptedFiles: 'image/*',
//         thumbnailWidth:150,
//         thumbnailHeight:150,
//         autoProcessQueue:true,
//         parallelUploads:1,
//         clickable:true,
//         addRemoveLinks:true,
//         // dictDefaultMessage:$('#uploadDefaultMessage').html(),
//         dictRemoveFile:'<i class="fa fa-times-circle"></i>',
//         previewTemplate: $('#uploadPreviewTemplate').html()
//         // forceFallback: options.forceFallback,
//         // fallback: function(){
//         //     $(options.submitBtn).off('click.upload').on('click.upload',function(e){
//         //         $('form.dropzone').submit();
//         //     }).html('Upload Photo');
//         //     $('#file').on('change',function(e){
//         //         $(options.submitBtn).show();
//         //     }).removeClass('form-control');
//         // }
//     });
// });
    
</script>

@endpush

