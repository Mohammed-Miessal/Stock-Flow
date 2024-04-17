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
                        Create User
                    </h2>

                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">

                            <form action="{{ route('user.store') }}" method="post">
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
                                                Password
                                            </span>

                                            <input type="password" name="password"
                                                class="block mt-1 mr-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                style="width: 80%" />

                                        </label>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Roles
                                            </span>

                                            <select name="role_id[]" required id="role_id" multiple 
                                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                style="width: 80%">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach

                                            </select>

                                        </label>
                                    </div>



                                    <div class="grid grid-cols-1">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Permissions
                                            </span>

                                            <select name="permission_id[]" required multiple id="permission_id"
                                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                style="width: 80%">
                                                @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                @endforeach
                                            </select>

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
