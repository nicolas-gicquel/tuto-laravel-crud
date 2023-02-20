@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des produits</h3>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif

                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach($produits as $produit)
                                <tr>
                                    <td>{{$produit->id}}</td>
                                    <td>{{$produit->nom}}</td>
                                    <td>{{$produit->description}}</td>
                                    <td>{{$produit->categorie->libele}}</td>
                                    <td>{{$produit->prix}}</td>
                                    <td>{{$produit->quantite}}</td>
                                    @if($produit->image)
                                        <td>
                                            <img src="/storage/uploads/{{$produit->image}}" alt="" width="100">
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ route('produits.edit', $produit->id)}}" class="btn btn-primary btn-sm"">Editer</a>
                                        <form action=" {{ route('produits.destroy', $produit->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- Fin du Tableau -->
                        <a href="{{ route('produits.create')}}" class="btn btn-info btn-lg">Créer un nouveau produit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection