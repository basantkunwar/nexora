<x-app-layout>
<div class="max-w-7xl mx-auto p-6">

    <div class="bg-white rounded-2xl shadow border border-slate-200">

        <div class="flex items-center justify-between p-6 border-b">
            <h2 class="text-2xl font-bold text-slate-800">
                user exprence
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-200">

                <thead class="bg-slate-100">
                    <tr>
                        <th class="px-6 py-3 text-left">sn</th>
                        <th class="px-6 py-3 text-left">Full Name</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Phone</th>
                        <th class="px-6 py-3 text-left">Subject</th>
                        <th class="px-6 py-3 text-left">Message</th>
                        <th class="px-6 py-3 text-left">Date</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse($contacts as $contact)

                        <tr class="hover:bg-slate-50">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $contact->fullname }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $contact->email }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $contact->number }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $contact->topic }}
                            </td>

                            <td class="px-6 py-4 max-w-sm">
                                {{ Str::limit($contact->message, 60) }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $contact->created_at->format('d M Y') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center py-8 text-slate-500">
                                No feedback available.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
</x-app-layout>