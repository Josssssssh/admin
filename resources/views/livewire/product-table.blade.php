<div class="flex p-10 items-center flex-col">
    <h1 class="text-3xl mb-2">PRODUCT OREDERING</h1>

    @if (session()->has('message'))
    <div class="bg-green-500 text-white p-4 rounded mb-4 shadow-md" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <div class="mt-6 w-1/2">
        <input wire:model="productName" type="text" id="productName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product Name" required />
    </div>
    @error('productName')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror      

    <div class="mt-6 w-1/2">
        <input wire:model="quantity" type="number" id="quantity" min="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Quantity" required />
    </div>
    @error('quantity')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror  

    <div class="mt-6 w-1/2">
        <input wire:model="price" type="number" id="price" step="0.01" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Price" required />
    </div>
    @error('price')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <div class="mt-6 w-1/2">
        <label for="condition" class="block mb-1">Condition:</label>
        <select wire:model="condition" id="condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            <option>Select Condition</option>
            <option value="new">New</option>
            <option value="slightly_used">Slightly Used</option>
            <option value="old">Old</option>
        </select>
    </div>
    @error('condition')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <div class="mt-6 w-1/2">
        <textarea wire:model="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Description" rows="4" required></textarea>
    </div>
    @error('description')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <div class="mt-6">
        <button wire:loading.remove type="submit" wire:click="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            ADD 2 CART
        </button>
        <div wire:loading wire:target="submit">
            <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="mt-8 p-20 w-full">
        <h2 class="text-2xl font-semibold mb-4">Ordered Products</h2>
        <div class="w-full">
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 text-left text-gray-900">Product Name</th>
                        <th class="py-2 px-4 text-left text-gray-900">Quantity</th>
                        <th class="py-2 px-4 text-left text-gray-900">Price</th>
                        <th class="py-2 px-4 text-left text-gray-900">Condition</th>
                        <th class="py-2 px-4 text-left text-gray-900">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-t border-gray-200">{{ $product->product_name }}</td>
                        <td class="py-2 px-4 border-t border-gray-200">{{ $product->quantity }}</td>
                        <td class="py-2 px-4 border-t border-gray-200">{{ $product->price }}</td>
                        <td class="py-2 px-4 border-t border-gray-200">{{ $product->condition }}</td>
                        <td class="py-2 px-4 border-t border-gray-200">{{ $product->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-left">
            {{ $products->links() }} <!-- Pagination -->
        </div>
    </div>
</div>
