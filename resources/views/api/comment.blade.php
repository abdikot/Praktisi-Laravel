@extends('layout')

@section('content')
<br /><br />
<div class="row">
    <div class="col-sm-12">
        <h1>Comment</h1>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-12">
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $data['name']}}</td>
                    <td>{{ $data['email']}}</td>
                    <td>{{ $data ['body']}}</td>
                </tr>
                @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection