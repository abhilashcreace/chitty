<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    //Branch Listing
    public function index()
    {
        $branches = Branch::orderBy('id', 'ASC')->where('status', '!=', 2)->get();
        return view('admin/branch.index', compact('branches'));
    }

    //Create
    public function create()
    {
        return view('admin/branch.create');
    }

    //Save
    public function save(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'branch_code' => 'nullable|unique:branches',
            'address' => 'required',
        );
        $messages = array(
            'name.required' => 'Branch name is required',
            'branch_code.unique' => 'Code already registered.',
            'address.required' => 'Address is required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {


            $data['uuid'] = Str::uuid();
            $data['name'] = $request->name;
            $data['branch_code'] = $request->branch_code;
            $data['address'] = $request->address;

            $inserted_data = Branch::create($data);
            return redirect('admin/branch-manage')->with('success', 'Branch Created Succesfully');
        }
    }

    //Edit
    public function edit($id)
    {
        $branch = Branch::where('uuid', '=', $id)->first();
        return view('admin/branch.edit', compact('branch'));
    }

    //Update
    public function update(Request $request, $id)
    {
        $branch = Branch::where('uuid', '=', $id)->first();

        $rules = array(
            'name' => 'required',
            'branch_code' => 'nullable|unique:branches,branch_code, ' . $branch->id,
            'address' => 'required',
        );
        $messages = array(
            'name.required' => 'Branch name is required',
            'branch_code.unique' => 'Code already registered.',
            'address.required' => 'Address is required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {


            $update_data['name'] = $request->name;
            $update_data['branch_code'] = $request->branch_code;
            $update_data['address'] = $request->address;
            $update_data['updated_at'] = date('Y-m-d H:i:s');

            DB::table('branches')
                ->where('uuid', $id)
                ->update($update_data);

            return redirect('admin/branch-manage')->with('success', 'Branch Updated Succesfully');
        }
    }

    //Change Status
    public function changeStatus($id)
    {
        if ($id != '') {

            $branch = Branch::orderBy('id', 'DESC')->where('uuid',  $id)->first();

            if ($branch->status == 1) {
                $update_data['status'] = 0;
            } else {
                $update_data['status'] = 1;
            }
            $update_data['updated_at'] = date('Y-m-d H:i:s');

            DB::table('branches')
                ->where('uuid', $id)
                ->update($update_data);
        }
    }

    //Delete
    public function delete($id)
    {
        if ($id != '') {

            $update_data['status'] = 2;
            $update_data['updated_at'] = date('Y-m-d H:i:s');

            DB::table('branches')
                ->where('uuid', $id)
                ->update($update_data);
        }
    }
}