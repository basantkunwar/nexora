<div>
    <label class="block text-sm font-semibold text-slate-700 mb-2">
        Brand Name
    </label>

    <select name="brand_id"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

        <option value="" disabled selected>
            Select Brand
        </option>

        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}"
                {{ old('brand_id')}}>
                {{ $brand->name }}
            </option>
        @endforeach

    </select>
</div>