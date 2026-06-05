@extends('layouts.frontend')
@section('content')
    

<!-- CONTACT SECTION -->
<section class="bg-slate-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-14">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-black text-white text-sm font-medium">
                CONTACT US
            </span>

            <h1 class="mt-5 text-4xl md:text-5xl font-bold text-slate-900">
                Let's Start a Conversation
            </h1>

            <p class="mt-4 text-lg text-slate-500">
                Send your questions, feedback, or project ideas anytime.
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-8">

            <!-- Left Contact Card -->
            <div class="lg:col-span-5">
                <div class="relative h-full overflow-hidden rounded-3xl bg-slate-900 p-8 md:p-10 shadow-xl">

                    <!-- Decorative Circle -->
                    <div class="absolute -top-12 -right-12 h-44 w-44 rounded-full bg-blue-500/20"></div>

                    <div class="relative z-10">

                        <h2 class="text-3xl font-bold text-white">
                            Get In Touch
                        </h2>

                        <p class="mt-3 text-slate-300">
                            We are here to help and answer any questions you may have.
                        </p>

                        <div class="mt-5 space-y-6">

                            <div class="flex mt-16 gap-8">
                                <div class="h-12  w-12 rounded-xl bg-white flex items-center justify-center text-lg">
                                    📍
                                </div>
                                <div>
                                    <h6 class="font-semibold text-white">
                                        Office Address
                                    </h6>
                                    <p class="text-slate-300">
                                        Dhangadhi, Nepal
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="h-12 w-12 rounded-xl bg-white flex items-center justify-center text-lg">
                                    📞
                                </div>
                                <div>
                                    <h6 class="font-semibold text-white">
                                        Phone Number
                                    </h6>
                                    <p class="text-slate-300">
                                        +977 9761201177
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="h-12 w-12 rounded-xl bg-white flex items-center justify-center text-lg">
                                    ✉️
                                </div>
                                <div>
                                    <h6 class="font-semibold text-white">
                                        Email Address
                                    </h6>
                                    <p class="text-slate-300">
                                        nexora@gmail.com
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="h-12 w-12 rounded-xl bg-white flex items-center justify-center text-lg">
                                    ⏰
                                </div>
                                <div>
                                    <h6 class="font-semibold text-white">
                                        Working Hours
                                    </h6>
                                    <p class="text-slate-300">
                                        Sun - Fri : 9 AM - 6 PM
                                    </p>
                                </div>
                            </div>

                        </div>

                        <!-- Social -->
                        <div class="mt-16 gap-8">
                            <h5 class="text-lg font-semibold text-white mb-4">
                                Follow Us
                            </h5>

                            <div class="flex gap-3">
                                <a href="#" class="h-11 w-11 rounded-full bg-white flex items-center justify-center shadow hover:scale-105 transition">
                                    F
                                </a>

                                <a href="#" class="h-11 w-11 rounded-full bg-white flex items-center justify-center shadow hover:scale-105 transition">
                                    I
                                </a>

                                <a href="#" class="h-11 w-11 rounded-full bg-white flex items-center justify-center shadow hover:scale-105 transition">
                                    W
                                </a>

                                <a href="#" class="h-11 w-11 rounded-full bg-white flex items-center justify-center shadow hover:scale-105 transition">
                                    Y
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10">

                    <h3 class="text-2xl font-bold text-slate-900 mb-8">
                        Share your experience on delivery, order system and any issue
                    </h3>

                    <form action="{{route('pages.create')}}" method="POST">

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Full Name
                                </label>

                                <input type="text"
                                    name="fullname"
                                    placeholder="Basant Kunwar"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-black focus:ring-0">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Email Address
                                </label>

                                <input type="email"
                                    name="email"
                                    placeholder="nexora@gmail.com"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-black focus:ring-0">
                            </div>

                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Phone Number
                            </label>

                            <input type="text"
                                name="phone"
                                placeholder="+977 98XXXXXXXX"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-black focus:ring-0">
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Subject
                            </label>

                            <input type="text"
                                name="subject"
                                placeholder="Write subject"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-black focus:ring-0">
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Message
                            </label>

                            <textarea
                                name="message"
                                rows="6"
                                placeholder="Write your message here..."
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-black focus:ring-0"></textarea>
                        </div>

                        <div class="mt-6 flex items-center gap-3">
                            <input type="checkbox"
                                id="agree"
                                class="rounded border-slate-300">

                            <label for="agree" class="text-sm text-slate-500">
                                I agree to the terms and privacy policy
                            </label>
                        </div>

                        <div class="mt-8">
                            <button type="submit"
                                name="send_message"
                                class="inline-flex items-center rounded-full bg-black px-8 py-3 text-white font-medium shadow-lg hover:bg-slate-800 transition">
                                Send Message →
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</section>

<!-- MAP SECTION -->
<section class="bg-white py-16">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">

            <span class="inline-flex px-4 py-2 rounded-full bg-black text-white text-sm font-medium">
                OUR LOCATION
            </span>

            <h2 class="mt-5 text-4xl font-bold text-slate-900">
                Find Us On Map
            </h2>

            <p class="mt-3 text-lg text-slate-500">
                Visit our office in Dhangadhi, Kailali, Nepal.
            </p>

        </div>

        <div class="overflow-hidden rounded-3xl border border-slate-200 shadow-xl">
            <iframe
                src="https://maps.google.com/maps?q=Dhangadhi,%20Kailali,%20Nepal&t=&z=13&ie=UTF8&iwloc=&output=embed"
                class="w-full h-[500px]"
                allowfullscreen
                loading="lazy">
            </iframe>
        </div>

    </div>

</section>

<!-- FEEDBACK SECTION -->
<section class="bg-slate-50 py-16">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10">

            <div class="text-center mb-10">

                <span class="inline-flex px-4 py-2 rounded-full bg-blue-600 text-white text-sm font-medium">
                    FEEDBACK
                </span>

                <h2 class="mt-5 text-3xl font-bold text-slate-900">
                    Send Your Suggestion on Product Quality & Reliability
                </h2>

                <p class="mt-3 text-slate-500">
                    We value your feedback and suggestions.
                </p>

            </div>

            <form action="productsFeedback.php" method="POST">

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Full Name
                        </label>

                        <input type="text"
                            name="fullname"
                            placeholder="Enter your name"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-black focus:ring-0">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Email Address
                        </label>

                        <input type="email"
                            name="email"
                            placeholder="Enter your email"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-black focus:ring-0">
                    </div>

                </div>

                <div class="mt-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Product Feedback Subject
                    </label>

                    <input type="text"
                        name="subject"
                        placeholder="Write feedback subject"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-black focus:ring-0">
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Message
                    </label>

                    <textarea
                        name="message"
                        rows="6"
                        placeholder="Write your feedback or suggestion..."
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-black focus:ring-0"></textarea>
                </div>

                <div class="mt-8 text-center">
                    <button type="submit"
                        name="send_feedback"
                        class="inline-flex items-center rounded-full bg-black px-8 py-3 text-white font-medium hover:bg-slate-800 transition">
                        Submit Feedback →
                    </button>
                </div>

            </form>

        </div>

    </div>

</section>
@endsection

