@extends('layouts.main')

@push('styles')
<link rel="stylesheet" href="/venobox/venobox.css" type="text/css" media="screen" />
@endpush

@section('main-content')
	@foreach($holding->images as $image)
	<a class="venobox" data-gall="holdings" href="{{ action('ImageController@showImage', ['user_id' => $holding->user_id, 'image_id' => $image->id]) }}"><img src="{{ action('ImageController@showThumb', ['user_id' => $holding->user_id, 'image_id' => $image->id]) }}" alt="image alt"/></a>
	@endforeach
@endsection

@push('scripts')
<script type="text/javascript" src="/venobox/venobox.min.js"></script>
<script>
	$(document).ready(function() {
		/* default settings */
		$('.venobox').venobox();
	});
</script>
@endpush