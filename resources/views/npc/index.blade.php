@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            @if(count($list) < 1)
                <p>No NPC's Enter At this time. <a href={{ route('npc.create') }} >Enter an NPC now.</a></p>
            @else
                <h1>NPC Quotes</h1>
                <a href={{ route('npc.create') }} >Enter a New NPC Quote</a>
                <ul>
                @foreach ($list as $npc)
                    <li><b>{{ $npc->name }}</b> - {{ $npc->quote }} - <i>{{ $npc->tags }}</i> - <a href="npc/{{ $npc->id }}/edit">EDIT</a></li>
                @endforeach
                </ul>
            @endif
        </div>
        {{ $list->links() }}
    </div>
</div>
@endsection