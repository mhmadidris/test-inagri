@extends('layouts.app')

@section('title', ' Users')

@section('content')

<main class="h-full overflow-y-auto">
    <div class="container mx-auto">
        <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
            <div class="col-span-8">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    INAGRI Users
                </h2>
                <p class="text-sm text-gray-400">
                    {{ $count - 1 }} Total Users
                </p>
            </div>
            <div class="col-span-4 lg:text-right">
                <div class="relative mt-0 md:mt-6">
                    <a href="{{ route('dashboard.user.create') }}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        + Add New User
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="container px-6 mx-auto mt-5">
        <div class="grid gap-5 md:grid-cols-12">
            <main class="col-span-12 p-4 md:pt-0">
                @if (count($data) > 0)
                <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                    <table class="w-full" aria-label="Table">
                        <thead>
                            <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                <th class="py-4" scope="">Name</th>
                                <th class="py-4" scope="">Email</th>
                                <th class="py-4" scope="">Username</th>
                                <th class="py-4" scope="">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($data as $d)
                            <tr class="text-gray-700">
                                <td class=" px-1 py-5">
                                    <div class="flex items-center text-sm">
                                        <div class="relative w-10 h-10 mr-3 rounded-full md:block">

                                            <div class="relative w-14 h-11">

                                                @php
                                                dd($d);
                                                $convertImg = json_decode($d->avatar);
                                                @endphp

                                                <div class="m-auto" style="width: 2.5rem; height: 2.5rem;">
                                                    <img src="{{ asset('/storage/account/' . Auth::user()->id . '/avatar/' . $convertImg) }}" alt="image-user" class="object-cover w-full h-full rounded-full">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-2">
                                            <a href="{{ route('dashboard.user.show', $d->id) }}" class="font-medium text-black">
                                                {{ $d->username }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-1 py-5 text-sm">
                                    <div class="ml-2">
                                        {{ $d->email }}
                                    </div>
                                </td>
                                <td class="px-1 py-5 text-sm">
                                    <div class="ml-2">
                                        {{ $d->username }}
                                    </div>
                                </td>
                                <td class="px-1 py-5 text-sm">
                                    <form action="{{ route('dashboard.user.destroy', $d->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger show-alert-delete-box" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <h1>Not yet users</h1>
                @endif
                <br>
                {{ $data->links('pagination::simple-tailwind') }}
            </main>
        </div>
    </section>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?"
            , text: "If you delete this, it will be gone forever."
            , icon: "warning"
            , type: "warning"
            , buttons: ["Cancel", "Yes!"]
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });

</script>

@endsection
