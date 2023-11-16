@if (count($list_brand)>0)
    <ul class="list-group mb-4">
        <li class="list-group-item text-white bg bg-dark" aria-current="true">Thương hiệu</li>
      @foreach ($list_brand as $brand)
      <li class="list-group-item">
        <a class=" text-decoration-none text-dark"
          href="{{ route('slug.home',['slug'=>$brand->slug]) }}">
          {{$brand->name}}
        </a>
      </li>
      @endforeach
        
     
      </ul>
@endif