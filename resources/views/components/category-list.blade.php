@if (count($list_category)>0)
    <ul class="list-group mb-4">
        <li class="list-group-item text-white bg bg-dark" aria-current="true">Danh mục</li>
      @foreach ($list_category as $category)
      <li class="list-group-item">
        <a class=" text-decoration-none text-dark"
          href="{{ route('slug.home',['slug'=>$category->slug]) }}">
          {{$category->name}}
        </a>
      </li>
      @endforeach
        
     
      </ul>
@endif