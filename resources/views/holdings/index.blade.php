@extends('layouts.main')

@section('main-content')
<div class="content">
    
    <holdings></holdings>

</div>
@endsection

@section('footer-assets')
<script>
    const app = new Vue({
    el: '.content'
});
</script>
@endsection
