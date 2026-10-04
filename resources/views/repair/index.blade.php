@role('admin|super-admin|manager')
<x-app-layout>
<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="bg-white rounded-2xl shadow border border-slate-200 overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200">
            <h2 class="text-2xl font-bold text-slate-800">
                Repair Bookings
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">

                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="px-5 py-3">#</th>
                        <th class="px-5 py-3">Full Name</th>
                        <th class="px-5 py-3">Phone</th>
                        <th class="px-5 py-3">Email</th>
                        <th class="px-5 py-3">Device</th>
                        <th class="px-5 py-3">Brand</th>
                        <th class="px-5 py-3">Repair Type</th>
                        <th class="px-5 py-3">Address</th>
                        <th class="px-5 py-3">Issue</th>
                        <th class="px-5 py-3">Submitted</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse($repairs as $repair)
                        <tr class="hover:bg-slate-50">

                            <td class="px-5 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $repair->fullname }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $repair->phone }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $repair->email }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $repair->device_name }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $repair->brand_name }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $repair->repair_type }}
                            </td>

                            <td class="px-5 py-4 max-w-xs">
                                {{ $repair->address }}
                            </td>

                            <td class="px-5 py-4 max-w-sm">
                                {{ $repair->info }}
                            </td>

                            <td class="px-5 py-4 whitespace-nowrap">
                                {{ $repair->created_at->format('d M Y') }}
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="py-10 text-center text-slate-500">
                                No repair bookings found.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>
</x-app-layout>
@endrole