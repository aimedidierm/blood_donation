@extends('layout')

@section('content')
@if (Auth::user()->type == \App\Enums\UserType::COLLECTOR->value)
<x-collector-navbar />
@else
<x-donor-navbar />
@endif

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Update your details</h5>
        @if (session('success'))
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif
        <div class="max-w-full mx-auto bg-white rounded p-6 shadow-md">
            <form action="
            @if (Auth::user()->type == \App\Enums\UserType::COLLECTOR->value)
            /collector/settings
            @else
                /donor/settings
            @endif
            " method="POST">
                @if($errors->any())
                <span style="color: red;">{{$errors->first()}}</span>
                @endif
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" disabled
                        class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                        placeholder="Enter your name" value="{{Auth::user()->name}}" required>
                </div>
                @if (Auth::user()->type == \App\Enums\UserType::DONOR->value)
                <div class="flex mb-4 space-x-4">
                    <div class="mb-4">
                        <label for="dob" class="block text-gray-700 font-bold mb-2">Date of birth</label>
                        <input type="text" id="dob" disabled
                            class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                            value="{{Auth::user()->details->dob}}">
                    </div>
                    <div class="mb-4">
                        <label for="blood" class="block text-gray-700 font-bold mb-2">Blood Type</label>
                        <input type="text" id="blood" disabled
                            class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                            value="{{Auth::user()->details->blood_type}}" required>
                    </div>
                    <div class="mb-4">
                        <label for="sn" class="block text-gray-700 font-bold mb-2">Donor Serial Number</label>
                        <input type="text" id="sn" disabled
                            class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                            value="{{Auth::user()->details->sn}}" required>
                    </div>
                    <div class="mb-4">
                        <label for="sex" class="block text-gray-700 font-bold mb-2">Gender</label>
                        <input type="text" id="sex" disabled
                            class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                            value="{{Auth::user()->details->sex}}" required>
                    </div>
                    <div class="mb-4">
                        <label for="kg" class="block text-gray-700 font-bold mb-2">Kg</label>
                        <input type="number" id="kg" disabled
                            class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                            value="{{Auth::user()->details->kg}}" required>
                    </div>
                </div>
                <div class="flex mb-4 space-x-4">
                    <div class="mb-4">
                        <label for="province" class="block text-gray-700 font-bold mb-2">Province</label>
                        <input type="text" id="province" disabled
                            class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                            value="{{Auth::user()->details->province}}">
                    </div>
                    <div class="mb-4">
                        <label for="district" class="block text-gray-700 font-bold mb-2">District</label>
                        <input type="text" id="district" disabled
                            class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                            value="{{Auth::user()->details->district}}" required>
                    </div>
                    <div class="mb-4">
                        <label for="sector" class="block text-gray-700 font-bold mb-2">Sector</label>
                        <input type="text" id="sector" disabled
                            class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                            value="{{Auth::user()->details->sector}}" required>
                    </div>
                    <div class="mb-4">
                        <label for="cell" class="block text-gray-700 font-bold mb-2">Cell</label>
                        <input type="text" id="cell" disabled
                            class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                            value="{{Auth::user()->details->cell}}" required>
                    </div>
                    <div class="mb-4">
                        <label for="kg" class="block text-gray-700 font-bold mb-2">Health</label>
                        <input type="number" id="kg" disabled
                            class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                            value="{{Auth::user()->details->health}}" required>
                    </div>
                </div>
                @endif
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" disabled
                        class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                        placeholder="Enter your email" value="{{Auth::user()->email}}" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Phone</label>
                    <input type="text" id="email" name="phone"
                        class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                        placeholder="Enter your email" value="{{Auth::user()->phone}}" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                        placeholder="*********" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirm
                        password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-500"
                        placeholder="*********" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update
                        Details</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop