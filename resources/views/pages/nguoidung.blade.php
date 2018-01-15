@extends('layout.index')

@section('content')

    <!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container nguoidung_">
        <div class="card col-md-8 col-md-push-2">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            @if (count($errors) > 0)
                @foreach($errors->all() as $err)
                    <div class="alert alert-danger">
                        {{$err}}<br>
                    </div>
                @endforeach
            @endif
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <form class="form-signin" action="nguoidung" method="post">
                {{csrf_field()}}
                <span id="reauth-email" class="reauth-email"></span>
                <label for="">Họ tên</label>
                <input type="text" name="name" value="{{$current_user->name}}" class="form-control" placeholder="Tên người dùng" autofocus>
                <label for="">Email</label>
                <input type="email" value="{{$current_user->email}}" name="email" class="form-control" placeholder="Email address" readonly >
                <input type="checkbox" id="changePassword" name="changePassword">
                <label for="">Đổi Mật khẩu</label>
                <input type="password" name="password" class="form-control password" placeholder="Password" disabled>
                <label for="">Nhập Lại Mật khẩu</label>
                <input type="password" name="passwordAgain" class="form-control password" placeholder="Password" disabled>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sửa</button>
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if ($(this).is(":checked")){
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection