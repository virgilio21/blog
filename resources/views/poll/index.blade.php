@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('create') }}" class="form mx-3">
            <div class="form-group row">
                <input type="text" class="form-control mr-2 my-1 col-lg-7" name="name" placeholder="Nombre de la Encuesta" />
                <button type="submit" class="btn btn-success form-control mr-2 my-1 col-lg-1"> Crear</button>
            </div>  
        </form>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="">Encuestas</th>
                    <th class="">Fecha</th>
                    <th class="">Panel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($polls as $item)
                <tr class=>
                    <td class="">
                    <a href="{{ route('createView',['id'=>$item->id]) }}">
                            {{$item->name}}
                        </a>
                    </td>
                    <td>{{$item->created_at}}</td>
                    <td class="panel">
                    <a href="{{route('updateVisibility',['id'=>$item->id])}}">
                            @if (!$item->visibility)
                                <i class="fas fa-eye-slash"></i>                       
                            @else
                                <i class="fas fa-eye"></i>
                            @endif
                        </a>
                        <a href="">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection

