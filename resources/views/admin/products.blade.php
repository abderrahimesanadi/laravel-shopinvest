@extends('layouts/main')

@section('content')
<h3> Administration des produits</h3>
 <a class="btn btn-outline-primary" href="{{ route('products.create')}}"  role="button">Ajouter un produit</a>
<br/>
<br/>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Nom</th>
      <th scope="col">prix</th>
      <th scope="col">marque</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
@foreach ( $products as $product )
<tr>
  <td class="text-center">
      @if (count($product->images) > 0)
      <img src="/images/{{ $product->images[0]->file_name }}" alt="{{ $product->images[0] }}" class="img-thumbnail" style="height:3rem"/>
      @else
      <span class="img-thumbnail list"><i class="fa fa-camera fa-2x"></i></span>
      @endif    
      </td>
      <td scope="row">{{ $product->name }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->mark->name }}</td>
      <td><a href="{{ route('products.show' , $product->id)}}" class="btn btn-outline-info">Visualiser<a/></td>
      <td><a href="{{ route('products.edit' , $product->id)}}" class="btn btn-outline-secondary">Modifier<a/></td>
      <td>
      <form action="{{ route('products.destroy' , $product->id)}}" method="POST">
      <input name="_method" type="hidden" value="DELETE">
       {{ csrf_field() }}
       <input class= "btn btn-outline-danger" type="submit" value="Supprimer"/> 
      </form>
     </td>
</tr>

@endforeach
</tbody>
</table>
@endsection