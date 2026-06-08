<x-app-layout>

<div class="max-w-6xl mx-auto py-10 px-4">

    <h2 class="text-3xl font-bold mb-2">⚙️ Admin Settings</h2>
    <p class="text-gray-500 mb-6">Full control of your website & ecommerce configuration</p>

    @if(session('success'))
        <div class="mb-4 text-green-600 font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- TABS WRAPPER -->
    <div class="bg-white shadow-xl rounded-2xl p-6">

        <!-- TAB BUTTONS -->
        <div class="flex flex-wrap gap-3 border-b mb-6">

            <button type="button" onclick="openTab('general', this)" class="tab-btn active-tab">General</button>
            <button type="button" onclick="openTab('branding', this)" class="tab-btn">Branding</button>
            <button type="button" onclick="openTab('social', this)" class="tab-btn">Social</button>
            <button type="button" onclick="openTab('seo', this)" class="tab-btn">SEO</button>
            <button type="button" onclick="openTab('ecommerce', this)" class="tab-btn">E-commerce</button>

        </div>

        <form method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- GENERAL -->
            <div id="general" class="tab-content space-y-4">

                <input type="text" name="name"
                       value="{{ settings('name') }}"
                       class="border p-3 rounded-lg w-full"
                       placeholder="Site Name">

                <input type="text" name="project"
                       value="{{ settings('project') }}"
                       class="border p-3 rounded-lg w-full"
                       placeholder="Project Name">

                <input type="email" name="email"
                       value="{{ settings('email') }}"
                       class="border p-3 rounded-lg w-full"
                       placeholder="Email">

                <input type="text" name="address"
                       value="{{ settings('address') }}"
                       class="border p-3 rounded-lg w-full"
                       placeholder="Address">

                <input type="text" name="phone"
                       value="{{ settings('phone') }}"
                       class="border p-3 rounded-lg w-full"
                       placeholder="number">

                <textarea name="description"
                          class="border p-3 rounded-lg w-full"
                          placeholder="Description">{{ settings('description') }}</textarea>

            </div>

            <!-- BRANDING -->
            <div id="branding" class="tab-content hidden space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div>
                        <label>Logo</label>
                        <input type="file" name="logo" class="hidden" id="logoInput">
                        <img src="{{ settings('logo') ? asset('storage/'.settings('logo')) : 'https://via.placeholder.com/150' }}"
                             class="h-24 border rounded-lg cursor-pointer"
                             onclick="logoInput.click()">
                    </div>

                    <div>
                        <label>Favicon</label>
                        <input type="file" name="favicon" class="hidden" id="faviconInput">
                        <img src="{{ settings('favicon') ? asset('storage/'.settings('favicon')) : 'https://via.placeholder.com/150' }}"
                             class="h-24 border rounded-lg cursor-pointer"
                             onclick="faviconInput.click()">
                    </div>

                    <div>
                        <label>Banner</label>
                        <input type="file" name="banner" class="hidden" id="bannerInput">
                        <img src="{{ settings('banner') ? asset('storage/'.settings('banner')) : 'https://via.placeholder.com/300x150' }}"
                             class="h-24 border rounded-lg cursor-pointer w-full object-cover"
                             onclick="bannerInput.click()">
                    </div>

                </div>

            </div>

            <!-- SOCIAL -->
            <div id="social" class="tab-content hidden space-y-4">

                <input type="text" name="facebook" value="{{ settings('facebook') }}" class="border p-3 rounded-lg w-full" placeholder="Facebook">
                <input type="text" name="instagram" value="{{ settings('instagram') }}" class="border p-3 rounded-lg w-full" placeholder="Instagram">
                <input type="text" name="twitter" value="{{ settings('twitter') }}" class="border p-3 rounded-lg w-full" placeholder="Twitter">
                <input type="text" name="youtube" value="{{ settings('youtube') }}" class="border p-3 rounded-lg w-full" placeholder="YouTube">
                 <input type="text" name="ticktok" value="{{ settings('ticktok') }}" class="border p-3 rounded-lg w-full" placeholder="LinkedIn">
            </div>

            <!-- SEO -->
            <div id="seo" class="tab-content hidden space-y-4">

                <input type="text" name="meta" value="{{ settings('meta') }}" class="border p-3 rounded-lg w-full" placeholder="Meta Title">

                <textarea name="meta_description" class="border p-3 rounded-lg w-full" placeholder="Meta Description">{{ settings('meta_description') }}</textarea>

                <input type="text" name="keywords" value="{{ settings('keywords') }}" class="border p-3 rounded-lg w-full" placeholder="Keywords">

            </div>

            <!-- E-COMMERCE SETTINGS -->
            <div id="ecommerce" class="tab-content hidden space-y-6">

                <h3 class="text-xl font-semibold">🛒 Banner Settings</h3>

                <!-- HOME BANNERS -->
                <div>
                        <label>Home Banner 1</label>
                        <input type="file" name="home_banner1" class="hidden" id="home_Banner1Input">
                        <img src="{{ settings('home_banner1') ? asset('storage/'.settings('home_banner1')) : 'https://via.placeholder.com/150' }}"
                             class="h-24 border rounded-lg cursor-pointer"
                             onclick="home_Banner1Input.click()">
                    </div>
<div>
                        <label>Home Banner 2</label>
                        <input type="file" name="home_banner2" class="hidden" id="home_Banner2Input">
                        <img src="{{ settings('home_banner2') ? asset('storage/'.settings('home_banner2')) : 'https://via.placeholder.com/150' }}"
                             class="h-24 border rounded-lg cursor-pointer"
                             onclick="home_Banner2Input.click()">
                    </div>
<div>
                        <label>Home Banner 3</label>
                        <input type="file" name="home_banner3" class="hidden" id="home_Banner3Input">
                        <img src="{{ settings('home_banner3') ? asset('storage/'.settings('home_banner3')) : 'https://via.placeholder.com/150' }}"
                             class="h-24 border rounded-lg cursor-pointer"
                             onclick="home_Banner3Input.click()">
                    </div>
<div>
                        <label>offer Banner</label>
                        <input type="file" name="offer_banner" class="hidden" id="offer_BannerInput">
                        <img src="{{ settings('offer_banner') ? asset('storage/'.settings('offer_banner')) : 'https://via.placeholder.com/150' }}"
                             class="h-24 border rounded-lg cursor-pointer"
                             onclick="offer_BannerInput.click()">
                    </div>
                <div>
                        <label>footer Banner</label>
                        <input type="file" name="footer_banner" class="hidden" id="footer_BannerInput">
                        <img src="{{ settings('footer_banner') ? asset('storage/'.settings('footer_banner')) : 'https://via.placeholder.com/150' }}"
                             class="h-24 border rounded-lg cursor-pointer"
                             onclick="footer_BannerInput.click()">
                    </div>
            </div>

            <!-- SAVE -->
            <div class="mt-6">
                <button class="bg-black text-white px-6 py-3 rounded-xl hover:bg-gray-800">
                    Save Settings
                </button>
            </div>

        </form>
    </div>

</div>

<!-- TAB SCRIPT -->
<script>
function openTab(tab, btn) {

    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.getElementById(tab).classList.remove('hidden');

    document.querySelectorAll('.tab-btn').forEach(el => {
        el.classList.remove('active-tab');
    });

    btn.classList.add('active-tab');
}
</script>

<!-- STYLE -->
<style>
.tab-btn {
    padding: 8px 14px;
    border-radius: 8px;
    background: #f3f4f6;
    font-weight: 500;
}

.active-tab {
    background: black;
    color: white;
}
</style>

</x-app-layout>