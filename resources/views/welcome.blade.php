@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Welcome to LoreBot 12-86</h3>
                    <div class="panel-body">
                        <p>Here, you will be able to configure a few things pertaining to LoreBot's functionality. That is after you have passed Rasputin's test.</p>
                        <ul>
                            <li><a href="{{ route('npc.index') }}">NPC Quotes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection