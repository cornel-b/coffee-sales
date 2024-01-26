<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
        <h4 class="text-2xl font-bold dark:text-white pt-2 mb-4">{{ __('Previous Sales') }}</h4>
        @if (count($sales) === 0)
        No current sales found
        @else
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Product</th>
                    <th scope="col" class="px-6 py-3">Quantity</th>
                    <th scope="col" class="px-6 py-3">Unit Cost</th>
                    <th scope="col" class="px-6 py-3">Selling Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $sale->product->name }}</td>
                    <td class="px-6 py-4">{{ $sale->quantity }}</td>
                    <td class="px-6 py-4">{{ $sale->unit_cost }}</td>
                    <td class="px-6 py-4"><x-price value="{{ $sale->selling_price }}" /></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </h2>
</div>