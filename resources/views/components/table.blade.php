 <div {{ $attributes->merge(['class' => 'not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25']) }}>
    <div class="relative rounded-xl overflow-auto">
        <div class="shadow-sm overflow-hidden my-4">
            @if (isset($options))
                <table class="border-collapse table-auto w-full text-sm">
                    <thead>
                        <tr>
                            <th class="border-b dark:border-slate-600 font-medium p-2 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Key</th>
                            <th class="border-b dark:border-slate-600 font-medium p-2 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Value</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white dark:bg-slate-800">
                        @foreach ($options as $key => $value)
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-2 pl-8 text-slate-500 dark:text-slate-400">{{ $key }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-2 pl-8 text-slate-500 dark:text-slate-400 break-all">{{ $value ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <table class="border-collapse table-auto w-full text-sm">
                    @if (isset($columns))
                        <thead>
                            <tr>
                                @foreach ($columns as $column)
                                    <th class="border-b dark:border-slate-600 font-medium p-2 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">{{ $column }}</th>
                                @endforeach
                            </tr>
                        </thead>
                    @endif

                    <tbody class="bg-white dark:bg-slate-800">
                        @foreach ($records as $record)
                            <tr>
                                @if (isset($columns))
                                    @foreach ($columns as $index => $column)
                                        <td class="border-b border-slate-100 dark:border-slate-700 p-2 pl-8 text-slate-500 dark:text-slate-400 break-all">{!! isset($record[$index]) ? $record[$index] : '' !!}</td>
                                    @endforeach
                                @else
                                    @foreach ($record as $value)
                                        <td class="border-b border-slate-100 dark:border-slate-700 p-2 pl-8 text-slate-500 dark:text-slate-400 break-all">{!! $value !!}</td>
                                    @endforeach
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
    </div>
</div>
