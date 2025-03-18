<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Staff Schedule</h2>
                    
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Shift Type</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->employee->full_name }}</td>
                                    <td>{{ $schedule->shift_type }}</td>
                                    <td>{{ $schedule->start_time->format('Y-m-d H:i') }}</td>
                                    <td>{{ $schedule->end_time->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <a href="{{ route('schedules.edit', $schedule) }}" class="text-blue-600">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $schedules->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
