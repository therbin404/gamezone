@extends('layouts.app')

@section('content')
<div class="orderRecapContainer">
  @if(Auth::user()->id === $cart->user_id)
    <div class="address">
      <p>Addresse de Livraison</p><br>
      @if ($cart->user->getAddresses->isEmpty())
        Vous n'avez pas encore ajouté d'addresse.<br>
        <a href="{{ route('Address.index') }}" title="Ajouter une addresse">Cliquez-ici pour configurer une nouvelle addresse.</a>
      @endif
      @foreach ($cart->user->getAddresses as $address)
        {{ $address->user->first_name }}
        {{ $address->user->last_name }}<br>
        {{ $address->address->address }}<br>
        {{ $address->address->zip_code }}<br>
        {{ $address->address->city }}<br>
        {{ $address->address->country }}<br>
      @endforeach
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Produit</th>
          <th>Quantité</th>
          <th>Prix Unitaire</th>
          <th>Sous total</th>
        </tr>
      </thead>
      <tbody>
              @foreach ($cart->cart_items as $item)
              <tr>
                  <td>
                  {{ $item->product->name }}
                  </td>
                  <td>
                  {{ $item->quantity }}
                  </td>
                  <td>
                  {{ $item->product->price }}€
                  </td>
                  <td>
                      {{ $item->product->price * $item->quantity }}€
                  </td>
              </tr>
              @endforeach
      </tbody>
    </table>
    @if (!$cart->user->getAddresses->isEmpty())
      <form action="{{ route('Cart.update', ['Cart'=>$cart->id]) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="buttonModify">
          <button class="editbutton" name="submit" type="submit" id="contact-submit">Valider ma commande</button>
        </div>
      </form>
    @endif
  @else
      <p>Vous n'avez pas la permission de consulter cette commande</p>
  @endif
</div>
@endsection