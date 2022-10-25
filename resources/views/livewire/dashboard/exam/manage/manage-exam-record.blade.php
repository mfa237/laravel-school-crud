<div class="h-full bg-gray-200 p-8">
<div class="mt-8 min-h-screen">
    @livewire('livewire-toast')
    <div class="bg-white rounded-lg px-8 py-6 my-16 overflow-x-scroll custom-scrollbar">
        <div class="mt-8 min-h-screen">
        <div class="flex justify-between">
        <div class="text-2xl">Exam_Records</div>
    </div>

    <div class="mt-6">
        <div class="flex justify-between">
            <div class="flex">
                <x-tall-crud-input-search />
            </div>
            <div class="flex">

                <x-tall-crud-page-dropdown />
            </div>
        </div>
        <table class="w-full whitespace-no-wrap mt-4 shadow-2xl" wire:loading.class.delay="opacity-50">
            <thead>
                <tr class="bg-secondary text-gray-100 font-bold">
                <td class="px-3 py-2 capitalize" >
                    <div class="flex items-center">
                        <button wire:click="sortBy('id')">Id</button>
                        <x-tall-crud-sort-icon sortField="id" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </td>
                <td class="px-3 py-2 capitalize" >Section</td>
                <td class="px-3 py-2 capitalize" >Marks</td>
                <td class="px-3 py-2 capitalize" >Classes</td>
                <td class="px-3 py-2 capitalize" >Exams</td>
                <td class="px-3 py-2 capitalize" >Subjects</td>
                <td class="px-3 py-2 capitalize" >Students</td>
                <td class="px-3 py-2 capitalize" >Semester</td>
                <td class="px-3 py-2 capitalize" >Actions</td>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-400">
            @foreach($results as $result)
                <tr class="hover:bg-blue-300 {{ ($loop->even ) ? "bg-blue-100" : ""}}">
                    <td class="px-3 py-2 capitalize" >{{ $result->id }}</td>
                    <td class="px-3 py-2 capitalize" >{{ $result->section_id }}</td>
                    <td class="px-3 py-2 capitalize" >{{ $result->marks }}</td>
                    <td class="px-3 py-2 capitalize" >{{ $result->classes?->class_name }}</td>
                    <td class="px-3 py-2 capitalize" >{{ $result->exams?->name }}</td>
                    <td class="px-3 py-2 capitalize" >{{ $result->subjects?->name }}</td>
                    <td class="px-3 py-2 capitalize" >{{ $result->students?->admission_no }}</td>
                    <td class="px-3 py-2 capitalize" >{{ $result->semester?->name }}</td>
                    <td class="px-3 py-2 capitalize" >
                        <button type="submit" wire:click="$emitTo('dashboard.exam.manage.manage-exam-record-child', 'showEditForm', {{ $result->id}});" class="text-green-500">
                            <x-tall-crud-icon-edit />
                        </button>
                    </td>
               </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $results->links() }}
    </div>
    @livewire('dashboard.exam.manage.manage-exam-record-child')
</div>
</div>
</div>
</div>