@extends('layout.adminlayout')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header" style="background-color: white">
                <div class="d-flex justify-content-between">
                    <p>เปลี่ยนรหัสผ่าน</p>
                </div>
            </div>

            <div class="card-body">
                {{-- <form action="{{ url('/postsetting/'.$user->userId) }}" method="POST">
                    @csrf --}}
                    {{-- <form action="/updatepasswordByadmin" id="" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                        <form action="{{ route('updatepasswordByadmin', ['userId' => $user->userId]) }}" method="POST">
                            @csrf
                        <div class="form-group">
                        <label for="username">ชื่อผู้ใช้</label>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="phone">เบอร์โทร</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="password">รหัสผ่านใหม่</label>
                        <input type="password" name="password" class="form-control" required minlength="6">
                    </div>

                    <div>
                        <button type="submit" class="my-3 btn btn-primary"
                            onclick="return confirm('คุณต้องการเปลี่ยนรหัสผ่านหรือไม่')">
                            อัปเดตรหัสผ่าน
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
