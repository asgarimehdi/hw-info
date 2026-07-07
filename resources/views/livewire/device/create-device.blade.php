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

                    <!-- نوع (Datalist) -->
                    <div>
                        <label for="type" class="block text-gray-700 text-sm font-bold mb-2">نوع دستگاه:</label>
                        <div class="relative">
                            <input type="text" list="typeList" wire:model="type"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="نوع دستگاه"/>
                            <datalist id="typeList">
                                @foreach($types as $deviceType)
                                    <option value="{{ $deviceType }}"></option>
                                @endforeach
                            </datalist>
                            @error('type') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- سیستم عامل (Datalist) -->
                    <div>
                        <label for="os_type" class="block text-gray-700 text-sm font-bold mb-2">سیستم عامل:</label>
                        <div class="relative">
                            <input type="text" list="osTypeList" wire:model="os_type"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="سیستم عامل"/>
                            <datalist id="osTypeList">
                                @foreach($os_types as $osType)
                                    <option value="{{ $osType }}"></option>
                                @endforeach
                            </datalist>
                            @error('os_type') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- ورژن سیستم عامل (Datalist) -->
                    <div>
                        <label for="os_build" class="block text-gray-700 text-sm font-bold mb-2">ورژن سیستم عامل:</label>
                        <div class="relative">
                            <input type="text" list="osBuildList" wire:model="os_build"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="ورژن سیستم عامل"/>
                            <datalist id="osBuildList">
                                @foreach($os_builds as $osBuild)
                                    <option value="{{ $osBuild }}"></option>
                                @endforeach
                            </datalist>
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

                    <!-- نوع شبکه (Datalist) -->
                    <div>
                        <label for="net_type" class="block text-gray-700 text-sm font-bold mb-2">نوع شبکه:</label>
                        <div class="relative">
                            <input type="text" list="netTypeList" wire:model="net_type"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="نوع شبکه"/>
                            <datalist id="netTypeList">
                                @foreach($net_types as $netType)
                                    <option value="{{ $netType }}"></option>
                                @endforeach
                            </datalist>
                            @error('net_type') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- سوییچ (Datalist) -->
                    <div>
                        <label for="switch" class="block text-gray-700 text-sm font-bold mb-2">سوییچ:</label>
                        <div class="relative">
                            <input type="text" list="switchList" wire:model="switch"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="سوییچ"/>
                            <datalist id="switchList">
                                @foreach($switches as $switchItem)
                                    <option value="{{ $switchItem }}"></option>
                                @endforeach
                            </datalist>
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

                    <!-- موقعیت (Datalist) -->
                    <div>
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">موقعیت:</label>
                        <div class="relative">
                            <input type="text" list="locationList" wire:model="location"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="موقعیت"/>
                            <datalist id="locationList">
                                @foreach($locations as $locationItem)
                                    <option value="{{ $locationItem }}"></option>
                                @endforeach
                            </datalist>
                            @error('location') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- نوع موقعیت (Datalist) -->
                    <div>
                        <label for="location_type" class="block text-gray-700 text-sm font-bold mb-2">نوع موقعیت:</label>
                        <div class="relative">
                            <input type="text" list="locationTypeList" wire:model="location_type"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="نوع موقعیت"/>
                            <datalist id="locationTypeList">
                                @foreach($location_types as $locationType)
                                    <option value="{{ $locationType }}"></option>
                                @endforeach
                            </datalist>
                            @error('location_type') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- واحد (Datalist) -->
                    <div>
                        <label for="unit" class="block text-gray-700 text-sm font-bold mb-2">واحد:</label>
                        <div class="relative">
                            <input type="text" list="unitList" wire:model="unit"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="واحد"/>
                            <datalist id="unitList">
                                @foreach($units as $unitItem)
                                    <option value="{{ $unitItem }}"></option>
                                @endforeach
                            </datalist>
                            @error('unit') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- خاموش -->
                    <div>
                        <label for="mark" class="block text-gray-700 text-sm font-bold mb-2">مارک:</label>
                        <div class="relative">
                            <input type="checkbox"  wire:model.live="mark" />
                            @error('mark') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <!-- خاموش -->
                    <div>
                        <label for="shutdown" class="block text-gray-700 text-sm font-bold mb-2">خاموش:</label>
                        <div class="relative">
                            <input type="checkbox"  wire:model.live="shutdown" />
                            @error('shutdown') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- VLAN (Datalist) -->
                    <div>
                        <label for="vlan" class="block text-gray-700 text-sm font-bold mb-2">VLAN:</label>
                        <div class="relative">
                            <input type="text" list="vlanList" wire:model="vlan"
                                   class="block w-full py-3 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="VLAN"/>
                            <datalist id="vlanList">
                                @foreach($vlans as $vlanItem)
                                    <option value="{{ $vlanItem }}"></option>
                                @endforeach
                            </datalist>
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
