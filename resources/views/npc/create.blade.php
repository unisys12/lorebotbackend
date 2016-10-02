@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action={{ route('npc.store') }} method="POST">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="name">NPC Name</label>
                <select class="form-control" id="name" name="name" onchange="val()">
                    <option value="">Use Only for Selecting an Existing NPC</option>
                    @foreach ($npcs as $npc)
                        <option value="{{ $npc->name }}" name="name">{{ $npc->name }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control" id="new_name" name="name" placeholder="Enter New NPC Name" value="{{ old('name') }}" onchange="val()">
            </div>
            <div class="form-group">
                <label for="quote">NPC Quote</label>
                <input type="text" class="form-control" id="quote" name="quote" placeholder="Enter New NPC Quote" value="{{ old('quote') }}">
            </div>
            <div class="form-group">
                <label for="tags">Quote Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter Quote Tags" value="{{ old('tags') }}">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
            <label for="same_npc">Will your next submission for the same NPC?</label>
            <input type="checkbox" name="same_npc" id="same_npc" checked>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

function val()
{
    var name = document.getElementById("name").value;
    var new_name = document.getElementById("new_name").value;
    
    if (name) {
        document.getElementById("new_name").setAttribute('disabled', 'disabled');
    }

    if(new_name) {
        document.getElementById("name").setAttribute('disabled', 'disabled');
    }
}

</script>
@endsection