@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your high score!</div>
                    <p class="mt-4 ml-4">Your high score is {{ Auth::user()->highscore }}!</p>
                </div>
            </div>
        </div>
    </div>
@endsection