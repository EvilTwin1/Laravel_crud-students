@if(session()->has('message'))
    <div class="alert alert-dismissible alert-success">
        {{ session()->get('message') }}.
    </div>
@endif
