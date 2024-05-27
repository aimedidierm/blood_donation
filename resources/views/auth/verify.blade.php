<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood donation information system</title>
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        .bg-pattern {
            background: linear-gradient(135deg, #007bff 25%, transparent 25%) -50px 0,
                linear-gradient(225deg, #007bff 25%, transparent 25%) -50px 0,
                linear-gradient(315deg, #007bff 25%, transparent 25%),
                linear-gradient(45deg, #007bff 25%, transparent 25%);
            background-size: 100px 100px;
            background-color: #007bff;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg flex overflow-hidden w-4/5 lg:w-2/3">
            <div class="w-1/2 p-8">
                <h2 class="text-2xl font-semibold mb-6">Verify Donor</h2>
                @if($errors->any())
                <span style="color: red;">{{$errors->first()}}</span>
                @endif
                <form class="space-y-6" action="/donor-verify" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="sn" class="block text-gray-700">Donor
                            Serial Number</label>
                        <input type="number" id="sn" name="sn" class="w-full border border-gray-300 p-2 rounded mt-1"
                            placeholder="Enter your serial number">
                    </div>
                    <button type="submit" class="w-full bg-red-500 text-white p-2 rounded">Verify</button>
                </form>
            </div>
            <div class="w-1/2 bg-red-600 text-white flex items-center justify-center p-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold mb-4">Blood donation information system</h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>