@extends('layout')


@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des tags</h3>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif

                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tag</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag)
                                <tr>
                                    @if($tag->image)
                                    <td>
                                        <img src="/storage/uploads/{{$tag->image}}" alt="" width="100">
                                    </td>
                                    @endif
                                    <td>{{$tag->nom_tag}}</td>
                                    <td>
                                        <a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('tags.destroy', $tag->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <a class="btn btn-primary btn-sm" href="{{ route('tags.create')}}">Ajouter un nouveau tag</a>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection