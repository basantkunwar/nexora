<!-- FOOTER -->
<footer class="bg-white border-t mt-10">

    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-4 gap-8">

        <!-- LOGO + DESCRIPTION -->
        <div>
            <h4 class="text-xl font-bold text-blue-600 flex items-center gap-2">
                <i class="fa-solid fa-mobile-screen-button"></i>
                Nexora
            </h4>

            <p class="text-gray-600 mt-4 text-sm leading-6">
                Nexora serves as the premier destination for the best online electronics store in Nepal.
                Offering mobile phones, laptops, accessories, and home appliances.
            </p>
        </div>

        <!-- QUICK LINKS -->
        <div>
            <h5 class="font-semibold text-lg">Quick Links</h5>

            <ul class="mt-4 space-y-2 text-gray-700 text-sm">

                <li><a href="/" class="hover:text-blue-600">Home</a></li>
                <li><a href="/contact" class="hover:text-blue-600">Contact</a></li>
                <li><a href="/about" class="hover:text-blue-600">About Us</a></li>
                <li><a href="/brands" class="hover:text-blue-600">Brands</a></li>
                <li><a href="/repair" class="hover:text-blue-600">Book a Repair</a></li>
                <li><a href="/blogs" class="hover:text-blue-600">Blogs</a></li>
                <li><a href="/emi" class="hover:text-blue-600">Know About EMI</a></li>

            </ul>
        </div>

        <!-- CONTACT -->
        <div>
            <h5 class="font-semibold text-lg">Contact Us</h5>

            <div class="mt-4 text-sm text-gray-700 space-y-2">

                <p><i class="fa fa-phone mr-2"></i> +977-9761201177</p>
                <p><i class="fa fa-envelope mr-2"></i> nexora@gmail.com</p>
                <p><i class="fa fa-map-marker-alt mr-2"></i> Dhangadhi, Kailali</p>

            </div>
        </div>

        <!-- CUSTOMER SERVICE -->
        <div>
            <h5 class="font-semibold text-lg">Customer Service</h5>

            <div class="mt-4 text-sm text-gray-700 space-y-2">

                <p><i class="fa fa-phone mr-2"></i> +977-9709090017</p>
                <p><i class="fa fa-phone mr-2"></i> +977-9801104556</p>
                <p><i class="fa fa-phone mr-2"></i> +977-9802352615</p>

            </div>

            <!-- SOCIAL -->
            <div class="flex gap-3 mt-4 text-lg">

                <a href="#" class="text-blue-600 hover:scale-110 transition">
                    <i class="fab fa-facebook"></i>
                </a>

                <a href="#" class="text-pink-500 hover:scale-110 transition">
                    <i class="fab fa-instagram"></i>
                </a>

                <a href="#" class="text-black hover:scale-110 transition">
                    <i class="fab fa-tiktok"></i>
                </a>

                <a href="#" class="text-red-500 hover:scale-110 transition">
                    <i class="fab fa-youtube"></i>
                </a>

                <a href="#" class="text-blue-700 hover:scale-110 transition">
                    <i class="fab fa-linkedin"></i>
                </a>

            </div>
        </div>

    </div>

    <!-- BOTTOM BAR -->
    <div class="border-t py-4">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-600">

            <p>© 2026 Nexora. All Rights Reserved.</p>

            <!-- PAYMENTS -->
            <div class="flex gap-3">

                <img src="{{ asset('images/card.png') }}" class="w-12 rounded" alt="card">
                <img src="{{ asset('images/fonepay.png') }}" class="w-12 rounded" alt="fonepay">
                <img src="{{ asset('images/codpay.png') }}" class="w-12 rounded" alt="cod">

            </div>

        </div>
    </div>
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
</footer>

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">