@extends('layouts.master')

@section('content')
<div class="content text-center">
    <h1>Create Game</h1><hr>
    <form class="form-horizontal" method="POST" action="{{ route('game.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Name</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" autofocus required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script type="text/javascript">
    
</script>
@endsection
