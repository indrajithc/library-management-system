@if(session('success'))
    <div class="alert alert-success" role="alert" style="margin: 1rem;">
        {{ session('success') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning" role="alert" style="margin: 1rem;">
        {{ session('warning') }}
    </div>
@endif

