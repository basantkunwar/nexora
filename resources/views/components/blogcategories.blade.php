<div>
    <label class="block text-sm font-semibold text-slate-700 mb-2">
        category Name
    </label>

    <select name="blogcategory_id"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

        <option value="" disabled selected>
            Select category
        </option>

        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ $category->id==$category->id ? 'selected' : ''}}>
                {{ $category->name }}
            </option>
        @endforeach

    </select>
</div>