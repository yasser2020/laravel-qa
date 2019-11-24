@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Qustions</div>

                <div class="card-body">
                    @foreach($questions as $question)
                    <div class="media">
                    <div class="media-body">
                    
                    <h1 class="mt00">{{$question->title}}</h1>
                    <p>{{str_limit($question->body,250)}}<p>
                    </div>
                    <hr>
                    </div>
                    @endforeach
                    <div class="mx-auto">
                    {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
