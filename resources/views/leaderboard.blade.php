@extends('layouts.app')

@section('content')
	<p>Leaderboard</p>
	<ol>
	@foreach($users as $user)
		<li>{{$user->name}} - {{$user->highscore}}</li>
	@endforeach
	</ol>
@endsection