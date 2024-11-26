@extends('layout')

@section("contenu")
    <h1>{{$album->titre}}</h1>
    <a href="?ordre=titre">Trier par titre</a>
    <div id="album">
        @foreach ($photos as $photo)
            <div class="photos default">
                <span>{{$photo->titre}}</span>
                <img src="{{$photo->url}}" alt="$photo->titre" id="photo{{$photo->id}}" class="small" onclick="enlargeImg()">

            </div>
        @endforeach
        <div id="overlay"></div>
    </div>


<!-- script to set display property -->
<script>
img = document.getElementById("photo{{$photo->id}}");

function enlargeImg() {
   img.style.transform = "scale(1.5)";
   img.style.transition = "transform 0.25s ease";
}

// Function to reset image size
function resetImg() {
   img.style.transform = "scale(1)";
   img.style.transition = "transform 0.25s ease";
}
</script>

<button onclick="resetImg()">fermer</button>
</div>

</body>
@endsection