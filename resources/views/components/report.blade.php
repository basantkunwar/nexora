<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition">

    <div class="flex items-center justify-between mb-5">

        <div>
            <h3 class="text-lg font-semibold text-slate-800">
                {{ $title }}
            </h3>

            @isset($subtitle)
                <p class="text-sm text-gray-500 mt-1">
                    {{ $subtitle }}
                </p>
            @endisset
        </div>

        <div
            class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">

            <i class="{{ $icon }} text-blue-600"></i>

        </div>

    </div>

    <div class="relative h-64">

        <canvas id="{{ $id }}"></canvas>

    </div>

</div>