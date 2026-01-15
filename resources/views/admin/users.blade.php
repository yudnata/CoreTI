@extends('layouts.admin')

@section('title', 'Users Account - Admin Panel')

@section('content')
    <section class="mb-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 uppercase text-center">users account</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($users as $user)
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow transition-shadow duration-300 text-center">
                    <p class="text-gray-600 mb-2"> user id : <span class="font-semibold text-blue-600">{{ $user->id }}</span> </p>
                    <p class="text-gray-600 mb-2"> username : <span class="font-semibold text-gray-800">{{ $user->name }}</span> </p>
                    <p class="text-gray-600 mb-2"> email : <span class="font-semibold text-gray-800">{{ $user->email }}</span> </p>
                    <p class="text-gray-600 mb-6"> user type : <span
                            class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $user->user_type == 'admin' ? 'bg-orange-100 text-orange-600' : 'bg-blue-100 text-blue-600' }}">{{ $user->user_type }}</span>
                    </p>

                    <a href="{{ route('admin.users.delete', $user->id) }}" onclick="return confirm('delete this user?');"
                        class="block w-full bg-red-500 hover:bg-red-600 text-white font-medium py-2 rounded-lg transition-colors capitalize">delete user</a>
                </div>
            @empty
                <div class="col-span-full text-center py-10 bg-white rounded-xl shadow-sm border border-gray-100">
                    <p class="text-xl text-gray-500">no accounts available!</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection