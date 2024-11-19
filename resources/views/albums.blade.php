@extends ("layout")
@section ("contenu")
<ul>
    @foreach ($films as $films)
    <li> <a href ="{{route("detailFilm", ['id'=> $album ->id])}}"> {{$album -> titre}} </li>
    @endforeach
</ul>

@endsection