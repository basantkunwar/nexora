<!-- FOOTER -->
<footer class="mt-12 bg-gradient-to-r from-slate-900 via-[#0F172A] to-slate-800 text-white">

    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 py-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-14">

        <!-- LOGO + DESCRIPTION -->
        <div>

            <h4 class="text-3xl font-bold flex items-center gap-3 text-white">
                <i class="fa-solid fa-mobile-screen-button text-blue-400"></i>
                Nexora
            </h4>

            <p class="mt-8 text-gray-300 text-lg leading-9 text-justify">
                Nexora serves as the premier destination for the best online electronics store in Nepal.
                Offering mobile phones, laptops, accessories, and home appliances.
            </p>

        </div>

        <!-- QUICK LINKS -->
        <div>

            <h5 class="text-2xl font-bold flex items-center gap-3">
                <i class="fa-solid fa-circle-info text-blue-400"></i>
                Quick Links
            </h5>

            <div class="w-full h-px bg-slate-700 my-6"></div>

            <ul class="space-y-5 text-lg text-gray-300">

                <li><a href="/" class="hover:text-blue-400 transition duration-300">Home</a></li>
                <li><a href="/contact" class="hover:text-blue-400 transition duration-300">Contact</a></li>
                <li><a href="/about" class="hover:text-blue-400 transition duration-300">About Us</a></li>
                <li><a href="/brands" class="hover:text-blue-400 transition duration-300">Brands</a></li>
                <li><a href="/repair" class="hover:text-blue-400 transition duration-300">Book a Repair</a></li>
                <li><a href="/blogs" class="hover:text-blue-400 transition duration-300">Blogs</a></li>
                <li><a href="/emi" class="hover:text-blue-400 transition duration-300">Know About EMI</a></li>

            </ul>

        </div>

        <!-- CONTACT -->
        <div>

            <h5 class="text-2xl font-bold flex items-center gap-3">
                <i class="fa-solid fa-location-dot text-blue-400"></i>
                Contact Us
            </h5>

            <div class="w-full h-px bg-slate-700 my-6"></div>

            <div class="space-y-5 text-lg text-gray-300">

                <p><i class="fa-solid fa-phone text-blue-400 mr-3"></i> +977-9761201177</p>

                <p><i class="fa-solid fa-envelope text-blue-400 mr-3"></i> nexora@gmail.com</p>

                <p><i class="fa-solid fa-location-dot text-blue-400 mr-3"></i> Dhangadhi, Kailali</p>

            </div>

        </div>

        <!-- CUSTOMER SERVICE -->
        <div>

            <h5 class="text-2xl font-bold flex items-center gap-3">
                <i class="fa-solid fa-headset text-blue-400"></i>
                Customer Service
            </h5>

            <div class="w-full h-px bg-slate-700 my-6"></div>

            <div class="space-y-5 text-lg text-gray-300">

                <p><i class="fa-solid fa-phone text-blue-400 mr-3"></i> +977-9709090017</p>

                <p><i class="fa-solid fa-phone text-blue-400 mr-3"></i> +977-9801104556</p>

                <p><i class="fa-solid fa-phone text-blue-400 mr-3"></i> +977-9802352615</p>

            </div>

            <!-- SOCIAL -->
            <div class="flex gap-5 mt-10 text-3xl">

                <a href="{{settings('facebook')}}" class="text-blue-500 hover:text-white hover:scale-110 transition duration-300">
                    <i class="fab fa-facebook"></i>
                </a>

                <a href="{{settings('instagram')}}" class="text-pink-500 hover:text-white hover:scale-110 transition duration-300">
                    <i class="fab fa-instagram"></i>
                </a>

                <a href="{{settings('tiktok')}}" class="text-white hover:text-blue-400 hover:scale-110 transition duration-300">
                    <i class="fab fa-tiktok"></i>
                </a>

                <a href="{{settings('youtube')}}" class="text-red-500 hover:text-white hover:scale-110 transition duration-300">
                    <i class="fab fa-youtube"></i>
                </a>

                <a href="{{settings('linkedin')}}" class="text-sky-500 hover:text-white hover:scale-110 transition duration-300">
                    <i class="fab fa-linkedin"></i>
                </a>

            </div>

        </div>

    </div>

    <!-- BOTTOM BAR -->
    <div class="border-t border-slate-700">

        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 py-6 flex flex-col md:flex-row justify-between items-center gap-6">

            <p class="text-gray-400 text-base">
                © 2026 Nexora. All Rights Reserved.
            </p>

            <div class="flex gap-4">

                <img src="{{ asset('images/card.png') }}" class="w-14 rounded-md bg-white p-1" alt="card">

                <img src="{{ asset('images/fonepay.png') }}" class="w-14 rounded-md bg-white p-1" alt="fonepay">

                <img src="{{ asset('images/codpay.png') }}" class="w-14 rounded-md bg-white p-1" alt="cod">

            </div>

        </div>

    </div>

</footer>
<script>
function decreaseQty(btn) {
    let input = btn.parentElement.querySelector('input');
    let value = parseInt(input.value);
    if (value > 1) input.value = value - 1;
}

function increaseQty(btn) {
    let input = btn.parentElement.querySelector('input');
    let max = parseInt(input.getAttribute('max'));
    let value = parseInt(input.value);
    if (value < max) input.value = value + 1;
}
</script>


<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!-- BEFORE </body> -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@stack('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".Swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,

        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },

        navigation: {
            nextEl: ".category-next",
            prevEl: ".category-prev",
        },

        breakpoints: {
            640: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
            1280: { slidesPerView: 5 }
        }
    });
});
</script>
<script>
function openFilterMenu() {
    document.getElementById('filterMenu')
        .classList.remove('translate-x-full');

    document.getElementById('overlay')
        .classList.remove('hidden');
}

function closeFilterMenu() {
    document.getElementById('filterMenu')
        .classList.add('translate-x-full');

    document.getElementById('overlay')
        .classList.add('hidden');
}
</script>

<script>
lucide.createIcons();
</script>


</body>
</html>