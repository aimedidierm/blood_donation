<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood donation information system</title>
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="/" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Blood donation
                    information system</span>
            </a>
        </div>
    </nav>

    <div class="p-6 space-y-6 ">
        <div class="flex space-x-4 bg-white border-gray-200 dark:bg-gray-900 ">
            <!-- Login Form -->
            <div class="w-1/2 p-4 border-r dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Sign in to your account</h3>
                <form class="space-y-6" action="/auth/login" method="POST">
                    @csrf
                    <div>
                        <label for="login_email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            email</label>
                        <input type="email" name="email" id="login_email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Enter your email" required>
                    </div>
                    <div>
                        <label for="login_password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input type="password" name="password" id="login_password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                        to your account</button>
                </form>
            </div>
            <!-- Register Form -->
            <div class="w-1/2 p-4">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Register your account</h3>
                <form class="space-y-6" action="/auth/register" method="POST">
                    @csrf
                    <div>
                        <label for="register_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            name</label>
                        <input type="text" name="name" id="register_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Enter your name" required>
                    </div>
                    <div>
                        <label for="register_phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your phone</label>
                        <input type="text" name="phone" id="register_phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Enter phone number" required>
                    </div>
                    <div>
                        <label for="register_email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="register_email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="name@company.com" required>
                    </div>
                    <div>
                        <label for="register_gender"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your gender</label>
                        <select name="gender" id="register_gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="register_dob"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Date of Birth</label>
                        <input type="date" name="dob" id="register_dob"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="register_province"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province</label>
                            <select name="province" id="register_province"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select Province</option>
                                @foreach ($address as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label for="register_district"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">District</label>
                            <select name="district" id="register_district"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select District</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="register_sector"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sector</label>
                            <select name="sector" id="register_sector"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select Sector</option>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label for="register_cell"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cell</label>
                            <select name="cell" id="register_cell"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select Cell</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="register_password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input type="password" name="password" id="register_password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="register_password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                            password</label>
                        <input type="password" name="password_confirmation" id="register_password_confirmation"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                        account</button>
                </form>
            </div>
        </div>
    </div>
    <br>
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