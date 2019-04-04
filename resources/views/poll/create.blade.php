@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/createSections.css')}}">
@endsection
@section('content')
    
    <div class="container">
        <h2>Encuesta: <label for="">{{$poll->name}}</label> </h2>

        <form action="{{route('createSection',['pollid'=>$poll->id])}}" class="form">
            <div class="form-group row">
                <input type="text" class="form-control mr-2 my-1 col-lg-7" name="sectionName" placeholder="Nombre de la seccion" />
                <button type="submit" class="btn btn-success form-control mr-2 my-1 col-lg-1"> Crear</button>
            </div>  
        </form>
        
        @foreach ($poll->sections as $item)  
            <div id="accordion">
                    <div class="card row">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <i class="far fa-plus-square" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}"></i>
                        <a href="#" data-toggle="modal" data-target="#exampleModalScrollable{{$item->id}}">
                                {{$item->name}}
                            </a>
                        </h5>
                      </div>
                  
                      <div id="collapse{{$item->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <ol>
                                @foreach ($item->load('questions')->questions as $question)
                                <li>{{$question->description}}</li>
                                @endforeach
                            </ol>
                      </div>
                    </div>
                </div>
            </div>
        <div class="modal fade" id="exampleModalScrollable{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle{{$item->id}}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Pregunta a : {{$item->name}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('createQuestion',['pollid'=>$poll->id])}}" class="form">
                            <div class="form-group">
                                <label for="description">Pregunta: </label>
                                <input class="form-control" type="text" id="description" name="description">
                                <input type="hidden" value="{{$item->id}}" name="sectionid">
                            </div>
                            <button class="form-control btn btn-success" type="submit" class="btn btn-success" >Agregar</button>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
        @endforeach

@endsection