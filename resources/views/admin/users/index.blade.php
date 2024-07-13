<x-layouts.admin>
    <div class="page">
        <div class="section-table not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
            <div class="container relative rounded-xl overflow-auto">
                <div class="shadow-sm overflow-hidden my-4">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b dark:border-slate-600 font-medium p-2 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Name</th>
                                <th class="border-b dark:border-slate-600 font-medium p-2 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Email</th>
                                <th class="border-b dark:border-slate-600 font-medium p-2 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Date</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white dark:bg-slate-800">
                            @foreach ($items as $value)
                                <tr>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-2 pl-8 text-slate-500 dark:text-slate-400">{{ $value->name }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-2 pl-8 text-slate-500 dark:text-slate-400 break-all">{{ $value->email }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-2 pl-8 text-slate-500 dark:text-slate-400 break-all">{{ $value->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="p-2 flex justify-content-center">
                        {{ $items->links() }}
                    </div>
                </div>
                <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5">
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
