<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class PermissionController extends Controller
{
   public function index()
   {
       $permissions = QueryBuilder::for(Permission::class)
           ->defaultSort('name')
           ->allowedSorts(['id', 'name', 'created_at', 'updated_at'])
           ->allowedFilters(['name'])
           ->paginate()
           ->withQueryString();

       return view('admin.permissions.index', [
           'permissions' => SpladeTable::for($permissions)
               ->defaultSort('name')
               ->column('id', sortable: true)
               ->column('name', sortable: true, searchable: true, canBeHidden: false )
               ->column('created_at', sortable: true)
               ->column('updated_at', sortable: true)
               ->column('action'),

            'title' => 'Permissions'
       ]);
   }

   public function show(Permission $permission)
   {
       return view('admin.permissions.show', [
           'permission' => $permission,
           'title' => 'Show permissions'
       ]);
   }

   public function create()
   {
       return view('admin.permissions.create', [
            'title' => 'Create permissions'
       ]);
   }

   public function store(Request $request)
   {
       $data = $request->validate([
           'name' =>  ['required', 'min:3', 'string'],
       ]);

       Permission::create($data);

       Splade::toast('New permission added!')->autoDismiss(5);

       return redirect()->route('admin.permissions.index');
   }

   public function edit(Permission $permission)
   {
       return view('admin.permissions.edit', [
           'permission' => $permission,
           'title' => 'Edit permissions'
       ]);
   }

   public function update(Request $request, Permission $permission)
   {
       $data = $request->validate([
           'name' =>  ['required', 'string'],
       ]);

       $permission->update($data);

       Splade::toast('Permission update!')->autoDismiss(5);

       return redirect()->route('admin.permissions.index');
   }

   public function destroy(Permission $permission)
   {
        $permission->delete();

        Splade::toast('The Permission deleted!')->autoDismiss(5);

        return redirect()->route('admin.permissions.index');
   }
}
