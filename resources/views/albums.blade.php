@extends ("layout")
@section ("contenu")
<ul>
    @foreach ($albums as $albums)
    <li> <a href ="{{route("photosAlbum", ['id'=> $album ->id])}}"> {{$album -> titre}} </li>
    @endforeach
</ul>

@endsection