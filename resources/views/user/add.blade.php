@extends("layouts.master") @section('title') Bikeshop | แก้ไขข้อมูลผู้ใช้งาน @stop
@section('content')
    <div class="container">
        <h1>เพิ่มผู้ใช้งาน</h1>
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('product') }}">หน้าแรก</a></li>
            <li class="active">เพิ่มผู้ใช้งาน</li>
        </ul>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        {!! Form::open(array('action' => 'App\Http\Controllers\UserController@insert', 'method' => 'post', 'enctype' => 'multipart/form-data')) !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <strong>ข้อมูลผู้ใช้งาน</strong>
                </div>
            </div>
            <div class="panel-body">
                <table>
                    <tr>
                        <td>{{ Form::label('name', 'name') }}</td>
                        <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('password', 'password') }}</td>
                        <td>{{ Form::text('password', Request::old('password'), ['class' => 'form-control']) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('email', 'email') }}</td>
                        <td>{{ Form::text('email', Request::old('email'), ['class' => 'form-control']) }}</td>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">
                <a href="{{ URL::to('user') }}" class="btn btn-danger" > ยกเลิก </a>
                {{-- <a href="#" class="btn btn-success btn-block"><i class="fa fa-shopping-cart"></i>หยิบใส่ตะกร้า</a> --}}
                <button type="rsubmit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div> 
    @endsection
