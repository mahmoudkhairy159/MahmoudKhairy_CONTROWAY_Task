@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline" action="{{ route('products.import') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="sr-only">Upload File</label>
                    </div>
                    <div class="form-group  mx-sm-3 mb-2">
                        <input type="file" name="productsFile" accept=".xlsx, .xls, .csv " required
                            class="form-control">
                    </div>
                    <button type="submit" class="btn btn-secondary btn-lg btn-block">Upload</button>
                    </form>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Type</th>
                                <messages.Quantity scope="col" class="text-center">Quantity</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row" class="text-center align-middle">{{$product->id}}
                                </th>
                                <td class="text-center align-middle">{{$product->name}}</td>
                                <td class="text-center align-middle">{{$product->type}}</td>
                                <td class="text-center align-middle">{{$product->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<ul class="pagination justify-content-center">{{$products->links()}}</ul>

@endsection


















