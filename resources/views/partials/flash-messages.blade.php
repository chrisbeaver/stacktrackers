@if(session()->has('message'))
    <div class="notification is-warning">
        <button class="delete"></button>
        {{ session()->get('message') }}
    </div>
@endif
@if(count($errors) > 0)
    <div class="container">
        <div class="row">
            <div class="notification is-danger">
                <button class="delete"></button>
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif