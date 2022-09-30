@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="col-6">
                     <h1>Создание нового товара</h1>
                     @if(session()->has('success'))
                          <div class="alert alert-success">Товар успешно создан!</div>
                     @endif
                    <form method="POST" action="{{ route('admin.product.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Наименование товара:</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Наименование товара: Компьютер">
                            @error('name')

                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"></label>
                            <input type="email" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
