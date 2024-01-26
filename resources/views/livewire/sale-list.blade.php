<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
        {{ __('Previous Sales') }}

        @if (count($sales) === 0)
        No current sales fount
        @else

        <table class="table-auto border-collapse border border-slate-400">
            <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Unit Cost</th>
                    <th>Selling Price</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($sales as $sale)
                <tr class="p-2 border border-slate-300">
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->unit_cost }}</td>
                    <td><x-price value="{{ $sale->selling_price }}" /></td>
                </tr>
                @endforeach

            </tbody>
        </table>

        @endif
    </h2>
</div>