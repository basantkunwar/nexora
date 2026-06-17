<x-app-layout>

    <div class="max-w-4xl mx-auto">

      <form action="{{ route('sliders.update', $slider->id) }}') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-6">

    @csrf

    {{-- Title --}}
    <div>
        <label class="font-medium">Title</label>
        <input type="text"
               value="{{ $slider->title }}"
               name="title"
               class="w-full rounded-xl border-slate-300">
    </div>

    {{-- Subtitle --}}
    <div>
        <label class="font-medium">Subtitle</label>
        <textarea name="subtitle"
                  value=""
                  rows="3"
                  class="w-full rounded-xl border-slate-300">{{ $slider->subtitle }}</textarea>
    </div>

    {{-- Desktop Image --}}
    <div>
        <label class="font-medium">Desktop Image</label>

        <img id="desktopPreview"
             src="{{ asset('storage/'.$slider->desktop_image) }}"
             class="mt-2 w-full h-64 object-cover rounded-xl border">

        <input type="file"
               id="desktopImage"
               name="desktop_image"
               class="mt-3"
               accept="image/*">
    </div>

    {{-- Mobile Image --}}
    <div>
        <label class="font-medium">Mobile Image</label>

        <img id="mobilePreview"
             src="{{ asset('storage/'.($slider->mobile_image ?: $slider->desktop_image)) }}"
             class="mt-2 w-48 h-64 object-cover rounded-xl border">

        <input type="file"
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
               value="{{ $slider->button_text }}"
               placeholder="Shop Now"
               class="w-full rounded-xl border-slate-300">
    </div>

    {{-- Button Link --}}
    <div>
        <label class="font-medium">Button Link</label>
        <input type="url"
               name="button_link"
               value="{{ $slider->button_link }}"
               placeholder="https://example.com/products"
               class="w-full rounded-xl border-slate-300">
    </div>

    <div class="grid md:grid-cols-3 gap-4">

        {{-- Position --}}
        <div>
            <label>Position</label>
            <input type="number"
                   value="{{ $slider->position }}"
                   name="position"
                   value="0"
                   class="w-full rounded-xl border-slate-300">
        </div>

        {{-- Text Alignment --}}
        <div>
            <label>Text Alignment</label>
            <select name="text_alignment"
                    class="w-full rounded-xl border-slate-300">
                <option value="left"{{ $slider->text_alignment == 'left' ? 'selected' : '' }}>Left</option>
                <option value="center" {{ $slider->text_alignment == 'center' ? 'selected' : '' }}>Center</option>
                <option value="right" {{ $slider->text_alignment == 'right' ? 'selected' : '' }}>Right</option>
            </select>
        </div>

        {{-- Text Color --}}
        <div>
            <label>Text Color</label>
            <select name="text_color"
                    class="w-full rounded-xl border-slate-300">
                <option value="white" {{ $slider->text_color == 'white' ? 'selected' : '' }}>White</option>
                <option value="black"   {{ $slider->text_color == 'black' ? 'selected' : '' }}>Black</option>
                <option value="green"{{ $slider->text_color == 'green' ? 'selected' : '' }}>green</option>
                <option value="red"{{ $slider->text_color == 'red' ? 'selected' : '' }}>red</option>
                <option value="blue"{{ $slider->text_color == 'blue' ? 'selected' : '' }}>blue</option>
                <option value="yellow"{{ $slider->text_color == 'yellow' ? 'selected' : '' }}>yellow</option>
                <option value="orange"{{ $slider->text_color == 'orange' ? 'selected' : '' }}>orange</option>
                <option value="purple"{{ $slider->text_color == 'purple' ? 'selected' : '' }}>purple</option>
                <option value="pink"{{ $slider->text_color == 'pink' ? 'selected' : '' }}>pink</option>
                <option value="brown"{{ $slider->text_color == 'brown' ? 'selected' : '' }}>brown</option>
                <option value="gray"{{ $slider->text_color == 'gray' ? 'selected' : '' }}>gray</option>
                <option value="custom"{{ $slider->text_color == 'custom' ? 'selected' : '' }}>custom</option>
            </select>
        </div>

    </div>

    <div class="grid md:grid-cols-2 gap-4">

        <div>
            <label>Start Date</label>
            <input type="datetime-local"
                   name="start_at"
                   value="{{ $slider->start_at }}"
                   class="w-full rounded-xl border-slate-300">
        </div>

        <div>
            <label>End Date</label>
            <input type="datetime-local"
                   name="end_at"
                   value="{{ $slider->end_at }}"
                   class="w-full rounded-xl border-slate-300">
        </div>

    </div>

    <div>
        <label class="inline-flex items-center gap-2">
            <input type="checkbox"
                   name="status"
                   value="{{ $slider->status }}"
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