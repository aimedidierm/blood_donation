<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood 101</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-red-100">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-red-600">{{env('APP_NAME')}}</div>
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
    <!-- Blood 101 Section -->
    <section class="py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-red-600 mb-8">Blood 101</h2>
            <div class="flex flex-col md:flex-row justify-around items-center space-y-8 md:space-y-0">

                <!-- Blood Components -->
                <div class="max-w-xs p-4 rounded-lg shadow-lg bg-white">
                    <h3 class="text-xl font-bold mb-4">What is blood made of?</h3>
                    <ul class="list-disc list-inside text-left text-gray-600">
                        <li>Plasma</li>
                        <li>White Blood Cells</li>
                        <li>Platelets</li>
                        <li>Red Blood Cells</li>
                    </ul>
                </div>

                <!-- Blood Types -->
                <div class="max-w-xs p-4 rounded-lg shadow-lg bg-white">
                    <h3 class="text-xl font-bold mb-4">Blood Types</h3>
                    <p class="text-gray-600">There are four main blood types: A, B, AB, O. Each type can be positive or
                        negative for the Rh factor.</p>
                </div>

                <!-- Blood Usage -->
                <div class="max-w-xs p-4 rounded-lg shadow-lg bg-white">
                    <h3 class="text-xl font-bold mb-4">When do you need blood?</h3>
                    <ul class="list-disc list-inside text-left text-gray-600">
                        <li>Organ transplants</li>
                        <li>Cancer therapies</li>
                        <li>Sickle cell anemia support</li>
                        <li>Premature babies</li>
                        <li>Surgery patients</li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-around items-center space-y-8 md:space-y-0 mt-8">

                <!-- Blood Facts -->
                <div class="max-w-xs p-4 rounded-lg shadow-lg bg-white">
                    <h3 class="text-xl font-bold mb-4">Blood Facts</h3>
                    <ul class="list-disc list-inside text-left text-gray-600">
                        <li>4.5 million Americans need blood transfusions each year.</li>
                        <li>Someone needs blood every two seconds.</li>
                        <li>One pint of blood can save up to three lives.</li>
                    </ul>
                </div>

                <!-- Blood Testing -->
                <div class="max-w-xs p-4 rounded-lg shadow-lg bg-white">
                    <h3 class="text-xl font-bold mb-4">Blood Testing</h3>
                    <p class="text-gray-600">Blood is tested for several transferrable diseases, including HBV, HCV,
                        HIV, and more, ensuring a safe blood supply.</p>
                </div>
            </div>
        </div>
    </section>

</body>

</html>