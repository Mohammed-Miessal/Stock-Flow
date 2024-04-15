@extends('layouts.template')
@section('content')
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        @include('components.aside')




        <div class="flex flex-col flex-1 w-full dark:bg-gray-800">


            @include('components.header')



            <main class="h-full overflow-y-auto">

                <section class="py-20 bg-white dark:bg-gray-800">
                    <div class="max-w-5xl mx-auto  bg-white dark:bg-gray-800">
                        <div class="flex justify-end mb-6">

                            <button id="printButton"
                                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Generate the Order
                            </button>

                        </div>
                        <article class="overflow-hidden">
                            <div class="bg-[white] rounded-b-md">
                                <div class="p-9">
                                    <div class="space-y-6 text-slate-700">
                                        <a class="text-lg dark:text-white " href="#" id='title'>
                                            StockFlow <img src="{{ asset('assets/img/logo_fil_rouge.svg') }}" alt="Logo"
                                                class="h-8 w-8">
                                        </a>
                                    </div>
                                </div>

                                <div class="px-9">
                                    <div class="flex w-full">
                                        <div class="grid grid-cols-4 gap-12">
                                            <div class="text-sm font-light text-slate-500">
                                                <p class="text-sm font-bold text-slate-700 dark:text-white ">
                                                    Order Status:
                                                </p>
                                                <p>{{ $order->status }}</p>
                                            </div>
                                            <div class="text-sm font-light text-slate-500">
                                                <p class="text-sm font-bold text-slate-700 dark:text-white ">Billed To</p>
                                                <p class="text-gray-400 ">{{ $order->customer->name }}</p>
                                            </div>
                                            <div class="text-sm font-light text-slate-500">
                                                <p class="text-sm font-bold text-slate-700 dark:text-white ">Order Number
                                                </p>
                                                <p>{{ $order->uuid }}</p>

                                            </div>
                                            <div class="text-sm font-light text-slate-500">
                                                <p class="text-sm font-bold text-slate-700 dark:text-white ">Date</p>
                                                <p>{{ date('d, M, Y', strtotime($order->date)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="p-9">
                                    <div class="flex flex-col mx-0 mt-8">

                                        <table class="min-w-full divide-y divide-slate-500">
                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0 dark:text-white">
                                                        Products
                                                    </th>
                                                    <th scope="col"
                                                        class="py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell dark:text-white">
                                                        Quantity
                                                    </th>
                                                    <th scope="col"
                                                        class="py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell dark:text-white">
                                                        Price Unit
                                                    </th>
                                                    <th scope="col"
                                                        class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                                    </th>
                                                    <th scope="col"
                                                        class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0 dark:text-white">
                                                        Total
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="product-table">
                                                @foreach ($order->products as $product)
                                                    <tr class="border-b border-slate-200">
                                                        <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                                            <div class="font-medium dark:text-gray-400">{{ $product->name }}
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                                                            {{ $product->pivot->quantity }}</td>
                                                        <td
                                                            class="px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                                                            {{ $product->price }}</td>
                                                        <td
                                                            class="px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                                                        </td>
                                                        <td
                                                            class="py-4 pl-3 pr-4 text-sm text-right text-gray-400 sm:pr-6 md:pr-0">
                                                            {{ $product->pivot->total_per_product }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="row" colspan="3"
                                                        class=" pt-6 pl-6 pr-3 text-sm font-light text-right dark:text-white text-slate-500 sm:table-cell md:pl-0">
                                                        Subtotal
                                                    </th>
                                                    <th scope="row"
                                                        class=" pt-6 pl-4 pr-3 text-sm font-light text-left text-slate-500 ">

                                                    </th>
                                                    <td
                                                        class="total-cell1 pt-6 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                                        {{ $order->total }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="3"
                                                        class=" pt-6 pl-6 pr-3 text-sm font-light text-right dark:text-white text-slate-500 sm:table-cell md:pl-0">
                                                        Discount
                                                    </th>
                                                    <th scope="row"
                                                        class="pt-6 pl-4 pr-3 text-sm font-light text-left text-slate-500 ">

                                                    </th>
                                                    <td
                                                        class="pt-6 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                                        00.00 DH
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="3"
                                                        class=" pt-4 pl-6 pr-3 text-sm font-light text-right dark:text-white text-slate-500 sm:table-cell md:pl-0">
                                                        Tax
                                                    </th>
                                                    <th scope="row"
                                                        class="pt-4 pl-4 pr-3 text-sm font-light text-left text-slate-500 ">

                                                    </th>
                                                    <td
                                                        class="pt-4 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                                        00.00 %
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="3"
                                                        class=" pt-4 pl-6 pr-3 text-sm  text-right dark:text-white text-slate-700 sm:table-cell md:pl-0 font-bold">
                                                        Total
                                                    </th>
                                                    <th scope="row"
                                                        class="pt-4 pl-4 pr-3 text-sm font-normal text-left text-slate-700 ">

                                                    </th>
                                                    <td
                                                        class="total-cell2 font-extrabold pt-4 pl-3 pr-4 text-sm  text-right dark:text-white text-slate-700 sm:pr-6 md:pr-0">
                                                        {{ $order->total }}

                                                    </td>

                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>


                            </div>
                        </article>
                    </div>
                </section>

        </div>
        </main>
    </div>
    </div>
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            window.print(); // Appeler la fonction d'impression native du navigateur
        });
    </script>
@endsection
