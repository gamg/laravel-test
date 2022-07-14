<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Facturas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(auth()->user()->is_admin)
                        @if(session()->has('message'))
                            <h2 class="text-indigo-700 bg-indigo-50 p-6">{{ session('message') }}</h2>
                        @endif
                        <a href="{{ route('invoice.generate') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Generar Facturas</a>
                        <h2 class="mt-4">Facturas emitidas</h2>
                        <table class="min-w-full divide-y divide-cool-gray-200">
                            <thead>
                                <tr class="border-b-2">
                                    <th scope="col" class="px-6 py-3 bg-cool-gray-50"># id</th>
                                    <th scope="col" class="px-6 py-3 bg-cool-gray-50">Total</th>
                                    <th scope="col" class="px-6 py-3 bg-cool-gray-50">Impuesto total</th>
                                    <th scope="col" class="px-6 py-3 bg-cool-gray-50">Total con impuesto</th>
                                    <th scope="col" class="px-6 py-3 bg-cool-gray-50">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-cool-gray-200">
                                @forelse($invoices as $invoice)
                                    <tr class="bg-gray-200 border-b">
                                        <th scope="row" class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $invoice->id }}</th>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $invoice->total }} $</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $invoice->total_tax }} $</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">{{ $invoice->total_with_tax }} $</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                            <a href="{{ route('invoice.show', [$invoice]) }}" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i> Ver más</a>
                                        </td>
                                    </tr>
                                @empty
                                    <h3>No se han emitido Facturas!</h3>
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
