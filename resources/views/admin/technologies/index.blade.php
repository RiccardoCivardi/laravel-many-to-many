@extends('layouts.admin')

@section('title')
    | Admin - Technology
@endsection

@section('content')
<div class="container-fluid h-100 overflow-auto">

    <h1 class="my-5">Gestione Tecnologie</h1>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif

    <div class="w-50"">
        <form  action="{{route('admin.technologies.store')}}" method="POST">
            @csrf

            <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Nuova tecnologia">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                    <i class="fa-solid fa-circle-plus"></i>
                    Aggiungi
                </button>
            </div>

        </form>
    </div>

    <table class="table w-50">

        <thead>

            <tr>
                <th scope="col">Tecnologia</th>
                <th scope="col">Numero di progetti</th>
            </tr>

        </thead>

        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td class="d-flex align-items-center">
                        <form action="{{route('admin.technologies.update', $technology)}}" method="POST" class="d-flex">
                            @csrf
                            @method('PATCH')
                            <input class="border-0" type="text" name="name" value="{{$technology->name}}">
                            <button type="submit" class="btn btn-warning me-3">AGGIORNA</button>
                        </form>

                        @include('admin.partials.form-delete',[
                            'route' => 'technologies',
                            'message' => "Confermi l'eliminazione della tecnologia: $technology->name ?",
                            'entity' => $technology
                        ])

                    </td>
                    <td class="text-center">
                        <span class="badge text-bg-dark fs-6">{{count($technology->projects)}}</span>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>

</div>
@endsection
