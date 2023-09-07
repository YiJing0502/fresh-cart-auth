@extends('templates.templete')
@section('main')
                <!-- 主欄最上面 -->
                <div class="two-up row my-5 m-0 p-0 ">
                    <div class="col-12 offset-md-1 col-md-5   ">
                        <div class="row">
                            <div class="col-12">
                                <h2>新增產品</h2>
                            </div>
                            <div class="col-3"><span>Dashboard</span></div>
                            <div class="col-6"><span class="text-black-50">Categories</span></div>
                        </div>

                    </div>

                </div>
                <!-- 主欄第二排 -->

                <!-- 新增產品 -->
                <div class="add-product">
                    <form action="{{route('cartStore')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row d-flex flex-column">
                                <!--  產品名稱 -->
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">產品名稱</span>
                                        <input name="name" type="text" class="form-control" placeholder="輸入產品名稱"
                                            aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <!-- 產品圖片 -->
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">產品圖片</span>
                                        <input name="img" type="file" class="form-control" placeholder="輸入產品圖片"
                                            aria-label="Username" aria-describedby="basic-addon1" required accept="image/*">
                                    </div>
                                </div>
                                <!-- 產品價格 -->
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">產品價格</span>
                                        <input name="price" type="number" min="0" class="form-control" placeholder="輸入產品價格"
                                            aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <!-- 顯示狀態 -->
                                <div class="col">
                                    <div class="input-group mb-3 ">
                                        <span class="input-group-text" id="basic-addon1">顯示狀態</span>
                                        <div class="form-control d-flex">
                                            <div class="form-check me-3">
                                                <input name="status" class="form-check-input" type="radio"
                                                id="flexRadioDefault1" value="1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    上架
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="status" class="form-check-input" type="radio"
                                                id="flexRadioDefault2" value="2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    不上架
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- 產品描述 -->
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text">產品描述</span>
                                        <textarea name="desc" class="form-control" aria-label="With textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 ">
                                <div class="col d-flex justify-content-end">
                                    <!-- 取消新增 -->
                                    <a href="{{ route('cartProductList') }}">
                                        <button type="button" class="btn btn-outline-success me-3">取消新增</button>
                                    </a>
                                    <!-- 新增產品 -->
                                    <a href="{{ route('cartStore') }}">
                                        <button type="submit" class="btn btn-outline-success">新增產品</button>
                                    </a>
                                </div>

                            </div>
                    </form>



                </div>
 @endsection
