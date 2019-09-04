@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Leaderboard</div>
                    <ol class="mt-4 ml-4">
					@foreach($users as $user)
						<li>{{$user->name}} - {{$user->highscore}}</li>
					@endforeach
					</ol>
                </div>
            </div>
        </div>
    </div>
@endsection