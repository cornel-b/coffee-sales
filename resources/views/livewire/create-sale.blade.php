<div>
    <form wire:submit="save" class="w-full">

        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block tracking-wide text-gray-700 text-s font-bold mb-2" for="quantity">Quantity</label>
                <input class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" id="quantity" wire:model.live="quantity" type="number" min="1" placeholder="">
                @error('quantity')<span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block text-gray-700 text-s font-bold mb-2" for="unit_cost">Unit Cost (£)</label>
                <input class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="sale.unit_cost" type="number" min="0" wire:model.live="unit_cost" step="0.1" placeholder="">
                @error('unit_cost')<span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block text-gray-700 text-s font-bold mb-2" for="selling_price">Selling Price</label>
                <x-price value="{{ $selling_price }}" />
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
            <label class="block text-gray-700 text-s font-bold mb-2" for="unit_cost">&nbsp;</label>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Record Sale</button>
            </div>
        </div>
    </form>
</div>