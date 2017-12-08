@extends('layouts.master')

@section('style')
@stop

@section('content')
<div class="content text-center">
	<h1>Fabric</h1><hr>
    <canvas id="c" width="1150" height="600"></canvas>
    <img src="{{ asset('images/1512543729flight.PNG') }}" id="test-image" style="display: none;">
</div>
@stop
@section('script')
<script type="text/javascript" src="{{ asset('js/fabric.min.js') }}"></script>
<script type="text/javascript">
    var canvas  = new fabric.Canvas('c');

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

    var img1 =fabric.Image.fromURL('{{ asset("images/1512524371flight.png") }}', function(img) {
         img.scale(1).set({ left: 100, top: 100 });
    });
    var img2 =    fabric.Image.fromURL('{{ asset("images/1512524371flight.png") }}', function(img) {
            img.scale(1).set({ left: 175, top: 175 });
    });
    var img3 =        fabric.Image.fromURL('{{ asset("images/1512524371flight.png") }}', function(img) {
                img.scale(1).set({ left: 250, top: 250 });
    });

    var group2 = new fabric.Group([ img1, img2, img3]);
    canvas.add(group2);
    // canvas.add(new fabric.Group([ img1, img2, img3], { left: 200, top: 200 }))
    // canvas.renderAll();
</script>
@stop