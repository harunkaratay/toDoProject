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
            <h3>Kategoriler</h3>
            <a href="{{route('panel.categoryCreatePage')}}" class="btn btn-m btn-success"> Yeni Kategori Oluştur</a>
        </div>

        <div class="card-body">
            <div class="card">
                <h5 class="card-header">Kategori Listesi</h5>
                @if($categories->first())
                <p class="ms-5">Kategori listesi aşağıdaki tabloda bulunmaktadır</p>
                <div class="table-responsive text-nowrap">
                    <table class="table">

                        <thead class="table-light">
                        <tr>
                            <th>Kategori Adı</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>

                        <tbody class="table-border-bottom-0">
                        @foreach($categories as $c)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$c->name}}</strong></td>
                                <td>
                                    @if($c->is_active==1)
                                        Aktif
                                        @else
                                        Pasif
                                    @endif
                                </td>
                                <td>{{$c->created_at}}</td>
                                <td>
                                <a href="{{route('panel.categoryUpdatePage', $c->id)}}" class="btn btn-sm btn-info">
                                    Güncelle
                                </a>
                                <button class="btn btn-sm btn-danger">
                                    Sil
                                </button>
                                </tr>
                        @endforeach
                        </tbody>

                    </table>
                    @else
                        <p class="ms-5">Henüz hiç kategori oluşturulmadı</p>
                    @endif
                </div>
            </div>
        </div>
    </div>



@endsection
