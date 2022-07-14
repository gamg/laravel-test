<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Info de Factura
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('invoice.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
                        <h2 class="font-semibold mb-4 mt-3">Información de las compras</h2>
                        <h2 class="font-semibold">Cliente: {{ $invoice->purchases()->first()->user->name }}</h2>
                        <table class="min-w-full divide-y divide-cool-gray-200">
                            <thead>
                            <tr class="border-b-2">
                                <th scope="col" class="px-6 py-3 bg-cool-gray-50"># id de compra</th>
                                <th scope="col" class="px-6 py-3 bg-cool-gray-50">Producto</th>
                                <th scope="col" class="px-6 py-3 bg-cool-gray-50">Precio</th>
                                <th scope="col" class="px-6 py-3 bg-cool-gray-50">Impuesto</th>
                                <th scope="col" class="px-6 py-3 bg-cool-gray-50">Monto del impuesto</th>
                                <th scope="col" class="px-6 py-3 bg-cool-gray-50">Precio con impuesto</th>
                                <th scope="col" class="px-6 py-3 bg-cool-gray-50">Fecha de compra</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-cool-gray-200">
                            @foreach($invoice->purchases as $purchase)
                                <tr class="bg-gray-200 border-b">
                                    <th scope="row" class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $purchase->id }}</th>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $purchase->product->name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $purchase->product->price }} $</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $purchase->product->tax }} %</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $purchase->product->tax_amount }} $</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $purchase->product->price_with_tax }} $</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $purchase->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h3 class="font-semibold mt-3">Id Factura: {{ $invoice->id }}</h3>
                        <h3 class="font-semibold">Total: {{ $invoice->total }} $</h3>
                        <h3 class="font-semibold">Impuesto total: {{ $invoice->total_tax }} $</h3>
                        <h3 class="font-semibold">Total con impuesto: {{ $invoice->total_with_tax }} $</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
