@extends('layouts.admin')

@section('title', 'Messages - Admin Panel')

@section('content')
    <section class="mb-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 uppercase text-center">new messages</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($messages as $message)
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow transition-shadow duration-300">
                    <div class="space-y-3 mb-6">
                        <p class="text-gray-600"> user id : <span class="font-semibold text-blue-600">{{ $message->user_id }}</span> </p>
                        <p class="text-gray-600"> name : <span class="font-semibold text-gray-800">{{ $message->name }}</span> </p>
                        <p class="text-gray-600"> email : <span class="font-semibold text-gray-800">{{ $message->email }}</span> </p>
                        <p class="text-gray-600"> number : <span class="font-semibold text-gray-800">{{ $message->number }}</span> </p>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-50 mt-2">
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $message->message }}</p>
                        </div>
                    </div>

                    <a href="{{ route('admin.messages.delete', $message->id) }}" onclick="return confirm('delete this message?');"
                        class="block w-full bg-red-500 hover:bg-red-600 text-white font-medium py-2 rounded-lg transition-colors capitalize text-center">delete message</a>
                </div>
            @empty
                <div class="col-span-full text-center py-10 bg-white rounded-xl shadow-sm border border-gray-100">
                    <p class="text-xl text-gray-500">you have no messages!</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection