@extends('layouts.template')
@section('content')
    <div class="flex h-screen bg-gray-50 dark:bg-gray-800" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <div class="flex flex-col flex-1 w-full">
            <!-- header -->
            @include('components.header-show-product')

            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">

                    <section class="text-gray-600 body-font overflow-hidden ">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="lg:w-4/5 mx-auto flex flex-wrap">

                                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded "
                                    src="{{ asset('storage/' . $product->image) }}">

                                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                    <h2 class="text-sm title-font text-gray-500 tracking-widest dark:text-gray-200">
                                        {{ $product->reference }}
                                    </h2>
                                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1 dark:text-gray-200">
                                        {{ $product->name }}
                                    </h1>

                                    <div class="flex mb-4">

                                    </div>

                                    {{-- <p class="leading-relaxed mb-4 dark:text-gray-400">Fam locavore kickstarter distillery.
                                        Mixtape
                                        chillwave tumeric
                                        sriracha taximy chia microdosing tilde DIY. XOXO fam inxigo juiceramps cornhole
                                        raw denim
                                        forage
                                        brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin
                                        listicle
                                        pour-over, neutra jean.</p> --}}

                                    <div class="flex border-t border-gray-200 py-2">
                                        <span class="text-gray-500">Category</span>
                                        <span
                                            class="ml-auto text-gray-900 dark:text-gray-400">{{ $product->category->name }}</span>
                                    </div>
                                    <div class="flex border-t border-gray-200 py-2">
                                        <span class="text-gray-500">SubCategory</span>
                                        <span
                                            class="ml-auto text-gray-900 dark:text-gray-400">{{ $product->subcategory->name }}</span>
                                    </div>
                                    <div class="flex border-t border-gray-200 py-2">
                                        <span class="text-gray-500">Status</span>
                                        <span
                                            class="ml-auto text-gray-900 dark:text-gray-400">{{ mb_convert_case($product->status, MB_CASE_TITLE, 'UTF-8') }}</span>
                                    </div>
                                    <div class="flex border-t py-2 border-gray-200 ">
                                        <span class="text-gray-500">Quantity</span>
                                        <span class="ml-auto text-gray-900 dark:text-gray-400">4</span>
                                    </div>
                                    <div class="flex border-t border-gray-200 py-2">
                                        <span class="text-gray-500">Unit</span>
                                        <span
                                            class="ml-auto text-gray-900 dark:text-gray-400">{{ $product->unit->name }}</span>
                                    </div>
                                    <div class="flex border-t border-gray-200 py-2">
                                        <span class="text-gray-500">Tax</span>
                                        <span
                                            class="ml-auto text-gray-900 dark:text-gray-400">{{ $product->tax->rate }}%</span>
                                    </div>
                                    {{-- <div class="flex border-t border-gray-200 py-2">
                                        <span class="text-gray-500">Supplier</span>
                                        <span
                                            class="ml-auto text-gray-900 dark:text-gray-400">{{ $product->supplier->name }}</span>
                                    </div> --}}
                                    <div class="flex border-t border-b mb-6 border-gray-200 py-2">
                                        <span class="text-gray-500">Supplier</span>
                                        <span
                                            class="ml-auto text-gray-900 dark:text-gray-400">{{ $product->supplier->name }}</span>
                                    </div>
                                    <div class="flex mt-6  ">
                                        <span class="text-gray-800  dark:text-white text-xl title-font tracking-widest">Price</span>
                                        <span
                                            class=" ml-auto title-font font-medium text-2xl text-gray-900 dark:text-gray-200">{{ $product->price }} DH</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </main>
        </div>
    </div>
@endsection
