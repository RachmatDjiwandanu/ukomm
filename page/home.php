
    <div class="container mt-4">
        <div class="masonry" >
            <div class="mItem">
              <img src="https://source.unsplash.com/random/300">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/100">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/50">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/600">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/200">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/500">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/400">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/30">
            </div>
            <div class="mItem">
              <img src="https://source.unsplash.com/random/10">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/20">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/60">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/80">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/300">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/200">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/100">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/50">
            </div>
            <div class="mItem">
              <img src="https://source.unsplash.com/random/600">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/500">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/400">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/30">
            </div>
            <div class="mItem">
              <img src="https://source.unsplash.com/random/10">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/20">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/60">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/80">
            </div>
            <div class="mItem">
              <img src="https://source.unsplash.com/random/300">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/200">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/100">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/50">
            </div>
            <div class="mItem">
              <img src="https://source.unsplash.com/random/600">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/500">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/400">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/30">
            </div>
            <div class="mItem">
              <img src="https://source.unsplash.com/random/10">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/20">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/60">
            </div>
          
            <div class="mItem">
              <img src="https://source.unsplash.com/random/80">
            </div>
        </div>
    </div>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            // Initialize Masonry grid
            var $grid = $('.masonry').masonry({
                itemSelector: '.mItem',
                columnWidth: '.mItem',
                percentPosition: true
            });
            // Layout Masonry grid after each image loads
            $grid.imagesLoaded().progress( function() {
                $grid.masonry('layout');
            });
        });
    </script>

</body>
</html>