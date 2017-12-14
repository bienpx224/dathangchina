<div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-danger">Đăng nhập</h4>
        </div>
    <form action="{{route('login')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token() }}">
      <div class="modal-body">
        @if (Session::get('loginfailed'))
          <div class="alert alert-danger">
            Sai thông tin đăng nhập
          </div>
        @endif
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="tel" class="form-control" name="phonenumber" placeholder="Số điện thoại" required>
          </div>
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Submit">
        </div>
    </form>
    </div>
</div>
