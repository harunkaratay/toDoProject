@extends('panel.layout.app')

@section('content')

    <div class="card p-3">
        <div class="card-header">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('errors'))
                <div class="alert alert-denger alert-dismissible fade show" role="alert">
                    {{session('errors')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h3>Tasklar</h3>
            <a href="{{route('panel.createTasksPage')}}" class="btn btn-m btn-success"> Yeni Task Oluştur</a>
        </div>

        <div class="card-body">
            <div class="card">
                <table>
                    <thead>

                    </thead>
                    <tbody>
                    @foreach($tasks as $t)
                        <tr>
                            <td>{{ $t->content }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@endsection
