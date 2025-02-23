<!-- resources/views/livewire/create-device-form.blade.php -->

<div>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900 leading-tight text-center vazirmatn">
            @if($deviceId)
                ✨ ویرایش دستگاه ✨
            @else
                ✨ افزودن دستگاه جدید ✨
            @endif
        </h2>
    </x-slot>

    <div class="flex justify-center mt-10">
        <section class="bg-white shadow-lg rounded-lg p-8 w-full max-w-6xl">
            <form wire:submit="saveDevice">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

                    <!-- نام دستگاه -->
                    <div>
                        <label for="pc_name" class="block text-gray-700 text-sm font-bold mb-2">نام دستگاه:</label>
                        <div class="relative">
                            <input type="text" id="pc_name" name="pc_name" wire:model="pc_name"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="نام دستگاه"/>
                            @error('pc_name') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- نام کاربری -->
                    <div>
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">نام کاربری:</label>
                        <div class="relative">
                            <input type="text" id="username" name="username" wire:model="username"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="نام کاربری"/>
                            @error('username') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- نام اپراتور -->
                    <div>
                        <label for="operator_name" class="block text-gray-700 text-sm font-bold mb-2">نام اپراتور:</label>
                        <div class="relative">
                            <input type="text" id="operator_name" name="operator_name" wire:model="operator_name"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="نام اپراتور"/>
                            @error('operator_name') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- نوع (کومبوباکس) -->
                    <div>
                        <label for="type" class="block text-gray-700 text-sm font-bold mb-2">نوع دستگاه:</label>
                        <div class="relative">
                            <select id="type" name="type" wire:model="type"
                                    class="block w-full py-3 pr-4 pl-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none bg-position-right"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>'); background-repeat: no-repeat; background-size: 1.5em; background-position: right .5em center; padding-right: 2.5em;">
                            <option value="">انتخاب نوع دستگاه</option>
                            @foreach($types as $deviceType)
                                <option value="{{ $deviceType }}">{{ $deviceType }}</option>
                                @endforeach
                                </select>
                                @error('type') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- سیستم عامل (کومبوباکس) -->
                    <div>
                        <label for="os_type" class="block text-gray-700 text-sm font-bold mb-2">سیستم عامل:</label>
                        <div class="relative">
                            <select id="os_type" name="os_type" wire:model="os_type"
                                    class="block w-full py-3 pr-4 pl-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none bg-position-right"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>'); background-repeat: no-repeat; background-size: 1.5em; background-position: right .5em center; padding-right: 2.5em;">
                            <option value="">انتخاب سیستم عامل</option>
                            @foreach($os_types as $osType)
                                <option value="{{ $osType }}">{{ $osType }}</option>
                                @endforeach
                                </select>
                                @error('os_type') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- ورژن سیستم عامل (کومبوباکس) -->
                    <div>
                        <label for="os_build" class="block text-gray-700 text-sm font-bold mb-2">ورژن سیستم عامل:</label>
                        <div class="relative">
                            <select id="os_build" name="os_build" wire:model="os_build"
                                    class="block w-full py-3 pr-4 pl-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none bg-position-right"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>'); background-repeat: no-repeat; background-size: 1.5em; background-position: right .5em center; padding-right: 2.5em;">
                            <option value="">انتخاب ورژن سیستم عامل</option>
                            @foreach($os_builds as $osBuild)
                                <option value="{{ $osBuild }}">{{ $osBuild }}</option>
                                @endforeach
                                </select>
                                @error('os_build') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- آی پی -->
                    <div>
                        <label for="ip_valid" class="block text-gray-700 text-sm font-bold mb-2">آی پی:</label>
                        <div class="relative">
                            <input type="text" id="ip_valid" name="ip_valid" wire:model="ip_valid"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="آی پی"/>
                            @error('ip_valid') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- آی پی محلی -->
                    <div>
                        <label for="ip_local" class="block text-gray-700 text-sm font-bold mb-2">آی پی محلی:</label>
                        <div class="relative">
                            <input type="text" id="ip_local" name="ip_local" wire:model="ip_local"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="آی پی محلی"/>
                            @error('ip_local') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- مک آدرس -->
                    <div>
                        <label for="mac" class="block text-gray-700 text-sm font-bold mb-2">مک آدرس:</label>
                        <div class="relative">
                            <input type="text" id="mac" name="mac" wire:model="mac"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="مک آدرس"/>
                            @error('mac') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- نوع شبکه (کومبوباکس) -->
                    <div>
                        <label for="net_type" class="block text-gray-700 text-sm font-bold mb-2">نوع شبکه:</label>
                        <div class="relative">
                            <select id="net_type" name="net_type" wire:model="net_type"
                                    class="block w-full py-3 pr-4 pl-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none bg-position-right"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>'); background-repeat: no-repeat; background-size: 1.5em; background-position: right .5em center; padding-right: 2.5em;">
                            <option value="">انتخاب نوع شبکه</option>
                            @foreach($net_types as $netType)
                                <option value="{{ $netType }}">{{ $netType }}</option>
                                @endforeach
                                </select>
                                @error('net_type') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- سوییچ (کومبوباکس) -->
                    <div>
                        <label for="switch" class="block text-gray-700 text-sm font-bold mb-2">سوییچ:</label>
                        <div class="relative">
                            <select id="switch" name="switch" wire:model="switch"
                                    class="block w-full py-3 pr-4 pl-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none bg-position-right"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>'); background-repeat: no-repeat; background-size: 1.5em; background-position: right .5em center; padding-right: 2.5em;">
                            <option value="">انتخاب سوییچ</option>
                            @foreach($switches as $switchItem)
                                <option value="{{ $switchItem }}">{{ $switchItem }}</option>
                                @endforeach
                                </select>
                                @error('switch') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- پورت -->
                    <div>
                        <label for="port" class="block text-gray-700 text-sm font-bold mb-2">پورت:</label>
                        <div class="relative">
                            <input type="text" id="port" name="port" wire:model="port"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="پورت"/>
                            @error('port') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- موقعیت (کومبوباکس) -->
                    <div>
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">موقعیت:</label>
                        <div class="relative">
                            <select id="location" name="location" wire:model="location"
                                    class="block w-full py-3 pr-4 pl-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none bg-position-right"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>'); background-repeat: no-repeat; background-size: 1.5em; background-position: right .5em center; padding-right: 2.5em;">
                            <option value="">انتخاب موقعیت</option>
                            @foreach($locations as $locationItem)
                                <option value="{{ $locationItem }}">{{ $locationItem }}</option>
                                @endforeach
                                </select>
                                @error('location') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- نوع موقعیت (کومبوباکس) -->
                    <div>
                        <label for="location_type" class="block text-gray-700 text-sm font-bold mb-2">نوع موقعیت:</label>
                        <div class="relative">
                            <select id="location_type" name="location_type" wire:model="location_type"
                                    class="block w-full py-3 pr-4 pl-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none bg-position-right"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>'); background-repeat: no-repeat; background-size: 1.5em; background-position: right .5em center; padding-right: 2.5em;">
                            <option value="">انتخاب نوع موقعیت</option>
                            @foreach($location_types as $locationType)
                                <option value="{{ $locationType }}">{{ $locationType }}</option>
                                @endforeach
                                </select>
                                @error('location_type') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- واحد (کومبوباکس) -->
                    <div>
                        <label for="unit" class="block text-gray-700 text-sm font-bold mb-2">واحد:</label>
                        <div class="relative">
                            <select id="unit" name="unit" wire:model="unit"
                                    class="block w-full py-3 pr-4 pl-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none bg-position-right"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>'); background-repeat: no-repeat; background-size: 1.5em; background-position: right .5em center; padding-right: 2.5em;">
                            <option value="">انتخاب واحد</option>
                            @foreach($units as $unitItem)
                                <option value="{{ $unitItem }}">{{ $unitItem }}</option>
                                @endforeach
                                </select>
                                @error('unit') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- خاموش -->
                    <div>
                        <label for="shutdown" class="block text-gray-700 text-sm font-bold mb-2">خاموش:</label>
                        <div class="relative">
                            <select id="shutdown" name="shutdown" wire:model="shutdown" class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">

                                <option value="">خاموش شدن</option>
                                <option value="0">خیر</option>
                                <option value="1">بله</option>
                            </select>
                            @error('shutdown') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- VLAN (کومبوباکس) -->
                    <div>
                        <label for="vlan" class="block text-gray-700 text-sm font-bold mb-2">VLAN:</label>
                        <div class="relative">
                            <select id="vlan" name="vlan" wire:model="vlan"
                                    class="block w-full py-3 pr-4 pl-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none bg-position-right"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>'); background-repeat: no-repeat; background-size: 1.5em; background-position: right .5em center; padding-right: 2.5em;">
                            <option value="">انتخاب VLAN</option>
                            @foreach($vlans as $vlanItem)
                                <option value="{{ $vlanItem }}">{{ $vlanItem }}</option>
                                @endforeach
                                </select>
                                @error('vlan') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- مادربرد -->
                    <div>
                        <label for="motherboard" class="block text-gray-700 text-sm font-bold mb-2">مادربرد:</label>
                        <div class="relative">
                            <input type="text" id="motherboard" name="motherboard" wire:model="motherboard"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="مادربرد"/>
                            @error('motherboard') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- پردازنده -->
                    <div>
                        <label for="cpu" class="block text-gray-700 text-sm font-bold mb-2">پردازنده:</label>
                        <div class="relative">
                            <input type="text" id="cpu" name="cpu" wire:model="cpu"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="پردازنده"/>
                            @error('cpu') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- رم -->
                    <div>
                        <label for="ram" class="block text-gray-700 text-sm font-bold mb-2">رم:</label>
                        <div class="relative">
                            <input type="text" id="ram" name="ram" wire:model="ram"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="رم"/>
                            @error('ram') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- هارد -->
                    <div>
                        <label for="hdd" class="block text-gray-700 text-sm font-bold mb-2">هارد:</label>
                        <div class="relative">
                            <input type="text" id="hdd" name="hdd" wire:model="hdd"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="هارد"/>
                            @error('hdd') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- ارتقاء سخت افزار -->
                    <div>
                        <label for="upgrade_hw" class="block text-gray-700 text-sm font-bold mb-2">ارتقاء سخت افزار:</label>
                        <div class="relative">
                            <input type="text" id="upgrade_hw" name="upgrade_hw" wire:model="upgrade_hw"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="ارتقاء سخت افزار"/>
                            @error('upgrade_hw') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- ارتقاء ویندوز -->
                    <div>
                        <label for="upgrade_win" class="block text-gray-700 text-sm font-bold mb-2">ارتقاء ویندوز:</label>
                        <div class="relative">
                            <input type="text" id="upgrade_win" name="upgrade_win" wire:model="upgrade_win"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="ارتقاء ویندوز"/>
                            @error('upgrade_win') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- تاریخ تمیزکاری -->
                    <div>
                        <label for="clean_at" class="block text-gray-700 text-sm font-bold mb-2">تاریخ تمیزکاری:</label>
                        <div class="relative">
                            <input type="date" id="clean_at" name="clean_at" wire:model="clean_at"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="تاریخ تمیزکاری"/>
                            @error('clean_at') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                </div>

                <!-- دکمه ارسال -->
                <div class="flex justify-center mt-6">
                    <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                        @if($deviceId)
                            ✅ بروزرسانی دستگاه
                        @else
                            ✅ ثبت دستگاه
                        @endif
                    </button>
                </div>
            </form>

            <!-- پیام موفقیت -->
            @if(session()->has('success'))
                <div class="mt-4 text-center text-green-600 font-bold">
                    🎉 {{ session('success') }}
                </div>
            @endif
        </section>
    </div>
</div>
