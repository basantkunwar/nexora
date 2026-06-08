@extends('layouts.frontend')
@section('content')
<section class="bg-gradient-to-r from-blue-700 to-blue-600 py-10 mb-10  mt-[-60px] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">

        <div class="grid lg:grid-cols-2 gap-10 items-center">

            <div>
                <h1 class="text-5xl lg:text-6xl font-bold text-white leading-tight">
                    Book Your Mobile Repair
                </h1>

                <p class="text-white/90 text-lg mt-6">
                    Professional smartphone repair service with free pickup & delivery.
                </p>

                <a href="#booking"
                    class="inline-block mt-8 bg-white text-blue-700 px-8 py-4 rounded-xl font-semibold hover:bg-slate-100 transition">
                    Book Repair
                </a>
            </div>

            <div class="text-center">
                <img
                    src="https://cdn-icons-png.flaticon.com/512/2921/2921822.png"
                    class="w-full max-w-md mx-auto">
            </div>

        </div>

    </div>
</section>



<section class="py-20 bg-slate-50">

    <div class="max-w-7xl mx-auto px-4">

        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold">
                Repair Services
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white border border-slate-200 rounded-3xl p-8 hover:-translate-y-1 transition shadow-sm">

                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 text-3xl mb-5">
                    📱
                </div>

                <h4 class="text-xl font-bold mb-3">
                    Screen Replacement
                </h4>

                <p class="text-slate-600">
                    Cracked or damaged display repair with genuine quality parts.
                </p>

            </div>

            <div class="bg-white border border-slate-200 rounded-3xl p-8 hover:-translate-y-1 transition shadow-sm">

                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 text-3xl mb-5">
                    🔋
                </div>

                <h4 class="text-xl font-bold mb-3">
                    Battery Replacement
                </h4>

                <p class="text-slate-600">
                    Replace damaged or low backup batteries quickly.
                </p>

            </div>

            <div class="bg-white border border-slate-200 rounded-3xl p-8 hover:-translate-y-1 transition shadow-sm">

                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 text-3xl mb-5">
                    ⚡
                </div>

                <h4 class="text-xl font-bold mb-3">
                    Charging Repair
                </h4>

                <p class="text-slate-600">
                    Solve charging issues and charging port damage.
                </p>

            </div>

        </div>

    </div>

</section>


<section class="py-20">

    <div class="max-w-7xl mx-auto px-4">

        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold">
                How It Works
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="text-center">
                <div class="w-24 h-24 bg-blue-700 rounded-full text-white flex items-center justify-center text-4xl mx-auto mb-5">
                    📱
                </div>

                <h4 class="font-bold text-xl mb-2">
                    Choose Device
                </h4>

                <p class="text-slate-600">
                    Select your phone brand and repair issue.
                </p>
            </div>

            <div class="text-center">
                <div class="w-24 h-24 bg-blue-700 rounded-full text-white flex items-center justify-center text-4xl mx-auto mb-5">
                    🚚
                </div>

                <h4 class="font-bold text-xl mb-2">
                    Pickup Device
                </h4>

                <p class="text-slate-600">
                    Our delivery partner collects your device.
                </p>
            </div>

            <div class="text-center">
                <div class="w-24 h-24 bg-blue-700 rounded-full text-white flex items-center justify-center text-4xl mx-auto mb-5">
                    🛠️
                </div>

                <h4 class="font-bold text-xl mb-2">
                    Repair & Return
                </h4>

                <p class="text-slate-600">
                    Device repaired and delivered safely.
                </p>
            </div>

        </div>

    </div>

</section>



<section id="booking" class="py-20 bg-slate-50">

    <div class="max-w-4xl mx-auto px-4">

        <div class="bg-white rounded-3xl p-10 shadow-lg border border-slate-200">

            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold">
                    Book A Repair
                </h2>
            </div>

            <form action="" method="POST">
                @csrf

                <div class="grid md:grid-cols-2 gap-5">

                    <input type="text" name="fullname"
                        placeholder="Full Name"
                        class="h-14 rounded-xl border border-slate-300 px-4">

                    <input type="text" name="phone"
                        placeholder="Phone Number"
                        class="h-14 rounded-xl border border-slate-300 px-4">

                    <input type="email" name="email"
                        placeholder="Email Address"
                        class="h-14 rounded-xl border border-slate-300 px-4">

                    <input type="text" name="device_name"
                        placeholder="Device Name"
                        class="h-14 rounded-xl border border-slate-300 px-4">

                    <input type="text" name="brand_name"
                        placeholder="Brand Name"
                        class="h-14 rounded-xl border border-slate-300 px-4">

                    <input type="text" name="repair_type"
                        placeholder="Repair Type"
                        class="h-14 rounded-xl border border-slate-300 px-4">

                    <textarea name="address"
                        rows="4"
                        placeholder="Address"
                        class="md:col-span-2 rounded-xl border border-slate-300 p-4"></textarea>

                    <textarea name="additional_info"
                        rows="5"
                        placeholder="Additional Information of device issue"
                        class="md:col-span-2 rounded-xl border border-slate-300 p-4"></textarea>

                    <button
                        class="md:col-span-2 h-14 bg-blue-700 hover:bg-blue-800 text-white rounded-xl font-semibold transition">
                        Submit Booking
                    </button>

                </div>

            </form>

        </div>

    </div>

</section>
@endsection