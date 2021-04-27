<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;<?php echo $quantityAll; ?> article<?php echo $quantityAll>1?"s":"" ?> - <?php echo $totalAll; ?></a>
<ul class="dropdown-menu">
  <li id="cart-li">
		<div id="cart-content">
		@if ($cart) 
			<table>
			<@foreach ($cart as $cart_id=>$cart)
				<tr>
					<td><img src="/images/{{ $cart['image'] }}" class="cart-img"></td>
					<td><span class="cart-product-name">{{ $cart['name'] }}</span></td>
					<td><span>x {{ $cart['quantity'] }}</span></td>
					<td><span>{{ $cart['price'] }}</span></td>
					<td class="text-center"><a href="javascript:;" data-id="{{ $cart_id }}" class="removeCart"><i class="fa fa-times"></i></a></td>
				</tr>
			@endforeach 
				<tr>
					<td class="text-right" colspan="3"><h4>Total :</h4></td>
					<td colspan="2"><h4>{{ $totalAll }}</h4></td>
				</tr>
			</table>
		@else
			<h5 class="text-center">Votre panier est vide!</h5>
		@endif
		</div>  	 
  </li>
</ul>
