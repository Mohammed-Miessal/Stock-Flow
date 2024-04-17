@extends('layouts.template')
@section('content')
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        @include('components.aside')


        <div class="flex flex-col flex-1 w-full">


            @include('components.header')

            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">

                    <h2 class="my-6 text-2xl  text-gray-700 dark:text-gray-200">
                        Update Order
                    </h2>

                    <div class="w-full overflow-hidden rounded-lg shadow-xs  ">
                        <div class="w-full overflow-x-auto h-[650px]">

                            <form action="{{ route('order.update', $order->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div
                                    class="pl-16  py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 lg:grid lg:grid-cols-2 lg:gap-4">

                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Customer Name
                                            </span>

                                            <select name="customer_id" required id="customer-name" autocomplete="off"
                                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                style="width: 80%">

                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}"
                                                        {{ $order->customer_id === $customer->id ? 'selected' : '' }}>
                                                        {{ $customer->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </label>
                                    </div>

                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Date
                                            </span>

                                            <input type="date" required name="date" value="{{ $order->date }}"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />

                                        </label>
                                    </div>


                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Total
                                            </span>

                                            <input type="number" name="total" required readonly
                                                class="total-cell  block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />

                                        </label>
                                    </div>

                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Status
                                            </span>

                                            <select name="status" required
                                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                style="width: 80%">

                                                <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>
                                                    Paid</option>
                                                <option value="unpaid" {{ $order->status === 'unpaid' ? 'selected' : '' }}>
                                                    Unpaid</option>
                                                <option value="partial"
                                                    {{ $order->status === 'partial' ? 'selected' : '' }}>Partial</option>
                                                <option value="declined"
                                                    {{ $order->status === 'declined' ? 'selected' : '' }}>Declined</option>

                                            </select>
                                            @error('status')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </label>
                                    </div>


                                    {{-- Products --}}
                                    <input type="hidden" id="product-input" name="products"
                                        value="{{ json_encode($products) }}" />
                                    {{-- / Products --}}

                                    <div class="flex mt-6 text-sm col-span-2  mr-5">
                                        <button type="submit"
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Confirm
                                        </button>
                                    </div>


                            </form>

                            <div class="grid grid-cols-1">
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">
                                        Product Name
                                    </span>

                                    <select name="product_id" id="select-product" autocomplete="off"
                                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        style="width: 80%">
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach

                                    </select>

                                </label>
                            </div>


                            <div class="grid grid-cols-1">
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">
                                        Quantity
                                    </span>

                                    <input type="number" name="quantity"
                                        class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        style="width: 80%" />

                                </label>

                            </div>

                            <div class="flex mt-6 text-sm col-span-2 ">

                                <button type="button"
                                    class="add-product-btn px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Add Product
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

                <section class="py-20 bg-white dark:bg-gray-800">
                    <div class="max-w-5xl mx-auto py-16 bg-white dark:bg-gray-800">
                        <article class="overflow-hidden">
                            <div class="bg-[white] rounded-b-md">
                                <div class="p-9">
                                    <div class="space-y-6 text-slate-700">
                                        <a class="text-lg  " href="#" id='title'>
                                            StockFlow <img src="{{ asset('assets/img/logo_fil_rouge.svg') }}"
                                                alt="Logo" class="h-8 w-8">
                                        </a>
                                    </div>
                                </div>


                                <div class="p-9">
                                    <div class="flex flex-col mx-0 mt-8">
                                        <table class="min-w-full divide-y divide-slate-500">

                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0 dark:text-white">
                                                        Product
                                                    </th>
                                                    <th scope="col"
                                                        class=" py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell dark:text-white">
                                                        Quantity
                                                    </th>
                                                    <th scope="col"
                                                        class=" py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell dark:text-white">
                                                        Price Unit
                                                    </th>
                                                    <th scope="col"
                                                        class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0 dark:text-white">
                                                    </th>
                                                    <th scope="col"
                                                        class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0 dark:text-white">
                                                        Total
                                                    </th>

                                                    <th scope="col"
                                                        class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0 dark:text-white">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody class="product-table">
                                                <!-- Les lignes de produit seront ajoutées ici -->
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
                                                        00.00 DH
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
                                                        00.00 DH
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
        const productPrices = {!! json_encode($productPrices) !!};
        const productNames = {!! json_encode($productNames) !!};
    </script>
    <script src="{{ asset('js/invoice.js') }}"></script>
@endsection
