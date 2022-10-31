@foreach(Session::get('flight') as $f)
{{ $f->id}}
@endforeach