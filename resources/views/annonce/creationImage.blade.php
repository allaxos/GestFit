@extends('layouts.annonce')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-success btn-lg btn-block font-weight-bold justify-content-center" style="color: white;font-size: 200%"> <i class="far fa-plus-square"></i>  Ajouter une image</div>
                    <div class="card-body">
                        <form action="{{route('imageStore')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="annonce_id" value="{{$id}}">
                            <div class="form-group">
                                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" placeholder="Description...">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="validatedCustomFile" >

                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <hr>
                             <button type="submit" class="btn btn-success font-weight-bold">Enregister</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- greation des image -->
        <div class="row ">
            @foreach($images as $image)
                <div class="col-sm-6" >
                    <div class="card" style="padding: 2%;margin: 2% 0%; box-shadow: 5px 5px 10px">
                        <div class="card-body">
                            <img class="img-fluid" src="../storage/{{$image->image}}" alt="{{$image->description}}" >
                        </div>

                        <form action="{{route('imageDestroy', $image->id ) }}" method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Toutes les annonces liée a la salle vont être supprimé, êtes-vous sur ?')"> <i class="far fa-trash-alt"></i> Supprimer</button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
    </div>



@endsection