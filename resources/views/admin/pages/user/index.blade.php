@extends('admin.master.index')


@section('title')
    پنل ادمین - کاربران
@endsection

@section('content')

    <div class="container m-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            افزودن کاربر
        </button>

        <!-- Modal -->
        <div style="z-index: 100000" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اطلاعات افزودن کاربر</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form method="post" id="my-form" action="{{ route('user.store') }}">
                                @csrf
                                @method('post')
                                <label class="mt-3 p-2 badge badge-danger">نام کاربر</label>
                                <input value="{{ old('name') }}" type="text" name="name" class="form-control mt-1">
                                <label class="mt-3 p-2 badge badge-danger">شماره تماس</label>
                                <input value="{{ old('phon') }}" type="text" name="phon" class="form-control mt-1">
                                <label class="mt-3 p-2 badge badge-danger">شماره تماس دوم (اختیاری)</label>
                                <input value="{{ old('phon2') }}" type="text" name="phon2" class="form-control mt-1">
                                <button type="submit" class="form-control mt-4 btn btn-success" >ارسال</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">کنسل</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container mt-5">
        {{ $users->links() }}
    </div>
    <div class="container mt-5">
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <th scope="col">نام</th>
                <th scope="col">شماره تماس اول</th>
                <th scope="col">شماره تماس دوم</th>
                <th scope="col">وضعیت ها</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr>
                    <td>{!! $item['name'] !!}</td>
                    <td>{!! $item['phon'] !!}</td>
                    <td>{!! $item['phon2'] !!}</td>
                    <td>
                        <button class="btn btn-success"><a class="text-white" href="{{ route('user.edit',$item['id']) }}">آپدیت</a></button>
                        <button onclick="deleteUser({{ $item['id'] }})" class="btn btn-danger m-3">حذف</button>
                        <form id="user-{{ $item['id'] }}" method="post" action="{{ route('user.destroy',$item['id']) }}" class="form-horizontal">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <script>
        function deleteUser(id){
            event.preventDefault();
            Swal.fire({
                title: "مطمئن هستید",
                text: "با حذف این خدمت کل اطلاعات مربوطه حذف می شوند",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector("#user-"+id).submit();
                }
            });
        }
        @if(session('status'))
        Swal.fire({
            title: "وضیعت",
            text: "{{ session('status') }}",
            icon: "success"
        });
        @endif
    </script>
@endsection
