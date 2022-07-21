@extends('layouts.master') @section('title') BikeShop | แก้ไขข้อมูลผู้ใช้งาน @stop
@section('content')
    <div class="container">
        <h1>Edit User</h1>
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('product') }}">Home</a></li>
            <li class="active">Edit User</li>
        </ul>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        {!! Form::model($users, ['action' => 'App\Http\Controllers\UserController@update', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <input type="hidden" name="id" value="{{ $users->id }}">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <strong>ข้อมูลผู้ใช้</strong>
                </div>
            </div>
            <div class="panel-body">
                <table>
                    <tr>
                        <td>{{ Form::label('id', 'user id') }}</td>
                        <td>{{ Form::text('id', $users->id, ['class' => 'form-control', 'disabled' => 'disabled']) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('name', 'name') }}</td>
                        <td>{{ Form::text('name', $users->name, ['class' => 'form-control']) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('email', 'email') }}</td>
                        <td>{{ Form::text('email', $users->email, ['class' => 'form-control']) }}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('created_at', 'created_at') }}</td>
                        <td>{{ Form::text('created_at', $users->created_at, ['class' => 'form-control', 'disabled' => 'disabled']) }}
                        </td>
                    </tr>

                </table>
            </div>
            <div class="panel-footer">
                <button type="reset" class="btn btn-danger">Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save</button>
            </div>
        </div>
        {!! Form::close() !!}

        {{-- {!! Form::model($product, array('method' => 'post', 'entype' => 'multipart/form-data')) !!}
    <input type="hidden" name="id" value="{{ $product->id }}"> --}}
    </div>

@endsection
