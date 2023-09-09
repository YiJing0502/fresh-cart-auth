@extends('templates.fontTemplete')
@section('style')
    <style>
        .form-control:focus {
            color: var(--bs-body-color);
            background-color: var(--bs-body-bg);
            border-color: var(--bs-body-color);
            outline: unset;
            box-shadow: unset;
        }
    </style>
@endsection
@section('main-content')
    <div class="container mt-5">
        <div class="alert alert-light" role="alert" style="width: 18rem;">
            You're logged in!
        </div>

        <div class="card" style="width: 18rem;">
            <img src="{{ asset('photo/login.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">個人帳號資訊</h5>
                <p class="card-text">嗨，{{ $user->name }}，歡迎使用！<br>管理您的資訊、網站會員和ＳＥＯ，打造您專屬的線上服務。</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span>姓名：</span>
                    <input type="text" class="user-editing d-none form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1" value="{{ $user->name }}" required>

                    <span class="user-name">{{ $user->name }}</span>
                </li>
                <li class="list-group-item">
                    <span>帳號：</span>
                    <span>{{ $user->email }}</span>
                </li>
                <li class="list-group-item">
                    <span>密碼：</span>
                    <span>********** &emsp;&emsp;忘記密碼？</span>
                </li>
                <li class="list-group-item">會員級別：</li>
                <li class="list-group-item">點我修改頭像</li>
            </ul>
            <div class="user-account card-body">
                <div class="user-editing d-none">
                    <button class="btn btn-secondary" onclick="editHiding()">取消</button>
                    <form action="{{route('user.info.update')}}" method="post">
                    @csrf
                    <button class="user-submit btn btn-success" onclick="editHiding()">確認送出</button>
                    </form>
                </div>
                <button class="user-edit btn btn-success" onclick="editShowing()">編輯帳號資訊</button>
            </div>
        </div>
    </div>
@endsection

@section('js')

    {{-- sweet alert js 引入 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let editController = document.querySelector('.user-edit');
        let editingController = document.querySelectorAll('.user-editing');
        let submitController = document.querySelector('.user-submit');
        let name = document.querySelector('.user-name');
        function editShowing () {
            if (editController) {
                editingController.forEach(element => {
                    element.classList.remove('d-none');
                });
                editController.classList.add('d-none');
                name.classList.add('d-none');
            }
        }
        function editHiding () {
            if(submitController) {
                editingController.forEach(element => {
                    element.classList.add('d-none');
                });
                editController.classList.remove('d-none');
                name.classList.remove('d-none');
            }
        }
    </script>
    @if ($errors->first('name'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '錯誤',
                text: '{{ $erros->first() }}',
            })
        </script>

    @endif
@endsection
