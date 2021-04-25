@extends('layouts/main')

@section('content')
 <!-- Success message -->
 @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
  @endif
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="panel-title"><i class="fa fa-pencil"></i> Détail du produit</h3>
        </div>
        <div class="col-sm-6">
          <button class="btn btn-outline-secondary" onclick="history.back();">Retour</button>
        </div>
      </div>
    </div>
    <div class="panel-body">
<form class='form' method="post" action=" {!! !empty($product) ? route('products.update', $product->id) : route('products.store') !!}"  enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">
  @if( !empty($product->id))
  <input name="_method" type="hidden" value="PUT">
  @endif
  <div class="form-group">
    <label class="col-sm-2 control-label" for="input-name">Name</label>
    <div class="col-sm-10">
        <input  id="name" name="name" value="{{ $product->name ?? '' }}" placeholder="Nom du produit "  class="form-control @error('name') is-invalid @enderror" />
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="input-name">Marque</label>
      <div class="col-sm-10">
         <select name="mark" id="mark"  value="{{ $product->mark ?? '' }}" class="form-control @error('mark') is-invalid @enderror">
         @foreach ($marks as $mark)
        <option value="{{ $mark->id }}">{{ $mark->name }}</option>
         @endforeach
         </select>
        @error('mark')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror        
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="input-name">Prix</label>
    <div class="col-sm-10">
        <input  id="price" name="price" value="{{ $product->price ?? '' }}" placeholder="0.0 "  class="form-control @error('price') is-invalid @enderror" />
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="input-name">Description</label>
      <div class="col-sm-10">
        <textarea  name= "description" id="description"  rows='7' placeholder="description" class="form-control @error('description') is-invalid @enderror" />
        {{ $product->description ?? '' }} 
        </textarea>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
  </div>
  <div class="form-group">
      <label class="col-sm-2 control-label" for="input-name">Images du produit</label>
      <div class="col-sm-10">
        <input name="images[]" id="images" type="file" placeholder="images"  class="form-control @error('images') is-invalid @enderror" multiple/>
        @error('images')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror 
        @if( !empty($product->images))
        @foreach($product->images as $image)
        <img src="/images/{{$image->file_name}}" class="img-fluid" alt="..." style="max-width: 100%;height: 10rem;margin-top:20px;"> 
        @endforeach      
        @endif
    </div>
  </div>
  
  <div class='row submit' style="margin-top:20px">
    <div class='col-md '>
    <input class= "btn btn-primary" type="submit" value="Enregistrer"/> 
  </div>
  </div>
</form>
</div>

@endsection