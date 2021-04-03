@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{  asset('admins/users/add/add.css/') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/users/add/add.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'User', 'key'=>'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('users.update', ['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên "
                                       name="name"
                                       value="{{ $user->name }}"
                                >
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập email"
                                       name="email"
                                       value="{{ $user->email }}"
                                >
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control"
                                       placeholder="Nhập password"
                                       name="password"
                                       value="{{ $user->password }}"
                                >
                            </div>

                            <div class="form-group">
                                <label>Chọn vai trò</label>
                                <select name="role_id[]" class="form-control select2-init" multiple>
                                    <option value="">Admin</option>

                                    @foreach($roles as $role)
                                        <option
                                            {{ $rolesOfUser->contains('id', $role->id) ? 'selected' : ''     }}{{--contains truyền Dl vào có hay không trả dl true and false--}}

                                            value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>

                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection




