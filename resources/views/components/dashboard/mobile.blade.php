<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 overflow-y-auto bg-white md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu" aria-label="aside">
    <div class="py-4 text-gray-500 dark:text-gray-400">

        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ URL('/') }}">
            <img src="{{ asset('frontend/images/main-logo.png') }}" alt="" style="width: 35%;" class="ml-6">
        </a>

        <div class="flex items-center pt-5 pl-5 mt-10 space-x-2 border-t border-gray-100">
            @php
            $convertImg = json_decode(Auth::user()->avatar);
            @endphp
            <!--Author's profile photo-->
            @if ($convertImg == null)
            <img class="object-cover object-center mr-1 rounded-full w-14 h-14" src="{{ asset('assets/images/blank-profile-picture.png') }}" alt="random user" />
            @else
            <img class="object-cover object-center mr-1 rounded-full w-14 h-14" src="{{ asset('/storage/account/' . Auth::user()->id . '/avatar/' . $convertImg) }}" alt="random user" />
            @endif
            <div>
                <!--Author name-->
                <p class="font-semibold text-gray-900 text-md">{{ Auth::user()->name }}</p>
                <p class="text-sm font-light text-serv-text">
                    {{ '@' . Auth::user()->username }}
                </p>
            </div>
        </div>

        {{-- Dashboard Nav --}}
        <ul class="mt-6">
            <li class="relative px-6 py-3">

                @if (request()->is('dashboard'))
                <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150 hover:text-gray-800 " href="{{ route('dashboard.index') }}">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z" fill="#082431" />
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
                @else
                <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('dashboard.index') }}">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z" fill="#082431" />
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
                @endif
            </li>
        </ul>

        <ul>
            {{-- Profile Nav --}}
            <li class="relative px-6 py-3">

                @if (request()->is('dashboard/profile') || request()->is('dashboard/profile/*') || request()->is('dashboard/*/profile') || request()->is('dashboard/*/profile/*'))
                <a class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150 hover:text-gray-800 " href="{{ route('dashboard.profile.index') }}">


                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                    <!-- Active Icons -->

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#082431" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" fill="white" />
                        <circle cx="10.5" cy="5.5" r="2.75" stroke="#082431" stroke-width="1.5" />
                        <path d="M3.75 18.2581C3.75 14.6638 6.66376 11.75 10.2581 11.75H11.7419C15.3362 11.75 18.25 14.6638 18.25 18.2581C18.25 18.8059 17.8059 19.25 17.2581 19.25H4.74194C4.1941 19.25 3.75 18.8059 3.75 18.2581Z" stroke="#082431" stroke-width="1.5" />
                        <path d="M17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981L17.9314 19.9848C17.715 20.3596 17.383 20.6541 16.985 20.8241L15.4217 21.4919C15.3603 21.518 15.2911 21.478 15.2831 21.4119L15.0797 19.7241C15.028 19.2944 15.117 18.8596 15.3333 18.4848L17 15.5981L17.75 14.299Z" fill="#082431" />
                        <path d="M17 15.5981L15.3333 18.4848C15.117 18.8596 15.028 19.2944 15.0797 19.7241L15.2831 21.4119C15.2911 21.478 15.3603 21.518 15.4217 21.4919L16.985 20.8241C17.383 20.6541 17.715 20.3596 17.9314 19.9848L19.5981 17.0981M17 15.5981L17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75V13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981M17 15.5981L19.5981 17.0981" stroke="#082431" stroke-width="1.5" />
                    </svg>

                    <span class="ml-4">Profile</span>
                    {{-- <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">
                        {{ auth()->user()->order_buyer()->count() }}
                    </span> --}}

                </a>
                @else
                <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('dashboard.profile.index') }}">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" fill="white" />
                        <circle cx="10.5" cy="5.5" r="2.75" stroke="#082431" stroke-width="1.5" />
                        <path d="M3.75 18.2581C3.75 14.6638 6.66376 11.75 10.2581 11.75H11.7419C15.3362 11.75 18.25 14.6638 18.25 18.2581C18.25 18.8059 17.8059 19.25 17.2581 19.25H4.74194C4.1941 19.25 3.75 18.8059 3.75 18.2581Z" stroke="#082431" stroke-width="1.5" />
                        <path d="M17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981L17.9314 19.9848C17.715 20.3596 17.383 20.6541 16.985 20.8241L15.4217 21.4919C15.3603 21.518 15.2911 21.478 15.2831 21.4119L15.0797 19.7241C15.028 19.2944 15.117 18.8596 15.3333 18.4848L17 15.5981L17.75 14.299Z" fill="white" />
                        <path d="M17 15.5981L15.3333 18.4848C15.117 18.8596 15.028 19.2944 15.0797 19.7241L15.2831 21.4119C15.2911 21.478 15.3603 21.518 15.4217 21.4919L16.985 20.8241C17.383 20.6541 17.715 20.3596 17.9314 19.9848L19.5981 17.0981M17 15.5981L17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75V13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981M17 15.5981L19.5981 17.0981" stroke="#082431" stroke-width="1.5" />
                    </svg>

                    <span class="ml-4">Profile</span>
                    {{-- <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">
                            {{ auth()->user()->order_buyer()->count() }}
                    </span> --}}

                </a>
                @endif
            </li>

            {{-- Logout Nav --}}
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" fill="white" />
                        <path d="M15 7.5V7C15 4.79086 13.2091 3 11 3H7C4.79086 3 3 4.79086 3 7V17C3 19.2091 4.79086 21 7 21H11C13.2091 21 15 19.2091 15 17V16.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M18.5 9.5L20.8586 11.8586C20.9367 11.9367 20.9367 12.0633 20.8586 12.1414L18.5 14.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M9.5 12L20 12" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                    </svg>

                    <span class="ml-4">Logout</span>

                    <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                        @csrf
                    </form>

                </a>
            </li>

        </ul>

    </div>
</aside>
