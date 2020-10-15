@extends('layouts.app')

@section('content')
    <div class="row">
        
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>

        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'teams.store']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'タイトル') !!}
                        {!! Form::textarea('title', old('title'), ['class' => 'form-control', 'rows' => '1']) !!}
                        
                        {!! Form::label('sports_name', '競技') !!}
                        {!! Form::textarea('sports_name', old('sports_name'), ['class' => 'form-control', 'rows' => '1']) !!}
                        
                        {!! Form::label('location', '場所') !!}
                        {!! Form::textarea('location', old('location'), ['class' => 'form-control', 'rows' => '1']) !!}
                        
                        {!! Form::label('location_add', '場所の住所') !!}
                        {!! Form::textarea('location_add', old('location_add'), ['class' => 'form-control', 'rows' => '1']) !!}
                        
                        {!! Form::label('rec_num', '募集人数') !!}
                        {!! Form::input('integer','rec_num',10,['id' => 'hoge','class' => 'hogehoge']) !!}
                        
                        {!! Form::label('max_num', '最大人数') !!}
                        {!! Form::input('integer','max_num',15,['id' => 'hoge','class' => 'hogehoge']) !!}
                        
                        {!! Form::label('now_num', '現在') !!}
                        {!! Form::input('integer','now_num',3,['id' => 'hoge','class' => 'hogehoge']) !!}
                        
                        {!! Form::label('content', '補足説明') !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '4']) !!}
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
            @if (count($teams) > 0)
                @include('teams.teams', ['teams' => $teams])
            @endif
        </div>
    </div>
@endsection