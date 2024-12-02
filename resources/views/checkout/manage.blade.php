<x-app-layout>
  <div class="container mx-auto py-8">
      <h2 class="text-2xl font-bold text-gray-200 mb-6">Manage Checkouts</h2>

      @if(session('success'))
          <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
              {{ session('success') }}
          </div>
      @endif

      <table class="min-w-full table-auto border-collapse border border-gray-700 text-gray-300">
          <thead class="bg-gray-800">
              <tr>
                  <th class="border px-4 py-2 text-left">Order Number</th>
                  <th class="border px-4 py-2 text-left">Customer</th>
                  <th class="border px-4 py-2 text-left">Total Price</th>
                  <th class="border px-4 py-2 text-left">Status</th>
                  <th class="border px-4 py-2 text-left">Actions</th>
              </tr>
          </thead>
          <tbody>
              @foreach($checkouts as $checkout)
                  <tr class="hover:bg-gray-700 transition-colors duration-200">
                      <td class="border px-4 py-2">{{ $checkout->order_number }}</td>
                      <td class="border px-4 py-2">{{ $checkout->user->name }}</td>
                      <td class="border px-4 py-2">IDR {{ number_format($checkout->total_price, 0, ',', '.') }}</td>
                      <td class="border px-4 py-2">
                          <span class="{{ $checkout->status == 'Payment Success' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-gray-900' }} px-2 py-1 rounded">
                              {{ $checkout->status }}
                          </span>
                      </td>
                      <td class="border px-4 py-2">
                          <!-- Form untuk ubah status -->
                          <form action="{{ route('checkouts.updateStatus', $checkout->id) }}" method="POST" class="inline-block">
                              @csrf
                              <select name="status" class="border bg-gray-800 text-gray-300 px-2 py-1 rounded">
                                  <option value="Pending" {{ $checkout->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                  <option value="Payment Success" {{ $checkout->status == 'completed' ? 'selected' : '' }}>Payment Success</option>
                                  <option value="Cancel" {{ $checkout->status == 'canceled' ? 'selected' : '' }}>Cancel</option>
                              
                                </select>
                              <button
                              {{ $checkout->details->isEmpty() ? 'disabled' : '' }}
                              value="{{ $checkout->details->isEmpty() ? 'Belum ada detail' : '' }}"
                              type="submit" class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700">
                                  Update
                              </button>
                          </form>
                      </td>
                  </tr>

                  <!-- Detail produk -->
                  <tr>
                      <td colspan="5" class="border px-4 py-2 bg-gray-900">
                          <h4 class="font-bold text-gray-200">Order Details:</h4>
                          <ul class="list-disc pl-6 text-gray-300">
                              @foreach($checkout->details as $detail)
                                  <li>
                                      {{ $detail->product->name }} - 
                                      Qty: {{ $detail->quantity }} - 
                                      Price: IDR {{ number_format($detail->price, 0, ',', '.') }} - 
                                      Subtotal: IDR {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}
                                  </li>
                              @endforeach
                          </ul>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</x-app-layout>
