@extends('layouts.annonce')

@section('content')
    <div class="container">
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
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="validatedCustomFile" >
                                <label class="custom-file-label" for="validatedCustomFile">choisir une image</label>
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
    </div>



@endsection