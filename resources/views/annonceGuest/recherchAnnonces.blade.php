@extends('layouts.annonce')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header  bg-success btn-lg btn-block font-weight-bold justify-content-center" style="color: white"><i class="fas fa-search"></i> Recherche</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nom Salle :</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('nameSalle') is-invalid @enderror" name="nameSalle" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="localite_id" class="col-md-4 col-form-label text-md-right">Localité: </label>
                                <div class="col-md-6">
                                    <select class="form-control  @error('localite_id') is-invalid @enderror" name="localite_id" id="localite_id" >
                                        <option value="">...</option>
                                        @foreach($localites as $localite)
                                            <option value="{{ $localite->id }}">{{$localite->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prixMin" class="col-md-4 col-form-label text-md-right">Prix minimun :</label>

                                <div class="col-md-6">
                                    <input id="prixMin" type="number" class="form-control @error('prixMin') is-invalid @enderror" name="prixMin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prixMax" class="col-md-4 col-form-label text-md-right">Prix maximum :</label>

                                <div class="col-md-6">
                                    <input id="prixMax" type="number" class="form-control @error('prixMax') is-invalid @enderror" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dateLocation" class="col-md-4 col-form-label text-md-right">Date :</label>

                                <div class="col-md-6">
                                    <input id="dateLocation" type="date" class="form-control @error('dateLocation') is-invalid @enderror" name="dateLocation" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="motCles" class="col-md-4 col-form-label text-md-right">Mots clés :</label>

                                <div class="col-md-6">
                                    <input id="motCles" type="text" class="form-control @error('motCles') is-invalid @enderror" name="motCles" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-success" value="chercher ">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection