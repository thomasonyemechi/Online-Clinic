@if (session('success'))
    <div class="alert alert-success" style="position:fixed; top:10px; right:10px; z-index:100000">
        <i><b>{!! session('success') !!}</b></i>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger" style="position:fixed; top:10px; right:10px; z-index:100000">
        <i><b>{!! session('error') !!}</b></i>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger" style="position:fixed; top:10px; right:10px; z-index:100000">
        @foreach ($errors->all() as $err)
            <i><b>{{ $err }}</b></i> <br>
        @endforeach
    </div>
@endif



