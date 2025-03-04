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
      
                {{-- <form action="{{ route('updatepasswordByadmin', ['userId' => $user->userId]) }}" method="POST">
                    @csrf --}}
                   

                    <div class="form-group">
                        <label for="password">รหัสผ่านใหม่</label>
                        <input type="password" name="password" class="form-control" required minlength="6">
                    </div>

                    <div>
                        <button type="submit" class="my-3 btn btn-primary"
                            onclick="return confirm('คุณต้องการเปลี่ยนรหัสผ่านหรือไม่?')">
                            อัปเดตรหัสผ่าน
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
