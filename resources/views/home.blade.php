@extends('layout')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>HireMe</h1>
        <p>
            Proyecto construido con Laravel 5
        </p>
         @if(Auth::guest())   
            <p>
                <a href="{{ route('sign-up') }}" class="btn btn-primary btn-lg" role="button">
                    Postúlate &raquo;
                </a>
            </p>
        @endif
    </div>
</div>

<div class="container">
    <h1>Últimos candidatos</h1>

    @foreach ($latest_candidates as $category)
    <h2>{{ $category->name }}</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo de trabajo</th>
            <th>Descripción</th>
            <th>Ver</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($category->candidates as $candidate)
        <tr>
            <td>{{ $candidate->user->full_name }}</td>
            <td>{{ $candidate->job_type_title }}</td>
            <td>{{ $candidate->description }}</td>
            <td width="50">
                <a href="{{ route('candidate', [$candidate->slug, $candidate->id]) }}" class="btn btn-info">
                    Ver
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <p>
        <a href="{{ route('category', [$category->slug, $category->id]) }}">
            Ver todos en {{ $category->name }}
        </a>
    </p>
    @endforeach

</div> <!-- /container -->

@stop