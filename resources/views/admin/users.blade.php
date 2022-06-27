@extends("dashboard.index")
@section("main-area")
<section class="p-5">
    <div class="py-10 px-5 space-y-5">
        <p class="font-semibold text-xl">All Users</p>

        <table cellpadding="10" class="border rounded w-full">
            <tr class="border ">
            <th style="text-align: left;">Name</th>
            <th style="text-align: left;">Email</th>
            <th style="text-align: left;">Phone Number</th>
            <th style="text-align: left;">Action</th>
            </tr>
            @forelse($users as $user)
            <tr class="border">
                <td class="">{{ $user->name }} </td>
                <td class="">{{ $user->email }} </td>
                <td class="">{{ $user->phone_number }} </td>
                <td class="">
                    @if($user->account_type == "admin")
                    -
                    @else
                    <button class="text-red-500">Delete</button>
                    @endif
                </td>
            </tr>
            @empty
                <div class="h-96 flex items-center col-span-4 justify-center">
                    <p>No Users</p>
                </div>
            @endforelse
        </table>

        </div>
</section>
@endsection
