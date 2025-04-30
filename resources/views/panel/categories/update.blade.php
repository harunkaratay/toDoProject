@extends('panel.layout.app')



@section('content')

    <div class="card p-4 ">

        <div class="card-header">
            <h3>Kategori Güncelle</h3>
        </div>

        <div class="card-body">

            <form action="">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Kategori Adı</label>
                    <input type="text" class="form-control" value="{{$category->name}}" name="category_name">
                    <label for="" class="form-label mt-3">Kategori Durumu</label>
                    <select name="category_status"  class="form-control" name="category_id">
                        <option value="1" @if($category->is_active==1) selected @endif>Aktif</option>
                        <option value="0" @if($category->is_active==0) selected @endif>Pasif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-m btn-success">Kaydet</button>
            </form>

        </div>

    </div>

@endsection
