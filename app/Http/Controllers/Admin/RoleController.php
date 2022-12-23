<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class RoleController extends Controller
{
    public function index()
    {
        $roles = QueryBuilder::for(Role::class)
            ->whereNotIn('name', ['admin'] )
            ->defaultSort('name')
            ->allowedSorts(['id', 'name', 'created_at', 'updated_at'])
            ->allowedFilters(['name'])
            ->paginate()
            ->withQueryString();

        return view('admin.roles.index', [
            'roles' => SpladeTable::for($roles)
                ->defaultSort('name')
                ->column('id', sortable: true )
                ->column('name', sortable: true, searchable: true, canBeHidden: false )
                ->column('created_at', sortable: true)
                ->column('updated_at', sortable: true)
                ->column('action'),

            'title' => 'Roles'
        ]);
    }

    public function create()
    {
        return view('admin.roles.create', [
            'title' => 'Create role'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>  ['required', 'min:3', 'string'],
        ]);

        Role::create($data);

        Splade::toast('New role added!')->autoDismiss(5);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'title' => 'Edit role'
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' =>  ['required', 'string'],
        ]);

        $role->update($data);

        Splade::toast('Role update!')->autoDismiss(5);

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', [
            'role' => $role,
            'title' => 'Show role '
        ]);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        Splade::toast('The Role deleted!')->autoDismiss(5);

        return redirect()->route('admin.roles.index');
    }
}
