@extends('layouts.annonce')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-outline-dark btn-lg btn-block font-weight-bold justify-content-center" style="font-size: 150%"> <i class="far fa-plus-square"></i>  Insérer  une annonce</div>
                    <div class="card-body">
                        <form action="{{route('annonceStore')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Titre :</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="..." value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            <div class="form-group row">
                                <label for="salle_id" class="col-md-3 col-form-label text-md-right">Salle :</label>
                                <div class="col-md-8">
                                    <select class="form-control  @error('salle_id') is-invalid @enderror" name="salle_id" id="salle_id" >
                                        <option  value='' >...</option>
                                        @foreach($salles as $salle)
                                            <option value="{{ $salle->id }}">{{$salle->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('salle_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="prix" class="col-md-3 col-form-label text-md-right">Prix</label>

                                <div class="col-md-8">
                                <input type="number" class="form-control  @error('prix') is-invalid @enderror" name="prix" id="prix" placeholder="..." value="{{ old('prix') }}">
                                @error('prix')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div></div>

                            <div class="form-group row">
                                <label for="dateLocation" class="col-md-3 col-form-label text-md-right">Date de location :</label>

                                <div class="col-md-8">
                                    <input type="text" class="date form-control @error('dateLocation') is-invalid @enderror" name="dateLocation" id="dateLocation" placeholder="..." value="{{ old('dateLocation') }}">
                                    @error('dateLocation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <!-- Scripts des dates-->
                            <script type="text/javascript">
                                ;(function($){
                                    $.fn.datepicker.dates['fr'] = {
                                        days: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
                                        daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
                                        daysMin: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
                                        months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
                                        monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
                                        today: "Aujourd'hui",
                                        monthsTitle: "Mois",
                                        clear: "Effacer",
                                        weekStart: 1,
                                        format: "yyyy/mm/dd"
                                    };
                                }(jQuery));
                                $('.date').datepicker({
                                    format: 'yyyy-mm-dd',
                                    startDate: '-d',
                                    autoclose: true,
                                    language: 'fr',

                                });
                            </script>
                            <!-- Scripts -->

                            <div class="form-group row">
                                    <label for="timeDebut" class="col-md-3 col-form-label text-md-right">Heure début :</label>

                                    <div class="col-md-8">

                                        <input class="timepicker form-control @error('timeDebut') is-invalid @enderror" name="timeDebut" id="timeDebut" placeholder="..." value="{{ old('timeDebut') }}" type="text">
                                        @error('timeDebut')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>
                                    <div class="form-group row">
                                        <label for="timeFin" class="col-md-3 col-form-label text-md-right">Heure de fin :</label>
                                        <div class="col-md-8">
                                            <input class="timepicker form-control @error('timeFin') is-invalid @enderror" name="timeFin" id="timeFin" placeholder="..." value="{{ old('timeFin') }}" type="text">
                                            @error('timeFin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                            <!-- Scripts du Timer -->
                            <script type="text/javascript">

                                $('.timepicker').datetimepicker({

                                    format: 'HH:mm'

                                });

                            </script>
                            <!-- Scripts -->

                                        <div class="form-group row">
                                            <label for="description" class="col-md-3 col-form-label text-md-right">Description :</label>

                                            <div class="col-md-8">
                                                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" placeholder="...">{{ old('description') }}</textarea>
                                                @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                            <div class="form-group row">
                                    <label for="sub" class="col-md-3 col-form-label text-md-right"></label>
                                <div class="col-md-8">
                                <button type="submit" id="sub" class="btn btn-outline-dark font-weight-bold">Ajouter </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
