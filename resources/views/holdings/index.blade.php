@extends('layouts.main')

@section('main-content')
<table id="table">
    <thead>
        <tr>
            <th>One</th>
            <th>Two</th>
        </tr>
    </thead>
</table>
@endsection

@section('footer-assets')
<script>    
    $(function() {
        // $.dt('#table');
    });
</script>
@endsection
