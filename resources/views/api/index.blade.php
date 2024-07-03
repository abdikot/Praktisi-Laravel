@extends('layout')

@section('content')
<br /><br />
<div class="row">
    <div class="col-sm-12">
        <h1>Get Data</h1>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-12">
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($datas as $data)
                <tr>
                    <td>
                        <a href="{!!route('comment', $data['id'])!!}">Lihat Komentar</a>
                    </td>
                    <td>{{ $i }}</td>
                    <td>{{ $data['title']}}</td>
                    <td>{{ $data ['body']}}</td>
                </tr>
                @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection