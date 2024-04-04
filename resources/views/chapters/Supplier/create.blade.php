@extends('layouts.template')
@section('content')
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        @include('components.aside')


        <div class="flex flex-col flex-1 w-full">

            <!-- header -->
            @include('components.header')

            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">

                    <h2 class="my-6 text-2xl  text-gray-700 dark:text-gray-200">
                        Create Supplier
                    </h2>

                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">

                            {{-- <form action="{{ route('supplier.store') }}" method="post">
                                @csrf

                                <div
                                    class="pl-16  py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 lg:grid lg:grid-cols-2 lg:gap-4">



                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Name
                                            </span>

                                            <input type="text" required name="name"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />

                                        </label>
                                    </div>

                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Email
                                            </span>

                                            <input type="email" required name="email"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />

                                        </label>

                                    </div>

                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Phone
                                            </span>

                                            <input type="text" required name="phone"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />

                                        </label>

                                    </div>

                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Address
                                            </span>

                                            <input type="text" required name="address"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />

                                        </label>

                                    </div>


                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Status
                                            </span>

                                            <select name="status"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select"
                                                style="width: 80%">
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>

                                        </label>

                                    </div>

                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Contry
                                            </span>

                                            <input type="text" required name="contry"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />

                                        </label>

                                    </div>


                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                City
                                            </span>

                                            <input type="text" required name="city"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />

                                        </label>

                                    </div>



                                    <div class="flex mt-6 text-sm col-span-2">

                                        <button type="submit"
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Confirm
                                        </button>

                                    </div>
                                </div>

                            </form> --}}
                            <form action="{{ route('supplier.store') }}" method="post">
                                @csrf
                            
                                <div class="pl-16 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 lg:grid lg:grid-cols-2 lg:gap-4">
                            
                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Name
                                            </span>
                            
                                            <input type="text" required name="name"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />
                            
                                            @error('name')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </label>
                                    </div>
                            
                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Email
                                            </span>
                            
                                            <input type="email" required name="email"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />
                            
                                            @error('email')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </label>
                            
                                    </div>
                            
                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Phone
                                            </span>
                            
                                            <input type="text" required name="phone"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />
                            
                                            @error('phone')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </label>
                            
                                    </div>
                            
                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Address
                                            </span>
                            
                                            <input type="text" required name="address"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />
                            
                                            @error('address')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </label>
                            
                                    </div>
                            
                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Status
                                            </span>
                            
                                            <select name="status"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select"
                                                style="width: 80%">
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                            
                                            @error('status')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </label>
                            
                                    </div>
                            
                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Country
                                            </span>
                            
                                            <input type="text" required name="country"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />
                            
                                            @error('country')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </label>
                            
                                    </div>
                            
                            
                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                City
                                            </span>
                            
                                            <input type="text" required name="city"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />
                            
                                            @error('city')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </label>
                            
                                    </div>
                            
                                    <div class="flex mt-6 text-sm col-span-2">
                                        <button type="submit"
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Confirm
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                            
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
