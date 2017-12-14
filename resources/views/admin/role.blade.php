@if(Auth::user()->authority == 1)
   - ( Khách hàng )
@endif
@if(Auth::user()->authority == 2)
   - ( Nhân viên )
@endif
@if(Auth::user()->authority == 3)
   - ( Quản lý )
@endif
@if(Auth::user()->authority == 4)
   - ( BOSS )
@endif