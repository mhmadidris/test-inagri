@extends('layouts.app')

@section('title', ' User Preview')

@section('content')

<main class="h-full overflow-y-auto">
    <div class="container mx-auto">
        <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
            <div class="col-span-12">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    Show Detail User
                </h2>
            </div>
        </div>
    </div>

    <!-- breadcrumb -->
    <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
        <ol class="inline-flex p-0 list-none">
            <li class="flex items-center">
                <a href="{{ URL('/dashboard/user') }}" class="text-gray-400">User</a>
                <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                </svg>
            </li>
            <li class="flex items-center">
                @php
                foreach ($showData as $user){
                $name = $user->name;
                }
                @endphp
                <p class="font-medium">{{ $name }}</p>
            </li>
        </ol>
    </nav>

    <section class="container px-6 py-4 mx-auto mt-5">
        @foreach ($showData as $user)
        <div class="bg-white rounded-lg overflow-hidden shadow-lg">

            <main class="col-span-12 p-4 md:pt-0">
                <section class="featured bg-noise-texture-1 font-worksans">
                    <style>
                        @import url("https://fonts.googleapis.com/css2?family=Sarala:wght@400;700&family=Work+Sans:wght@400;500;600;700&display=swap");

                        .font-sarala {
                            font-family: 'Sarala', sans-serif;
                        }

                        .font-worksans {
                            font-family: 'Work Sans', sans-serif;
                        }

                        :root {
                            --soft-purple-1: #6558F5;
                            --soft-purple-2: #9392CC;
                            --soft-purple-3: #9D8FFB;
                            --dark-navy: #0D092E;
                            --deepBlue-1: #1F1569;
                            --deepBlue-2: #081537;
                        }

                        .bg-dark-navy {
                            background-color: var(--dark-navy);
                        }

                        .bg-soft-purple-1 {
                            background-color: var(--soft-purple-1);
                        }

                        .text-soft-purple-2 {
                            color: var(--soft-purple-2);
                        }

                        .text-soft-purple-3 {
                            color: var(--soft-purple-3);
                        }

                        .border-borderColor-1 {
                            border-color: #242359;
                        }

                        .border-borderColor-2 {
                            border-color: #5452A5;
                        }

                        .text-40 {
                            font-size: 40px;
                        }

                        .rounded-10 {
                            border-radius: 10px;
                        }

                        .rounded-t-10 {
                            border-top-left-radius: 10px;
                            border-top-right-radius: 10px;
                        }

                        .bg-noise-texture-1 {
                            background-image: url('https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-Crypto/noise-texture.png');
                        }

                        .bg-noise-texture-2 {
                            background-image: url('https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-Crypto/noise-texture-2.png');
                        }

                        .card-creator {
                            border: 1.5px solid rgba(255, 255, 255, 0.7);
                            background: linear-gradient(180deg, rgba(255, 255, 255, 0.2) 0.55%, rgba(255, 255, 255, 0.06) 99.99%);
                        }

                        .pt-60 {
                            padding-top: 60px;
                        }

                        .w-240 {
                            width: 240px;
                        }

                    </style>
                    <div class="flex flex-col flex-wrap items-start justify-between gap-10 space-y-2 md:flex-row md:gap-0">
                        <!-- card 1 -->
                        <div class="backdrop-filter backdrop-blur-xl rounded-10 bg-white w-full">

                            <!-- card content -->
                            <div class="px-8 rounded-10 card-creator pt-60 pb-10 w-full">
                                <h5 class="font-semibold text-xl">Personal Information</h5>
                                <br>
                                <div class="relative z-10 flex flex-col items-left">
                                    @php
                                    $convertImg = json_decode($user->avatar);
                                    @endphp
                                    @if ($convertImg == null)
                                    <div class="overflow-hidden rounded-full" style="background-color: pink; width: 10em; height: 10em;">
                                        <img src="{{ asset('assets/images/blank-profile-picture.png') }}" alt="profile" style="width: 100%; height: 100%; object-fit: contain;" />
                                    </div>
                                    @elseif ($convertImg != null)
                                    <div class="overflow-hidden rounded-full" style="background-color: pink; width: 10em; height: 10em;">
                                        <img src="{{ asset('/storage/account/' . Auth::user()->id . '/avatar/' . $convertImg) }}" alt="profile" style="width: 100%; height: 100%; object-fit: contain;" />
                                    </div>
                                    @endif


                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 ">
                                    <div class="col-span-3 mt-3">
                                        <label class="block mb-3 font-medium text-gray-700 text-md">Email
                                            Address</label>
                                        <div class="block w-full mt-1 sm:text-sm">
                                            {{ $user->email }}
                                        </div>
                                    </div>

                                    <div class="col-span-3 mt-3">
                                        <label for="name" class="block mb-3 font-medium text-gray-700 text-md">Name</label>
                                        <div class="block w-full mt-1 sm:text-sm">
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                    <div class="col-span-3 mt-3">
                                        <label class="block mb-3 font-medium text-gray-700 text-md">Username</label>
                                        <div class="block w-full mt-1 sm:text-sm">
                                            @if ($user->username != null)
                                            {{ '@' . $user->username }}
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-span-3 mt-3">
                                        <label for="name" class="block mb-3 font-medium text-gray-700 text-md">Contact
                                            Number</label>
                                        <div class="block w-full mt-1 sm:text-sm">
                                            @if ($user->phone_number != null)
                                            {{ $user->phone_number }}
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </section>

            </main>
        </div>
        @endforeach
    </section>
</main>

@endsection
