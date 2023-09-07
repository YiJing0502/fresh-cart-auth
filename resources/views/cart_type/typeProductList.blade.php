@extends('templates.templete')
@section('main')
    <!-- 主欄最上面 -->
    <div class="two-up row my-5 m-0 p-0 ">
        <div class="col-12 offset-md-1 col-md-5   ">
            <div class="row">
                <div class="col-12">
                    <h2>Product list</h2>
                </div>
                <div class="col-3"><span>Dashboard</span></div>
                <div class="col-6"><span class="text-black-50">Categories</span></div>
            </div>

        </div>
    </div>
    <!-- 主欄第二排 -->

    <!-- 購物清單 -->
    <div class="list-big">
        <div class="two-down row mb-2 m-0 py-5 px-4">
            <div class="col-12 col-md-6  align-items-center d-flex">
                <form class="d-flex w-75" role="search">
                    <input class="form-control  form-control-2 text-black-50" type="search" placeholder="Search Category"
                        aria-label="Search">
                </form>
                <a href="{{ route('typeAdd') }}">
                    <button type="button" class="btn ms-md-2 btn-success  btn-success-self-2">Add New
                        Category</button>
                </a>
            </div>
            <div class="col-12 offset-md-4 col-md-2 mt-2 mt-md-0">
                <div class="dropdown ">
                    <a class="btn btn-secondary w-100  py-1 dropdown-self dropdown-toggle text-black " href="#"
                        role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                    </a>

                    <ul class="dropdown-menu rounded-4 dropdown-menu-self py-0 w-100" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item rounded-top-4 py-0 " href="#">Status</a></li>
                        <li><a class="dropdown-item py-0" href="#">Published</a></li>
                        <li><a class="dropdown-item rounded-bottom-4 py-0" href="#">Unpublished</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="list  mb-self">
            <!-- 第一行 -->
            <div class="row w-100  m-0 text-secondary fs-14-self py-2 bg-line">
                <div class="col-1 d-flex justify-content-center align-items-center"><input type="checkbox"
                        class="input-size input-1"></input></div>
                <div class="col-1 d-flex justify-content-start align-items-center">Image</div>
                <div class="col-2 d-flex justify-content-start align-items-center">Name</div>
                <div class="col-2 d-flex justify-content-start align-items-center">Description</div>
                <div class="col-2 d-flex justify-content-start align-items-center">Creation Date</div>
                <div class="col-2 d-flex justify-content-center align-items-center">Function</div>

            </div>
            <!-- 第二行 -->
            @foreach ($types as $item)
                {{-- @dd($item); --}}
                <div class="row w-100 m-0 text-secondary fs-14-self py-2" id="dataDel{{ $item->id }}">
                    <div class="col-1 d-flex justify-content-center align-items-center"><input type="checkbox"
                            class="input-size"></input></div>
                    <div class="col-1 d-flex justify-content-start align-items-center">
                        @foreach ($item->productTypeImg as $img)
                            <img src="{{ asset($img->img_path) }}" class="img-size">
                        @endforeach
                    </div>
                    <div class="col-2 d-flex justify-content-start align-items-center">{{ $item->name }}</div>
                    <div class="col-2 d-flex justify-content-start align-items-center">{{ $item->desc }}
                    </div>
                    <div class="col-2 d-flex justify-content-start align-items-center">
                        {{ $item->created_at->format('Y-m-d') }}
                    </div>
                    {{-- 狀態 --}}
                    {{-- <div class="col-1 d-flex justify-content-center align-items-center">
                                     @if ($item->status == 1)
                                        <span class="px-1 bg-green rounded">已上架</span>
                                        @else
                                        <span class="px-1 rounded">未上架</span>
                                        @endif
                                </div> --}}
                    {{-- 價格 --}}
                    {{-- <div class="col-1 d-flex justify-content-center align-items-center">${{$item -> price}}</div> --}}
                    <div class="col-2 d-flex justify-content-center align-items-center flex-wrap">
                        <a href="{{ route('typeEdit', ['id' => $item->id]) }}">
                            <button type="button" class="btn mb-2 btn-success  btn-success-self">Edit</button>
                        </a>
                        {{-- 寫法一 --}}
                        {{-- <form action="{{ route('typeDestroy', ['id' => $item->id]) }}" method="post" class="delete-alert" data-name="{{$item->name}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn  btn-success  btn-success-self">Delete</button>
                        </form> --}}
                        {{-- 寫法二 --}}
                        <button type="button" class="btn  btn-success  btn-success-self"
                            onclick="deleteData({{ $item->id }},'{{ $item->name }}' )">Delete</button>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- 頁數 --}}
    <div class="row no-hover py-4 px-3 align-items-center">
        <div class="col-6 col-md-6 fs-14-self text-secondary">Showing 1 to 8 of 12 entries</div>
        <div class="col-6 offset-md-2 col-md-4">
            <div aria-label="Page navigation example">
                <ul class="pagination  px-0 m-0 ">
                    <li class="page-item "><a class="page-link py-2 rounded-2 text-secondary" href="#">Previous</a>
                    </li>
                    <li class="page-item "><a class="page-link py-2 ms-1 rounded-2 text-secondary " href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary" href="#">2</a></li>
                    <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary" href="#">3</a></li>
                    <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary" href="#">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // 寫法一 藉由form表單送出
        // {{-- 刪除產品跳出彈跳視窗，並送出表單 --}}
        // const myForms = document.querySelectorAll('.delete-alert');
        // console.log(myForms);
        // myForms.forEach(form => {
        //     form.addEventListener('submit', (event) => {
        //         event.preventDefault();
        //         // console.log(event.target.dataset.name);
        //         Swal.fire({
        //             title: `確認刪除「${event.target.dataset.name}」嗎？`,
        //             showDenyButton: true,
        //             confirmButtonText: '取消',
        //             denyButtonText: `刪除`,
        //         }).then((result) => {
        //             /* Read more about isConfirmed, isDenied below */
        //             if (result.isDenied) {
        //                 form.submit();
        //             }
        //         });
        //     });

        // });

        // 寫法二 btn交給js，js 拿id送到指定的路由
        function deleteData(id, name) {
            console.log(id);
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'delete');
            Swal.fire({
                title: `確認刪除「${name}」嗎？`,
                showDenyButton: true,
                confirmButtonText: '取消',
                denyButtonText: `刪除`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    fetch(`/type/destroy/${id}`, {
                        method: 'post',
                        body: formData,
                    }).then((res) => {
                        return res.text();
                    }).then((data) => {
                        if (data == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: '刪除成功',
                            })
                            const deleteData = document.querySelector(`#deleteData${id}`);
                            deleteData.remove();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '刪除資料',
                                text: '查無資料',
                            });
                        };
                    });


                };
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
