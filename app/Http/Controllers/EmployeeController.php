<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = Employee::with('department')->get();
        return view('employee.index', [
            'employees' => $employees,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();

        return view('employee.create', [
            'departments' => $departments,
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg|max:5048',
                'name' => 'required|string',
                'email' => 'required|email',
                'about' => 'required',
                'roles_id' => 'required',
                'department_id' => 'required',
                // 'permission' => 'required',
            ]);

        //first args is folder and second args is "disk"
        // $image = $request->file('image_path')->store('img');
        // $request->merge(['image_path' => $image]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $addEmployee = Employee::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'about' => $request->about,
                'roles_id' => $request->roles_id,
                'department_id' => $request->department_id,
                'image_path' => $newImageName,
            ]
        );

        // $permission = Permission::create(
        //     [
        //         'name' => $request->permission,
        //     ]
        // );
        // $permission = new Permission();
        // $permission->givePermissionTo($request->permission);

        return redirect()->route('employee.index')
            ->with('success', 'Employee has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::all();
        $employee = Employee::find($id);

        return view('employee.show', [
            'employee' => $employee,
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.update', [
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->image);

        $request->validate(
            [
                // 'image' => 'required|mimes:jpeg,png,jpg|max:5048',
                'name' => 'required|string',
                'email' => 'required|email',
                'about' => 'required',
            ]);

        $employee = Employee::find($id);

        if ($request->hasFile('file')) {
            //if user request to change new image:png
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $newImageName);

        }

        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->about = $request->input('about');
        $employee->update();

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employee::find($id);

        $employees->delete();

        return redirect()->route('employee.index');

    }

    public function assignRole(Request $request, $id)
    {

        $employee = Employee::find($id);
        $employee->assignRole($request->role);
        $employee->save();

        return redirect()->route('employee.index');

    }
}
