@inject('products', 'App\Services\Products')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('invoice.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Ver Facturas</a>
                    @else
                        @if(session()->has('message'))
                            <h2 class="text-indigo-700 bg-indigo-50 p-6">{{ session('message') }}</h2>
                        @endif
                        <form method="POST" action="{{ route('purchase.new') }}">
                            @csrf
                            <div>
                                <x-label for="name" value="Seleccione producto" />
                                @foreach($products->get() as $product)
                                    <input type="radio" name="product_id" value="{{ $product->id }}">
                                    <label for="html">{{ $product->name }} | {{ $product->price_with_tax }}$ (impuesto incluido)</label><br>
                                @endforeach
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    Comprar
                                </x-button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
