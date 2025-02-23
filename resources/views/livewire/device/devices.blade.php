<div dir="rtl">
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight text-center vazirmatn">
            مدیریت دستگاه ها
        </h2>
{{--        @can('isAdmin')--}}
            <div dir="rtl" class="pr-4 pt-4">
                <button x-data x-on:click="$dispatch('open-modal',{name:'new-device'})" class="px-3 py-1 bg-teal-500 text-white rounded">
                    add device
                </button>
            </div>
{{--        @endcan--}}
        @if(session()->has('success'))
            <div class="text-green-500">{{ session('success') }}</div>
        @endif
    </x-slot>

    <div>
        <section class="mt-10">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex items-center justify-between d p-4" dir="rtl">
                        <div class="flex">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                         fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <input wire:model.live.debounce.300ms="search" type="text"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                       placeholder="جستجو" required="">
                            </div>
                        </div>
                        @can('isOstan')
                            <div class="flex space-x-3">

                            </div>
                        @endcan
                        <div class="flex space-x-3">

                        </div>
                        <div class="flex space-x-3">

                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <button class="flex items-center">کاربر</button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button class="flex items-center">نام کاربری</button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button class="flex items-center">نام دستگاه</button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button class="flex items-center">آی پی</button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button class="flex items-center">واحد محل</button>
                                </th>

                                <th scope="col" class="px-4 py-3">
                                    <button class="flex items-center">خاموش</button>
                                </th>
                                <th scope="col" class="px-4 py-3 flex items-center">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($devices as $device )

                                <tr wire:key="{{$device->id}}" class="border-b dark:border-gray-700 text-right">
                                    <td class="px-4 py-3">{{$device->operator_name}}</td>
                                    <td class="px-4 py-3">{{$device->username}}</td>
                                    <td  class="px-4 py-3">{{$device->pc_name}}</td>
                                    <td class="px-4 py-3">{{$device->ip_valid}}</td>
                                    <td class="px-4 py-3">{{$device->location}} > {{$device->unit}}</td>
                                    <td class="px-4 py-3">
                                        <div class="relative inline-block w-11 h-5">
                                            <input disabled id="switch-component" type="checkbox" @checked($device->shutdown) class="w-11 h-5 bg-slate-100 rounded-full" />
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button onClick="confirm('مطمئن هستید؟')" wire:click="delete({{$device->id}})"
                                                class="px-1 py-1 bg-red-200 text-black rounded m-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                 stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                        <a href="{{ route('devices.edit', $device->id) }}">ویرایش</a>
{{--                                        <button wire:click="#"--}}
{{--                                                class="px-1 py-1 bg-green-200 text-black rounded m-1">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>--}}
{{--                                            </svg>--}}


{{--                                        </button>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-my-modal name="edit-user" title="ویرایش کاربر">
                        <x-slot:body>

                        </x-slot:body>
                    </x-my-modal>

                    <div class="py-4 px-3" dir="ltr">
                        <div class="flex ">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-900">تعداد</label>
                                <select

                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20" selected>20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        {{$devices->links()}}
                    </div>
                </div>
            </div>
        </section>

    </div>
    <x-my-modal name="new-device" title="دستگاه جدید">
        <x-slot:body>
            <livewire:device.create-device/>
        </x-slot:body>
    </x-my-modal>

</div>
