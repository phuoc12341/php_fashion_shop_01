        
    @extends('admin.index')

    @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{ $user->name }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors-> all() as $message)
                                    {{$message}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        <form action="admin/user/edit/{{ $user->id }}" method="POST">
                            @csrf        
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="name" placeholder="Nhập tên người dùng" value="{{ $user->name }}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ email" value="{{ $user->email }}" readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="checkbox" id="doimatkhau">
                                <label for="doimatkhau">Đổi mật khẩu</label>
                                <input type="password" class="form-control matkhau" name="password" placeholder="Nhập password" disabled="" />
                                 <label>Nhập lại Mật khẩu</label>
                                <input type="password" class="form-control matkhau" name="passwordAgain" placeholder="Nhập lại password" disabled="" " />
                            </div>
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input name="role" value="{{ config('role.user.customer') }}" type="radio"
                                    @if($user->role == config('role.user.customer'))
                                        {{"checked"}}
                                    @endif
                                    >Thường
                                </label>
                                <label class="radio-inline">
                                    <input name="role" value="{{ config('role.user.admin') }}" type="radio"
                                    @if($user->role == config('role.user.admin'))
                                        {{"checked"}}
                                    @endif                                        
                                    >Admin
                                </label>
                            </div>     

                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                $('#doimatkhau').change(function() {
                    if ($(this).is(':checked')) {
                        $('.matkhau').removeAttr('disabled');
                    }else {
                        $('.matkhau').attr('disabled', '');
                    }
                });
            });
        </script>
    @endsection
