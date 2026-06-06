<div>
    <label class="block text-sm font-semibold text-slate-700 mb-2">
        tag Name
    </label>

    <select name="blogtag_id"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

        <option value="" disabled selected>
            Select tag
        </option>

        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}"
                {{ $tag->id==$tag->id? 'selected' : ''}}>
                {{ $tag->name }}
            </option>
        @endforeach

    </select>
</div>