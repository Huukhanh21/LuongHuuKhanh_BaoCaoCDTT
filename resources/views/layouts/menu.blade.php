
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                 
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Trang người dùng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('admin')}}">Trang chủ</a>
                            </li>
                        
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Danh sách
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('category.index')}}">Danh mục</a></li>
                      
                                    <li><a class="dropdown-item" href="{{route('brand.index')}}">Thương hiệu</a></li>
                                    <li><a class="dropdown-item" href="{{route('book.index')}}">Sản phẩm</a></li>
                                    <li><a class="dropdown-item" href="">Liên hệ</a></li>
                                    <li><a class="dropdown-item" href="">Khách hàng</a></li>
                                    <li><a class="dropdown-item" href="">Người dùng</a></li>
                                    <li><a class="dropdown-item" href="">Đơn hàng</a></li>
                                    <li><a class="dropdown-item" href="">Bài viết</a></li>
                                    <li><a class="dropdown-item" href="">Chủ đề</a></li>
                                    <li><a class="dropdown-item" href="">Banner</a></li>
                                 
                            
                                </ul>
                            </li>
                        
                         
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
