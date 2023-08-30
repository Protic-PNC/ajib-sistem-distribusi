<div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-3">
                            {{ $product['name'] }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $this->formatIDR($product['harga']) }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $product['category']['name'] }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $product['stocks'][0]['quantity'] ?? 0 }}
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
