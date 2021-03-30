@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('css')
    <link href="{{ asset('admins/setting/index/index.css') }}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'settings', 'key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group float-right ">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Add setting
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('settings.create') . '?type=Text' }}">Text</a></li>
                                <li><a href="{{ route('settings.create') . '?type=Textarea' }}">Textarea</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($settings as $setting)
                                <tr>
                                    <th scope="row">{{ $setting->id }}</th>
                                    <th>{{ $setting->config_key }}</th>
                                    <th>{{ $setting->config_value }}</th>
                                    <td>
                                        <a href="{{ route('settings.edit', ['id'=>$setting->id]) . '?type=' . $setting->type }}"
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           data-url="{{ route('settings.delete',  ['id'=>$setting->id]) }}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $settings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


