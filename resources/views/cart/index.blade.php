<x-home-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Shopping Cart') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Your Cart</h3>
          
          @if($carts->isNotEmpty())
              <table class="min-w-full table-auto">
                  <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                      <tr>
                          <th class="px-4 py-2 text-left">Name</th>
                          <th class="px-4 py-2 text-left">Price</th>
                          <th class="px-4 py-2 text-left">Quantity</th>
                          <th class="px-4 py-2 text-left">Total</th>
                          <th class="px-4 py-2 text-left">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($carts as $cart)
                          <tr>
                              <td class="px-4 py-2">{{ $cart->product->name }}</td>
                              <td class="px-4 py-2">{{ number_format($cart->product->price, 0, ',', '.') }}</td>
                              <td class="px-4 py-2">{{ $cart->quantity }}</td>
                              <td class="px-4 py-2">{{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
                              <td class="px-4 py-2">
                                  <form action="{{ route('cart.remove', $cart->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="text-red-600">Remove</button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          @else
              <p>Your cart is empty.</p>
          @endif
      </div>
  </div>
</x-home-layout>
