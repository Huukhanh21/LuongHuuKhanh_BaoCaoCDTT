<div class="col-md-9 text-center">
    <h2 class="text-dark text-center fs-2">TẤT CẢ SẢN PHẨM</h2>

    <div class="row">
        @foreach($book as $key => $values)
        <div class="col-md-3 p-2 text-center" style="float: left;">
            <a href="{{ route('book.index')}}">
                <div class="card bg-dark">
                    <img src="{{ asset('/public/image/book/' . $values->image) }}" class="d-block w-100"
                        alt="{{ $bookk->image }}">
                    <div class="card-body">
                        <h4 class="card-title text-light">{{ $values->name }}</h4>
                        <a href="{{ route('') }}" class="btn btn-secondary">MUA</a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>