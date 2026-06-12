<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-6">

        <div class="max-w-5xl mx-auto px-4">

            <!-- HEADER (Compact) -->
            <div class="bg-white rounded-xl shadow-sm p-5 flex items-center gap-5 mb-5">

                <div class="w-16 h-16 rounded-full bg-indigo-600 text-white flex items-center justify-center text-2xl font-bold">
                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                </div>

                <div class="flex-1">
                    <h1 class="text-xl font-semibold text-gray-900">
                        {{ Auth::user()->name }}
                    </h1>
                    <p class="text-sm text-gray-500">
                        {{ Auth::user()->email }}
                    </p>
                </div>

                <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full">
                    Active
                </span>

            </div>

            <!-- MAIN GRID -->
            <div class="grid lg:grid-cols-3 gap-5">

                <!-- LEFT QUICK INFO -->
                <div class="bg-white sticky top-32 rounded-xl shadow-sm p-4 space-y-3">

                    <h2 class="text-sm font-semibold text-gray-700 border-b pb-2">
                        Account Summary
                    </h2>

                    <div class="text-sm space-y-2">
                        <div>
                            <p class="text-gray-400 text-xs">Name</p>
                            <p class="font-medium">{{ Auth::user()->name }}</p>
                        </div>

                        <div>
                            <p class="text-gray-400 text-xs">Email</p>
                            <p class="font-medium break-all">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                </div>

                <!-- RIGHT FULL SETTINGS -->
                <div class="lg:col-span-2 space-y-4">

                    <!-- PROFILE -->
                    <div class="bg-white rounded-xl shadow-sm p-5">

                        <h2 class="text-base font-semibold mb-3 text-gray-800">
                            Profile Information
                        </h2>

                        <div class="scale-95 origin-top-left">
                            @include('profile.partials.update-profile-information-form')
                        </div>

                    </div>

                    <!-- PASSWORD -->
                    <div class="bg-white rounded-xl shadow-sm p-5">

                        <h2 class="text-base font-semibold mb-3 text-gray-800">
                            Security
                        </h2>

                        <div class="scale-95 origin-top-left">
                            @include('profile.partials.update-password-form')
                        </div>

                    </div>
@role('super-admin|admin')
                    <!-- DELETE -->
                    <div class="bg-white rounded-xl shadow-sm p-5 border border-red-100">

                        <h2 class="text-base font-semibold mb-3 text-red-600">
                            Danger Zone
                        </h2>

                        <div class="scale-95 origin-top-left">
                            @include('profile.partials.delete-user-form')
                        </div>

                    </div>
@endrole
                </div>

            </div>

        </div>

    </div>
</x-app-layout>