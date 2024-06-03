<? /**
 * @var App\Models\TruongDH $truongDhList
 * @var App\Models\TruongDH $truongDh
 */ ?>
@extends('admin.use.layouts.main')
@section('content')
    <h1>Danh sách các trường đại học</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Tên</th>
            <th>Link</th>
        </tr>
        </thead>
        <tbody>
        @foreach($truongDhList as $truongDh)
            <tr>
                <td>{{$truongDh->truongdh_ten}}</td>
                <td>
                    <a href="{{ route('admin.truongdh.show',['id'=>$truongDh->id]) }}">Link</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
