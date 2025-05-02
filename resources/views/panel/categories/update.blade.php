@extends('panel.layout.app')



@section('content')

    <div class="card p-4 ">

        <div class="card-header">
            <h3>Kategori Güncelle</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('panel.updateCategory')}}" method="POST">
                @csrf

                <input type="hidden" value="{{$category->id}}" name="category_id">

                <div class="mb-3">
                    <label for="" class="form-label">Kategori Adı</label>
                    <input type="text" class="form-control" value="{{$category->name}}" name="category_name">
                    <label for="" class="form-label mt-3">Kategori Durumu</label>
                    <select name="category_status"  class="form-control" name="category_status">
                        <option value="1" @if($category->is_active==1) selected @endif>Aktif</option>
                        <option value="0" @if($category->is_active==0) selected @endif>Pasif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-m btn-success">Güncelle</button>
            </form>

        </div>

    </div>

@endsection
