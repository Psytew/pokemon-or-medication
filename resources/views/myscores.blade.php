@extends('layouts.app')

@section('content')
	<p>My scores!</p>
	<p>{{ Auth::user()->highscore }}</p>
@endsection