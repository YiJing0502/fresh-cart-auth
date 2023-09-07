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
                <!-- 新增產品 -->
                <div class="add-product">
                    <form action="{{route('typeStore')}}" method="POST" enctype="multipart/form-data">
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
                                        <input name="img[]" type="file" class="form-control" placeholder="輸入產品圖片"
                                            aria-label="Username" aria-describedby="basic-addon1" required accept="image/*" multiple>
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
                                    <a href="{{ route('typeProductList') }}">
                                        <button type="button" class="btn btn-outline-success me-3">取消新增</button>
                                    </a>
                                    <!-- 新增產品 -->
                                    <a href="">
                                        <button type="submit" class="btn btn-outline-success">新增產品</button>
                                    </a>
                                </div>
                            </div>
                    </form>



                </div>
@endsection
