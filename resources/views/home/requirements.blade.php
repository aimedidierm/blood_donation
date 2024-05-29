<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Requirements</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-red-200">
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
    <!-- Blood Donation Requirements Section -->
    <section class="py-12 bg-red-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-red-600 mb-8">Blood Donation Requirements</h2>
            <p class="text-gray-600">To ensure the safety of blood donation for both blood donors, and recipients, all
                volunteer blood donors
                must be
                evaluated to determine their eligibility to give blood.</p><br>
            <h2 class="text-xl font-bold text-red-600 mb-8">To Give Blood You Must:</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Requirement Item 1 -->
                <div class="p-4 rounded-lg shadow-lg bg-white">
                    <img src="/images/1.png" alt="Photo ID" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Provide a photo ID</h3>
                    <p class="text-gray-600">All donors must present a valid photo ID at the time of donation.</p>
                </div>

                <!-- Requirement Item 2 -->
                <div class="p-4 rounded-lg shadow-lg bg-white">
                    <img src="/images/2.png" alt="General Health" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Be in general good health</h3>
                    <p class="text-gray-600">Donors should feel healthy and well on the day of donation.</p>
                </div>

                <!-- Requirement Item 3 -->
                <div class="p-4 rounded-lg shadow-lg bg-white">
                    <img src="/images/3.png" alt="Weight" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Weigh at least 110 lbs</h3>
                    <p class="text-gray-600">Donors must weigh at least 110 lbs to donate blood.</p>
                </div>

                <!-- Requirement Item 4 -->
                <div class="p-4 rounded-lg shadow-lg bg-white">
                    <img src="/images/4.png" alt="Hydration" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Drink water and eat a snack</h3>
                    <p class="text-gray-600">Stay hydrated and eat a high-protein snack 45 minutes before donation.</p>
                </div>

                <!-- Requirement Item 5 -->
                <div class="p-4 rounded-lg shadow-lg bg-white">
                    <img src="/images/5.png" alt="Age" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Be at least 16 years old</h3>
                    <p class="text-gray-600">Donors must be 16 with parental consent or 17+ without consent.</p>
                </div>

                <!-- Requirement Item 6 -->
                <div class="p-4 rounded-lg shadow-lg bg-white">
                    <img src="/images/6.png" alt="Tattoos and Piercings" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Tattoos and piercings</h3>
                    <p class="text-gray-600">Tattoos and piercings are acceptable if done in a licensed studio and fully
                        healed.</p>
                </div>

                <!-- Requirement Item 7 -->
                <div class="p-4 rounded-lg shadow-lg bg-white">
                    <img src="/images/8.png" alt="Donation Interval" class="mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Wait 56 days between donations</h3>
                    <p class="text-gray-600">Donors must wait at least 56 days (8 weeks) between blood donations.</p>
                </div>

            </div>
        </div>
    </section>

</body>

</html>