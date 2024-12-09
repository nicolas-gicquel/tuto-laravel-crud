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
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produits as $produit)
                                <tr>
                                    @if($produit->image)
                                    <td>
                                        <img src="/storage/uploads/{{$produit->image}}" alt="" width="100">
                                    </td>
                                    @else
                                    <td>
                                        Pas d'images du produit
                                    </td>
                                    @endif
                                    <td>{{$produit->nom}}</td>
                                    <td>{{$produit->description}}</td>
                                    <td>{{$produit->prix}}</td>
                                    <td>{{$produit->quantite}}</td>
                                    <td>{{$produit->categorie->libelle}}</td>
                                    <td>
                                        <p>Tags :</p>
                                        <ul> @foreach ($produit->tags as $tag) <li>{{ $tag->nom_tag}}</li> @endforeach</ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('produits.edit', $produit->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('produits.destroy', $produit->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <a class="btn btn-primary btn-sm" href="{{ route('produits.create', $produit->id)}}">Aphpjouter un nouveau produit</a>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection