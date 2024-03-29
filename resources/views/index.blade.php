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
                        Dashboard
                    </h2>

                    <!-- Cards -->
                    @include('components.cards')

                    <!-- Table -->
                    @include('components.table_template')

                    <!-- Charts -->
                    @include('components.charts')
                </div>
            </main>
        </div>
    </div>
@endsection
