@extends('layout')

@section('content')
<x-collector-navbar />

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Approved Donations</h5>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Approved Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SN
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Blood Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Donation Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Province
                        </th>
                        <th scope="col" class="px-6 py-3">
                            District
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sector
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cell
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->isEmpty())
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th colspan="9" scope="row"
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
                            {{$item->user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->user->details->sn}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->user->details->blood_type}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->date}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->province}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->district}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->sector}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->cell}}
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop