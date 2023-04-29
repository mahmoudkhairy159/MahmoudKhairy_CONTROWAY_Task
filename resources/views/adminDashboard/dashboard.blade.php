@extends('layouts.adminApp')


@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">{{__('Users')}}</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @include('includes.flashmessage')


        <section class="section">
            <div class="row">

                <div class="col-lg-12">


                    <div class="card">
                        <div class="card-body">
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">{{__('ID')}}</th>
                                    <th scope="col" class="text-center">{{__('Name')}}</th>
                                    <th scope="col" class="text-center">{{__('E-Mail')}}</th>
                                    <th scope="col" class="text-center">{{__('Actions')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr >
                                    <th scope="row" class="text-center align-middle">{{$user->id}}</th>
                                    <td class="text-center align-middle">{{$user->name}}</td>
                                    <td class="text-center align-middle">{{$user->email}}</td>
                                    <td class="text-center align-middle col-2">
                                        @if(!$user->status)
                                        <form action="{{route('users.verify',[$user->id])}}" method="post" class="d-inline">
                                            @csrf
                                            <button  type="submit" class="btn btn-success " title="verify"> <i class="fa-solid fa-check fa-beat"></i> </button>
                                        </form>
                                        @else
                                        <span type="submit" class="btn btn-success " >  verified </span>

                                        @endif


                                        <form action="{{route('users.destroy',[$user->id])}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button  type="submit" class="btn btn-danger " > <i class="fa-solid fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->
                        </div>
                    </div>

                </div>

                <ul class="pagination justify-content-center">{{$users->links()}}</ul>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
