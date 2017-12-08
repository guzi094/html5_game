@extends('layouts.master')

@section('style')
@stop

@section('content')
<div class="content text-center">
	<h1>Game List</h1>
    <div class="content text-right">
    	<a href="{{ route('game.create') }}">
    		<button class="btn-success">New</button>
    	</a>
    </div>
    <hr>
</div>
<div class="content">
	<table class="table table-striped">      
    <thead>
      <tr>       	
        <th>Name</th>        
        <th>Play</th>
      </tr>
    </thead>
    <tbody>
    	@forelse ($games as $game)
    	<tr>        
            <td>
                <a href="{{ route('game.edit', ['id' => $game->id]) }}">
                    {{ $game->name }}
                </a>                
            </td>
            <td>
        	   <a href="/game_play/{{ $game->id }}">
        		  <button class="btn btn-danger">Go</button>
        	   </a>
            </td>
        </tr>
        @empty
    	@endforelse
    </tbody>
  </table>
</div>
@stop
@section('script')
<script type="text/javascript">
    
</script>
@stop