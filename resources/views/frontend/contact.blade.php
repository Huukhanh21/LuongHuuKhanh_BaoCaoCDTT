<style>
.menu_ft a {
    text-decoration: none;
    color: rgb(215, 209, 209);

}

.menu_ft a:hover {
    color: rgb(228, 188, 42);
}

.menu_ft li {
    list-style-type: none;
}

.col a {
    text-decoration: none;
    color: rgb(215, 209, 209);
}

iframe {
    margin-top: 10px;
}
</style>

<section class="myfooter bg-dark text-white py-3">
    <div class="container">

            <div class="text-warning bg-dark">
                <h5>NHẬP THÔNG TIN LIÊN HỆ</h5>
           
                <div class="col-mb-3 text-warning bg-dark border border-warning border border-2  ">
                    <div class="contact-form">
                        <form enctype="multipart/form-data" method="POST" action="{{route('contact.store')}}">
                            @csrf
                            <div class="row" >
                                <div class="col md-9">
                                    <div class="mb-3">
                                        <label for="name">Tên liên hệ</label>
                                        <input name="name" id="name" value="{{old('name')}}" type="text" class="form-control" required
                                            placeholder="Nhập họ và tên">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input name="email" value="{{old('email')}}" id="email" type="text" required class="form-control"  placeholder="Nhập email">
                                    </div>
                                   
                                  
                                </div>
                        
                                <div class="col md-3">
                                    <div class="mb-3">
                                        <label for="address">Địa chỉ</label>
                                        <input name="address" value="{{old('address')}}" id="address" type="text" required class="form-control"  placeholder="Nhập địa chỉ">
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="phone">Số điện thoại</label>
                                            <input name="phone" value="{{old('phone')}}" id="phone" type="text" required class="form-control"  placeholder="Nhập số điện thoại">
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="text-right " style="">
                                    <button name="THEM" type="submit" class="btn btn-primary btn-block">
                                        Gửi
                                    </button>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div>

            </div>
    </div>
    <div class="container">

        <h3 class="text-center mb-4 mt-4 ">Chi Tiết Liên Hệ </h3>


        <div class="row">

            <div class="col-md-3 ">
                <ul class="menu_ft">
                    <h5>Tài khoản</h5>

                    <li><a href="/">Trang chủ</a></li>

                    <li><a href="/gioi-thieu">Giới thiệu</a></li>

                    <li><a href="/san-pham">Sản phẩm</a></li>

                    <li><a href="/tin-tuc">Tin tức</a></li>

                    <li><a href="/lien-he">Liên hệ</a></li>

                </ul>
            </div>
            <div class="col-md-3 ">

                <ul class="menu_ft">
                    <h5>Chính sách</h5>

                    <li><a href="/">Chính sách mua hàng</a></li>

                    <li><a href="">Chính sách bảo hành</a></li>

                    <li><a href="">Chính sách vận chuyển</a></li>

                    <li><a href="">Chính sách đổi trả</a></li>



                </ul>
            </div>
            <div class="col-md-3 ">

                <ul class="menu_ft">
                    <h5>Hỗ Trợ</h5>

                    <li><a href="/">Giải đáp thắc mắc</a></li>

                    <li><a href="/gioi-thieu">Tư vấn bán sỉ</a></li>

                    <li><a href="/collections/all">Chương trình cộng tác viên</a></li>

                    <li><a href="/tin-tuc">Quà tặng tri ân</a></li>

                    <li><a href="/lien-he">Hướng dẫn mua hàng</a></li>

                </ul>
            </div>
            <div class="col-md-3 ">

                <ul class="menu_ft">
                    <h5>Sản phẩm nổi bật</h5>

                    <li><a href="/san-pham/japan">motto</a></li>

                    <li><a href="/san-pham/russia">motto Nga</a></li>

                    <li><a href="/san-pham/germary">motto Đức</a></li>

                    <li><a href="/tin-tuc">motto</a></li>

                    <li><a href="/lien-he">motto</a></li>

                </ul>
            </div>

        </div>
        <hr />
        <div class="row">
            <div class="col md-7">
                

                    <div class="address"><b>Địa chỉ:</b>
                        31 đường số 9, khu đô thị Vạn Phúc,Phường Hiệp Bình Phước, quận Thủ Đức, TP Hồ Chí Minh
                    </div>
                    <div class="phone"><b>
                            <FaPhoneAlt /> Hotline:
                        </b>
                        0362603308
                    </div>
                    <div class="email">
                        <b>
                            <GrMail /> Email:
                        </b>
                        <a href="mailto:support@sapo.vn"> luonghuukhanh21@gmail.com</a>
                    </div>
                </div>

                <div class="col md-4 " style="margin-left: 50px;">
                    <iframe title="ggmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.583865996569!2d106.7083893748191!3d10.
                    843123557960416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175286ff8248ad9%3A0xcc8ece5ddf95d992!2zMzEgxJAuID
                    ksIEhp4buHcCBCw6xuaCBQaMaw4bubYywgVjhu6cgxJDhu6ljLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1
                    687570558421!5m2!1sen!2s" style="width: 500px;"></iframe>
                </div>


           
        </div>
    </div>





    </div>
    </div>

</section>