@extends('layouts.master')

@section('style')
@stop

@section('content')
<div class="content">
	<h1 class="text-center">Edit Game</h1><hr>
	<form class="form-horizontal" method="POST" action="{{ route('game.update', ['id' => $game->id]) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name" class="col-sm-2 col-sm-offset-2 control-label">Name</label>
            <div class="col-sm-3">
                <input id="name" type="text" class="form-control" name="name" value="{{ $game->name }}" required>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Deploy</button>
            </div>
            <div class="col-sm-3"></div>
        </div>      
    </form>
	<div class="content">
		<div class="col-sm-6">
			<h4>Game Field</h4>
			<canvas id="c" width="500" height="500"></canvas>
		</div>
		<div class="col-sm-6">
			<h4>Edit Field</h4>
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="{{ asset('js/fabric.min.js') }}"></script>
<script type="text/javascript">
	// 초기화 부분
    var canvas  = new fabric.Canvas('c');
    canvas.set({
    	backgroundColor: 'gray'
    });
    
    var circle = new fabric.Circle({
        radius: 100,
        fill: '#eef',
        scaleY: 0.5,
        originX: 'center',
        originY: 'center'
    });

    var text = new fabric.Text('hello world', {
        fontSize: 30,
        originX: 'center',
        originY: 'center'
    });

    var group = new fabric.Group([circle, text], {
        left: 150,
        top: 100,
        angle: -10
    });

    canvas.add(group);

    group.item(0).set({
        fill: 'red'
    });
    group.item(1).set({
        text: 'trololo',
        fill: 'white'
    });
</script>
@stop