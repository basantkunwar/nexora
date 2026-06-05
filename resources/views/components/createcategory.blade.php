<div>
    <label class="block text-sm font-semibold text-slate-700 mb-2">
        Product Category
    </label>

    <select name="category_id"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

        <option value="" disabled selected>
            Select Category
        </option>

        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id')}}>
                {{ $category->name }}
            </option>
        @endforeach

    </select>
</div>