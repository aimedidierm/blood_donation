@extends('layout')

@section('content')
<x-donor-navbar />

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Your Donation History</h5>
        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Request donation
        </button>

        @if($errors->any())<span
            class="self-center text-1xl font-semibold whitespace-nowrap dark:text-red-600">{{$errors->first()}}</span>
        @endif

        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            You can request to make donation
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="defaultModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-6 space-y-6">
                        <h3 class="text-l font-semibold text-gray-900 dark:text-white">
                            You can select address where you want to donate blood
                        </h3>
                        <form action="/donor/donations" method="POST" enctype="multipart/form-data">
                            @csrf
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
                            <br>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                Donation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ML
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->isEmpty())
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th colspan="2" scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            No data
                        </th>
                    </tr>
                    @else
                    @foreach ($data as $item)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->created_at}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->ml}} Ml
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
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
@stop