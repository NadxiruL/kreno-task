<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('employee.create') }}"><button class="btn btn-primary">Add Employee </button></a>
                    <table class="table mt-3">

                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Department</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>

                                    <td><a style=" color:blue;"
                                            href="{{ route('employee.show', $employee->id) }}">{{ $employee->name }}</a>
                                    </td>
                                    <td>{{ $employee->email }}</td>


                                    <td>{{ $employee->department->name ?? '' }}</td>

                                    <td>
                                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('are you sure you want to delete {{ $employee->name }}? ') ">
                                            @csrf
                                            @method('delete')


                                            <button class="btn btn-danger">Delete</button>
                                        </form>

                                        <a href="{{ route('employee.edit', $employee->id) }}"
                                            class="btn btn-secondary">Edit</a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
