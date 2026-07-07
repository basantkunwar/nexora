<x-app-layout>

    <div class="max-w-4xl mx-auto">

      <form action="{{ route('sliders.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-6">

    @csrf

    {{-- Title --}}
    <div>
        <label class="font-medium">Title</label>
        <input type="text"
               value="{{old('title')}}"
               name="title"
               class="w-full rounded-xl border-slate-300" required>
    </div>

    {{-- Subtitle --}}
    <div>
        <label class="font-medium">Subtitle</label>
        <textarea name="subtitle" required
                  rows="3"
                  class="w-full rounded-xl border-slate-300">{{old('subtitle')}}</textarea>
    </div>

    {{-- Desktop Image --}}
    <div>
        <label class="font-medium">Desktop Image</label>

        <img id="desktopPreview"
             src="https://placehold.co/1200x500?text=Desktop+Banner"
             class="mt-2 w-full h-64 object-cover rounded-xl border">

        <input type="file"
               id="desktopImage"
               value="{{old('desktop_image')}}"
               name="desktop_image"
               class="mt-3" 
               required
               accept="image/*">
    </div>

    {{-- Mobile Image --}}
    <div>
        <label class="font-medium">Mobile Image</label>

        <img id="mobilePreview"
             src="https://placehold.co/500x700?text=Mobile+Banner"
             class="mt-2 w-48 h-64 object-cover rounded-xl border">

        <input type="file"
               value="{{old('mobile_image')}}"
               required
               id="mobileImage"
               name="mobile_image"
               class="mt-3"
               accept="image/*">
    </div>

    {{-- Button Text --}}
    <div>
        <label class="font-medium">Button Text</label>
        <input type="text"
               name="button_text"
               value="{{old('button_text')}}"

               placeholder="Shop Now"
               class="w-full rounded-xl border-slate-300">
    </div>

    {{-- Button Link --}}
    <div>
        <label class="font-medium">Button Link</label>
        <input type="url"
               name="button_link"
               value="{{old('button_link')}}"
               required
               placeholder="https://example.com/products"
               class="w-full rounded-xl border-slate-300">
    </div>

    <div class="grid md:grid-cols-3 gap-4">

        {{-- Position --}}
        <div>
            <label>Position</label>
            <input type="number"
            value="{{old('position')}}"
                   name="position"
                   value="0"
                   class="w-full rounded-xl border-slate-300">
        </div>

        {{-- Text Alignment --}}
        <div>
            <label>Text Alignment</label>
            <select name="text_alignment" required 
                    class="w-full rounded-xl border-slate-300">
                <option value="left">Left</option>
                <option value="center">Center</option>
                <option value="right">Right</option>
            </select>
        </div>

        {{-- Text Color --}}
        <div>
            <label>Text Color</label>
            <select name="text_color" required
                    class="w-full rounded-xl border-slate-300">
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="green">green</option>
                <option value="red">red</option>
                <option value="blue">blue</option>
                <option value="yellow">yellow</option>
                <option value="orange">orange</option>
                <option value="purple">purple</option>
                <option value="pink">pink</option>
                <option value="brown">brown</option>
                <option value="gray">gray</option>
                <option value="custom">custom</option>
            </select>
        </div>

    </div>

    <div class="grid md:grid-cols-2 gap-4">

        <div>
            <label>Start Date</label>
            <input type="datetime-local"
            value="{{old('start_at')}}"
                   name="start_at"
                   class="w-full rounded-xl border-slate-300" required>
        </div>

        <div>
            <label>End Date</label>
            <input type="datetime-local"
                   name="end_at"
                   value="{{old('end_at')}}"
                   class="w-full rounded-xl border-slate-300" required>
        </div>

    </div>

    <div>
        <label class="inline-flex items-center gap-2">
            <input type="checkbox"
                   name="status"
                   value="1"
                   {{old('status', 1) == 1 ? 'checked' : ''}}
                   checked>
            <span>Active</span>
        </label>
    </div>

    <button type="submit"
            class="px-6 py-3 bg-blue-600 text-white rounded-xl">
        Save Slider
    </button>

</form>
    </div>

</x-app-layout>

<script>
document.getElementById('image').addEventListener('change', function(e) {

    let file = e.target.files[0];

    if(file) {
        document.getElementById('preview').src =
            URL.createObjectURL(file);
    }

});
</script>