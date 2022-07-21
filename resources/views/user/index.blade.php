@extends('layouts.master')
@section('title') Bikeshop | รายการชื่อผู้ใช้ @stop
@section('content')

    <div class="container">
        <h1>รายการชื่อผู้ใช้</h1>
        <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title"><strong>รายการ</strong></div>
        </div>
        <div class="panel-body">
            <form action="{{ URL::to('user/search') }}" method="POST" class="form-inline">
                {{ csrf_field() }}
                <input type="text" name="q" class="form-control" placeholder="...">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
                <a href="{{ URL::to('user/edit') }}" class="btn btn-success pull-right">เพิ่มผู้ใช้งาน</a>
            </form>
        </div>
    </div>
        <table class="table table-bordered bs-table">
            <thead>
                <tr>
                    <th>รหัส</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>อีเมล</th>
                            <th>created_at</th>
                            <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->created_at }}</td>
                        <td class="bs-center">
                            <a href="{{ URL::to('user/edit/'.$u->id) }}" class="btn btn-info"><i class="fa fa-edit"></i>แก้ไข</a>
                            <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $u->id }}"><i class="fa fa-trash"></i>ลบ</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $('.btn-delete').on('click', function() { if(confirm("คุณต้องการลบสินค้านี้หรือไม่?")) {
            var url = "{{ URL::to('user/remove') }}"
            + '/' + $(this).attr('id-delete');
            window.location.href = url;
        }
        });
    </script>
    </div>

@endsection