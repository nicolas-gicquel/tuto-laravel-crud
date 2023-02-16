@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter un produit</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('produits.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="nom" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Prix</span></label>
                                        <div class="input-group">
                                            <input type="number" name="prix" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-2">
                                        <label>Quantité</label>
                                        <input type="number" name="quantite" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="image" class="form-label">Image du hero</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <div class="form-group col-sm-12 mt-2 mb-2">
                                    <select name="categorie_id" class="form-select">
                                        <option value=""> --Catégorie-- </option>
                                        @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->libele }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  rounded-pill shadow-sm"> Ajouter un produit </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection