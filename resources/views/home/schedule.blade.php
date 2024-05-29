<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Process</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-red-100">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-red-600">Blood donation information system</div>
                <div class="flex space-x-4">
                    <a href="/" class="text-gray-600 hover:text-gray-800">Home</a>
                    <a href="/chatify" class="text-gray-600 hover:text-gray-800">Chat</a>
                    <a href="/login" class="text-gray-600 hover:text-gray-800">Login</a>
                    <a href="/verify" class="text-gray-600 hover:text-gray-800">Verify</a>
                    @if(Auth::check() && Auth::user()->type == \App\Enums\UserType::DONOR->value)
                    <a href="/donor/settings" class="text-gray-600 hover:text-gray-800">Check my status</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- Blood Donation Process Section -->
    <section class="py-12 bg-red-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-red-600 mb-8">Blood Donation Process</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="/images/11.png" alt="Step 1" class="mb-4 mx-auto">
                    <h3 class="text-xl font-bold mb-2">Step 1</h3>
                    <p class="text-gray-600">Check in for your appointment and be prepared to show a photo ID.</p>
                </div>
                <!-- Step 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="/images/22.png" alt="Step 2" class="mb-4 mx-auto">
                    <h3 class="text-xl font-bold mb-2">Step 2</h3>
                    <p class="text-gray-600">First-time donors will fill out a registration form and have their photo
                        taken for records.</p>
                </div>
                <!-- Step 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="/images/33.png" alt="Step 3" class="mb-4 mx-auto">
                    <h3 class="text-xl font-bold mb-2">Step 3</h3>
                    <p class="text-gray-600">A prescreening is conducted, including health and lifestyle questions. All
                        information is confidential.</p>
                </div>
                <!-- Step 4 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="/images/44.png" alt="Step 4" class="mb-4 mx-auto">
                    <h3 class="text-xl font-bold mb-2">Step 4</h3>
                    <p class="text-gray-600">Donate one unit of blood (about one pint). This takes about six to ten
                        minutes.</p>
                </div>
                <!-- Step 5 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="/images/55.png" alt="Step 5" class="mb-4 mx-auto">
                    <h3 class="text-xl font-bold mb-2">Step 5</h3>
                    <p class="text-gray-600">After donation, visit the donor café for drinks and snacks provided by
                        volunteers.</p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>