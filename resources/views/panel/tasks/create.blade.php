@extends('panel.layout.app')



@section('content')


     <div class="card p-4">
         <div class="card-header">
             <h2>Görev Oluştur</h2>
         </div>
         <div class="card-body">
             <div class="card-body">
                 <form action="{{route('panel.addTask')}}" method="POST">
                 @csrf
                 <div>
                     <label for="defaultFormControlInput" class="form-label">Başlık</label>
                     <input type="text" class="form-control" name="title">

                     <label for="defaultFormControlInput" class="form-label">İçerik</label>
                     <input type="text" class="form-control" name="content">

                     <label for="defaultFormControlInput" class="form-label">Durum</label>
                     <select name="status" class="form-control">
                         <option selected value="" disabled >Lütfen Seçim Yapınız</option>
                         <option value="0">Yapıldı</option>
                         <option value="1">Yapılıyor</option>
                         <option value="2">Ertelendi</option>
                         <option value="3">İptal oldu</option>
                         <option value="4">Yapılmadı</option>
                     </select>

                     <label for="defaultFormControlInput" class="form-label">Bitiş Tarihi</label>
                     <input type="datetime-local" class="form-control" name="deadline">

                     <button type="submit" class="btn btn-success mt-3" >KAYDET</button>
                 </div>

                 </form>
             </div>
         </div>
     </div>


@endsection
