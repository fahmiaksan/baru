<x-home-layout>
  <div class="container mx-auto py-12">
      <h2 class="text-2xl font-bold text-gray-800">Checkout Successful</h2>
      <p class="text-gray-600 mt-4">Thank you for your order! Your order number is <strong>{{ $checkout->order_number }}</strong>.</p>
      <p class="mt-2">Total Payment: <strong>IDR {{ number_format($checkout->total_price, 0, ',', '.') }}</strong></p>

      <h3 class="text-xl font-semibold mt-6">Order Details</h3>
      <table class="min-w-full table-auto mt-4">
          <thead class="bg-gray-200 text-gray-800">
              <tr>
                  <th class="px-4 py-2 text-left">Product</th>
                  <th class="px-4 py-2 text-left">Price</th>
                  <th class="px-4 py-2 text-left">Quantity</th>
                  <th class="px-4 py-2 text-left">Subtotal</th>
              </tr>
          </thead>
          <tbody>
              @foreach($checkout->details as $detail)
                  <tr>
                      <td class="px-4 py-2">{{ $detail->product->name }}</td>
                      <td class="px-4 py-2">{{ number_format($detail->price, 0, ',', '.') }}</td>
                      <td class="px-4 py-2">{{ $detail->quantity }}</td>
                      <td class="px-4 py-2">{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>

      <a href="{{ url('/') }}" class="mt-6 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back to Home</a>
  </div>
</x-home-layout>
