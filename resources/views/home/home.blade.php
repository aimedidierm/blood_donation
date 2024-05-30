<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                @if (Auth::check())
                <div class="text-2xl font-bold text-grey-600">{{Auth::user()->name}} - </div>
                @endif
                <div class="text-2xl font-bold text-red-600">Blood donation information system</div>
                <div class="flex space-x-4">
                    <a href="/" class="text-gray-600 hover:text-gray-800">Home</a>
                    <a href="/chatify" class="text-gray-600 hover:text-gray-800">Chat</a>
                    <a href="/verify" class="text-gray-600 hover:text-gray-800">Verify</a>
                    @if(Auth::check())
                    <a href="
                        @if(Auth::user()->type == \App\Enums\UserType::DONOR->value)
                        {{'/donor/settings'}}
                        @else
                        {{'/collector/settings'}}
                        @endif
                    " class="text-gray-600 hover:text-gray-800">Check my status
                        @else
                        <a href="/login" class="text-gray-600 hover:text-gray-800">Login</a>
                        @endif

                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-cover bg-center h-screen"
        style="background-image: url('/images/smiling-black-doctor-with-papers.jpg');">
        <div class="container mx-auto h-full flex items-center justify-start">
            <div class="bg-white bg-opacity-75 p-8 rounded-lg">
                <h1 class="text-4xl font-bold text-gray-800">Blood donation information system</h1>
                <p class="mt-4 text-gray-600">Every Drop Counts: The Power of Blood Donation
                    Blood donation is vital for saving lives.
                    It supports surgeries, emergency care,
                    cancer treatment, and chronic illness
                    management. By donating blood,
                    you provide crucial support to
                    those in need, helping to ensure
                    a steady supply for medical emergencies
                    and routine treatments. Your contribution
                    can make a significant difference in
                    someone's life. Join us in this
                    lifesaving mission. Donate blood, save lives!</p>
                <a href="
                @if(Auth::check() && Auth::user()->type == \App\Enums\UserType::DONOR->value)
                {{'/donor/donations'}}
                @else
                {{'/login'}}
                @endif
                " class="mt-6 inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                    Donate</a>
            </div>
        </div>
    </section>
    @if ($message != null)<div class="bg-red-300 bg-opacity-75 p-8 rounded-lg">
        <h1 class="text-4xl font-bold text-gray-800">Announcement</h1>
        <p class="mt-4 text-gray-600">
            {{$message->message}} </p>
    </div>
    @endif
    <section class="py-12 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-red-600 mb-8">Donate Blood</h2>
            <div class="flex flex-col md:flex-row justify-around items-center space-y-8 md:space-y-0">
                <!-- Card 1 -->
                <div class="max-w-xs p-4 rounded-lg shadow-lg bg-white">
                    <div class="flex justify-center mb-4">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M21 15a2 2 0 01-2 2h-3a2 2 0 01-2-2v-3a2 2 0 012-2h3a2 2 0 012 2v3zM6 3v3a2 2 0 002 2h3a2 2 0 002-2V3a2 2 0 00-2-2H8a2 2 0 00-2 2zM8 14h8m-8 4h8M7 21h10" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Learn about your blood type and how your donation can save lives.</p>
                    <a href="/blood-101"
                        class="inline-block bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">Blood
                        101</a>
                </div>
                <!-- Card 2 -->
                <div class="max-w-xs p-4 rounded-lg shadow-lg bg-white">
                    <div class="flex justify-center mb-4">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M18 8a6 6 0 11-12 0 6 6 0 0112 0zM12 14v8m0 0h4m-4 0H8" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Find out more information here about donor eligibility.</p>
                    <a href="/requirements"
                        class="inline-block bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">Eligibility</a>
                </div>
                <!-- Card 3 -->
                <div class="max-w-xs p-4 rounded-lg shadow-lg bg-white">
                    <div class="flex justify-center mb-4">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M12 20.49a4 4 0 010-7.98M12 3a9 9 0 00-9 9c0 3.53 2.13 6.74 5 8.26a3 3 0 001.36.27A3 3 0 009 19.88 7 7 0 017 10a5 5 0 015-5h0a5 5 0 015 5 7 7 0 01-2 4.88 3 3 0 00-.36 4.65 3 3 0 001.36.27 3 3 0 001.36-.27C19.87 18.74 22 15.53 22 12a9 9 0 00-10-9z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Learn more about the donation process and how you can schedule your
                        lifesaving appointment today.</p>
                    <a href="/schedule"
                        class="inline-block bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">Schedule
                        a
                        Donation</a>
                </div>
            </div>
        </div>
    </section><br>
    <a href="#" class="flex items-center justify-center">
        <span class="self-center text-3xl font-semibold whitespace-nowrap">Stories</span>
    </a>
    <br>
    <div class="p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($data as $item)
            <div
                class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                <div class="flex flex-col items-center p-6">
                    <div class="relative w-40 h-40 mb-4">
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-gray-100 rounded-full dark:bg-gray-600">
                            <svg class="w-20 h-20 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <h5 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">
                        @if ($item->show_name)
                        {{$item->name}}
                        @else
                        Anonymous
                        @endif
                        - Donor
                    </h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center px-4">{{$item->message}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <footer class="bg-white dark:bg-gray-900">
        <div class="px-4 py-6 bg-gray-100 dark:bg-gray-700 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 dark:text-gray-300 sm:text-center">© 2024
                All Rights Reserved.
            </span>
            <div class="flex mt-4 space-x-5 sm:justify-center md:mt-0">
                <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 8 19">
                        <path fill-rule="evenodd"
                            d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 17">
                        <path fill-rule="evenodd"
                            d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Twitter page</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">GitHub account</span>
                </a>
            </div>
        </div>
    </footer>
</body>

</html>