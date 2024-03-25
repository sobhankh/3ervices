@extends('admin.master.index')


@section('title')
     خدمات
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>

                <th scope="col">نام خدمات</th>
                <th scope="col">جنریت شهر</th>
                <th scope="col">فعال</th>
                <th class="text-center" scope="col">
                    تنظیمات
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($aListService as $aService)
                    <tr>
                        <td>{!! $aService['title'] !!}</td>
                        <td>
                            @if($aService['is_generate'] == 1)
                                <p class="text-success">جنریت شده</p>
                            @endif
                            @if($aService['is_generate'] == 0)
                                    <p class="text-danger">جنریت نشده</p>
                            @endif
                        </td>
                        <td>
                            @if($aService['status'] == 1)
                                <a style="cursor: pointer" class="text-danger" onclick="activeService('{{ route('set.status',$aService['id']) }}')" class="text-success">غیر فعال کردن</a>
                            @endif
                            @if($aService['status'] == 0)
                                <a style="cursor: pointer" class="text-success" onclick="dactiveService('{{ route('set.status',$aService['id']) }}')" class="text-danger"> فعال کردن</a>
                            @endif
                        </td>
                        <td>
                            @if($aService['is_generate'] == 0)
                                <button class="btn btn-success mt-3"><a href="{{ route('genrate.view', $aService['slug']) }}" class="text-black-50">جنریت شهر</a></button>
                            @endif
                                @if($aService['is_generate'] == 1)
                                    <button class="btn btn-dar m-3"><a href="{{ route('mangment.edit',$aService['slug']) }}" class="text-black-50">مدیریت شهر ها</a></button>
                                    <button class="btn btn-info m-3"><a href="{{ route('services.show',$aService['slug']) }}" class="text-black-50">تنظیمات سایت</a></button>
                                    <button class="btn btn-secondary m-3"><a href="{{ route('menus.show',$aService['id']) }}" class="text-black-50">افزودن منو</a></button>
                                    <button class="btn btn-warning m-3"><a href="{{ route('blog.index',$aService['id']) }}" class="text-black-50">وبلاگ</a></button>
                                @endif
                                <button onclick="deleteService({{ $aService['id'] }})" class="btn btn-danger m-3">حذف</button>
                                <form id="service-{{ $aService['id'] }}" method="post" action="{{ route('register.destroy',$aService['id']) }}" class="form-horizontal">
                                    @csrf
                                    @method('delete')
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
            {{ $aListService->links() }}
        </div>
    </div>
    <script>
        function deleteService(id){
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
                    document.querySelector("#service-"+id).submit();
                }
            });
        }
        function activeService(id){
            event.preventDefault();
            Swal.fire({
                title: "مطمئن هستید",
                text: "با غیر فعال این خدمت کل اطلاعات مربوطه غیر فعال می شوند",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = id;
                }
            });
        }
        function dactiveService(id){
            event.preventDefault();

            Swal.fire({
                title: "مطمئن هستید",
                text: "با  فعال این خدمت کل اطلاعات مربوطه  فعال می شوند",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = id;
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


