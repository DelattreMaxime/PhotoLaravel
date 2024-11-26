
<body>
<div class="container" 
         style="text-align: center; margin-top: 5em;">
        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/geeksforgeeks-6.png" 
            onclick="enlargeImg()"
            id="img1" />

        <button onclick="resetImg()">Reset</button>
    </div>


    <script>
        img = document.getElementById("img1");
      
        function enlargeImg() {
            img.style.transform = "scale(1.5)"
            img.style.transition = "transform 0.25s ease"
        }
      
        // Function to reset image size
        function resetImg() {
            img.style.transform = "scale(1)"
            img.style.transition = "transform 0.25s ease"
        }
    </script>
</body>