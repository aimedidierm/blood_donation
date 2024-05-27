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
                <h2 class="text-2xl font-semibold mb-6">Register your account</h2>
                @if($errors->any())
                <span style="color: red;">{{$errors->first()}}</span>
                @endif
                <form class="space-y-6" action="/auth/register" method="POST">
                    @csrf
                    <div class="flex mb-4 space-x-4">

                        <div class="w-1/2">
                            <label for="register_name" class="block text-gray-700">Your
                                name</label>
                            <input type="text" name="name" id="register_name"
                                class="w-full border border-gray-300 p-2 rounded mt-1" placeholder=" Enter your name"
                                required>
                        </div>
                        <div class="w-1/2">
                            <label for="register_phone" class="block text-gray-700">Your phone(07XXXXXXXX)</label>
                            <input type="text" name="phone" id="register_phone"
                                class="w-full border border-gray-300 p-2 rounded mt-1" placeholder=" Enter phone number"
                                required>
                        </div>
                    </div>
                    <div class="flex mb-4 space-x-4">
                        <div class="w-1/2">
                            <label for="register_email" class="block text-gray-700">Your email</label>
                            <input type="email" name="email" id="register_email"
                                class="w-full border border-gray-300 p-2 rounded mt-1" placeholder=" name@company.com"
                                required>
                        </div>
                        <div class="w-1/2">
                            <label for="register_gender" class="block text-gray-700">Your
                                gender</label>
                            <select name="gender" id="register_gender"
                                class="w-full border border-gray-300 p-2 rounded mt-1" required>
                                <option value=" male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="register_dob" class="block text-gray-700">Your
                            Date of Birth</label>
                        <input type="date" name="dob" id="register_dob"
                            class="w-full border border-gray-300 p-2 rounded mt-1" required>
                    </div>
                    <div class=" flex mb-4 space-x-4">
                        <div class="w-1/2">
                            <label for="register_province" class="block text-gray-700">Province</label>
                            <select name="province" id="register_province"
                                class="w-full border border-gray-300 p-2 rounded mt-1">
                                <option value="">Select Province</option>
                                @foreach ($address as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label for="register_district" class="block text-gray-700">District</label>
                            <select name="district" id="register_district"
                                class="w-full border border-gray-300 p-2 rounded mt-1">
                                <option value="">Select District</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex mb-4 space-x-4">
                        <div class="w-1/2">
                            <label for="register_sector" class="block text-gray-700">Sector</label>
                            <select name="sector" id="register_sector"
                                class="w-full border border-gray-300 p-2 rounded mt-1">
                                <option value="">Select Sector</option>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label for="register_cell" class="block text-gray-700">Cell</label>
                            <select name="cell" id="register_cell"
                                class="w-full border border-gray-300 p-2 rounded mt-1">
                                <option value="">Select Cell</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex mb-4 space-x-4">
                        <div class="w-1/2">
                            <label for="register_password" class="block text-gray-700">Your
                                password</label>
                            <input type="password" name="password" id="register_password" placeholder="••••••••"
                                class="w-full border border-gray-300 p-2 rounded mt-1" required>
                        </div>
                        <div class="w-1/2">
                            <label for="register_password_confirmation" class="block text-gray-700">Confirm
                                password</label>
                            <input type="password" name="password_confirmation" id="register_password_confirmation"
                                placeholder="••••••••" class="w-full border border-gray-300 p-2 rounded mt-1" required>
                        </div>
                    </div>
                    <button type=" submit" class="w-full bg-red-500 text-white p-2 rounded">Register</button>
                </form>
                <p class="text-gray-600 text-sm mt-6">already you have an account? <a href="/login"
                        class="text-red-500">Login
                    </a></p>
            </div>
            <div class="w-1/2 bg-red-600 text-white flex items-center justify-center p-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold mb-4">Blood donation information system</h1>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) &&
        window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
        } else {
        themeToggleDarkIcon.classList.remove('hidden');
        }
        var themeToggleBtn = document.getElementById('theme-toggle');
        themeToggleBtn.addEventListener('click', function() {
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');
        if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
        } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
        }
        } else {
        if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
        } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
        }
        }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const provinces = @json($address);
        const provinceDropdown = document.getElementById('register_province');
        const districtDropdown = document.getElementById('register_district');
        const sectorDropdown = document.getElementById('register_sector');
        const cellDropdown = document.getElementById('register_cell');
        
        const updateDistricts = () => {
        const selectedProvinceName = provinceDropdown.value;
        const selectedProvince = provinces.find(province => province.name === selectedProvinceName);
        
        districtDropdown.innerHTML = '<option value="">Select District</option>';
        sectorDropdown.innerHTML = '<option value="">Select Sector</option>';
        cellDropdown.innerHTML = '<option value="">Select Cell</option>';
        
        if (selectedProvince) {
        selectedProvince.districts.forEach(district => {
        const option = document.createElement('option');
        option.value = district.name;
        option.textContent = district.name;
        districtDropdown.appendChild(option);
        });
        }
        };
        
        const updateSectors = () => {
        const selectedDistrictName = districtDropdown.value;
        const selectedProvinceName = provinceDropdown.value;
        const selectedProvince = provinces.find(province => province.name === selectedProvinceName);
        
        sectorDropdown.innerHTML = '<option value="">Select Sector</option>';
        cellDropdown.innerHTML = '<option value="">Select Cell</option>';
        
        if (selectedProvince) {
        const selectedDistrict = selectedProvince.districts.find(district => district.name === selectedDistrictName);
        
        if (selectedDistrict) {
        selectedDistrict.sectors.forEach(sector => {
        const option = document.createElement('option');
        option.value = sector.name;
        option.textContent = sector.name;
        sectorDropdown.appendChild(option);
        });
        }
        }
        };
        
        const updateCells = () => {
        const selectedSectorName = sectorDropdown.value;
        const selectedDistrictName = districtDropdown.value;
        const selectedProvinceName = provinceDropdown.value;
        const selectedProvince = provinces.find(province => province.name === selectedProvinceName);
        
        cellDropdown.innerHTML = '<option value="">Select Cell</option>';
        
        if (selectedProvince) {
        const selectedDistrict = selectedProvince.districts.find(district => district.name === selectedDistrictName);
        
        if (selectedDistrict) {
        const selectedSector = selectedDistrict.sectors.find(sector => sector.name === selectedSectorName);
        
        if (selectedSector) {
        selectedSector.cells.forEach(cell => {
        const option = document.createElement('option');
        option.value = cell.name;
        option.textContent = cell.name;
        cellDropdown.appendChild(option);
        });
        }
        }
        }
        };
        
        provinceDropdown.addEventListener('change', updateDistricts);
        districtDropdown.addEventListener('change', updateSectors);
        sectorDropdown.addEventListener('change', updateCells);
        });
    </script>
</body>

</html>