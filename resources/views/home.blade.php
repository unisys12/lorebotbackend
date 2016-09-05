@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}'s Dashboard</div>

                <div class="panel-body">
                    <p>Select a Task to complete or that you would like to work on.</p>
                    <ul>
                        <li>
                            <a href={{ route('npc.index') }} >Edit NPC Quotes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
