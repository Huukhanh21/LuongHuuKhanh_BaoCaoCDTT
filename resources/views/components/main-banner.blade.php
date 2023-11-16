<div>
<div class="carousel" data-bs-interval="1000">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @php $index = 1; @endphp
            @foreach($banner as $key => $row)
                @if($index == 1)
          <div class="carousel-item active">
            <img src="{{ asset('image/banner/' . $row->image) }}" class="d-block w-100"  alt="{{ $row->image }}">
            <div class="carousel-caption d-none d-md-block">
             
              
            </div>
          </div>
          @else
          <div class="carousel-item">
            <img src="{{ asset('image/banner/' . $row->image) }}" class="d-block w-100" alt="{{ $row->image }}">
            <div class="carousel-caption d-none d-md-block">
            
            </div>
          </div>
          @endif
          @php $index++; @endphp
      @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>  
</div>

</div>