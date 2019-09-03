@extends('layouts.app')

@section('content')
	<ranked-random userid="{{auth()->user()->id}}"score=0 incorrect=0 increment=0></ranked-random>
@endsection