@extends('layout')
@section('content')
<div class="container py-5">
  <div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-5">
        <div class="tab-content">
          <div id="nav-tab-card" class="tab-pane fade show active">
            <h3>Editer un produit</h3>
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
             <form method="post" action="{{ route('produits.update', $produit->id) }}">
              @csrf
              @method('PATCH')
              <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $produit->nom }}">
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" value="{{ $produit->description }}">
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><span class="hidden-xs">Prix</span></label>
                    <div class="input-group">
                      <input type="number" name="prix" class="form-control" value="{{ $produit->prix }}">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group mb-4">
                    <label>Quantité</label>
                    <input type="number" name="quantite" class="form-control" value="{{ $produit->quantite }}">
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary  rounded-pill shadow-sm">Mettre à jour</button>
            </form>
            <!-- Fin du formulaire -->
          </div>
      </div>
    </div>
  </div>
</div>
@endsection