@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="/npc/{{ $entry->id }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

            <div class="form-group">
                <label for="name">NPC Name</label>
                <input type="text" class="form-control" id="new_name" name="name" placeholder="Enter New NPC Name" value="{{ $entry->name }}">
            </div>
            <div class="form-group">
                <label for="quote">NPC Quote</label>
                <input type="text" class="form-control" id="quote" name="quote" placeholder="Enter New NPC Quote" value="{{ $entry->quote }}">
            </div>
            <div class="form-group">
                <label for="tags">Quote Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter Quote Tags" value="{{ $entry->tags }}">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection