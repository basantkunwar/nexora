<select name="category_id"
    class="w-full rounded-xl border border-slate-300  px-4 py-3">

    <option value="">Select Category</option>

    @foreach ($categories as $category)
        <option value="{{ $category->id }}"
            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach

</select>