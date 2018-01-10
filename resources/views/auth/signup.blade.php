
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-danger">Đăng ký</h4>
            </div>
            <form action="{{route('signup')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token() }}">
                <div class="modal-body">
                  @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif
                    <div class="form-group">
                        <label for="name">Họ và tên:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Số điện thoại:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="phonenumber" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:<span style="color:red">*</span></label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="Địa chỉ">Địa chỉ:</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:<span style="color:red">*</span></label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="repassword">Nhập lại mật khẩu:<span style="color:red">*</span></label>
                        <input type="password" class="form-control" name="repassword" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger" value="Submit">
                </div>
            </form>
        </div>
    </div>
