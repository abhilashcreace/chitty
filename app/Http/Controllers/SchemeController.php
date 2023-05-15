<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use App\Models\SchemeList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SchemeController extends Controller
{
    //Scheme Listing
    public function index()
    {
        $schemes = Scheme::orderBy('id', 'ASC')->where('status', '!=', 2)->get();
        return view('admin/scheme.index', compact('schemes'));
    }

    //Create
    public function create()
    {
        return view('admin/scheme.create');
    }

    //Save
    public function save(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'scheme_code' => 'nullable|unique:schemes',
            'amount' => 'required|numeric',
            'months' => 'required|numeric',
        );
        $messages = array(
            'name.required' => 'Scheme name is required',
            'scheme_code.unique' => 'Code already registered.',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Please enter valid amount',
            'months.required' => 'Months is required',
            'months.numeric' => 'Please enter valid months count',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            $data['uuid'] = Str::uuid();
            $data['name'] = $request->name;
            $data['scheme_code'] = $request->scheme_code;
            $data['amount'] = $request->amount;
            $data['months'] = $request->months;
            $inserted_data = Scheme::create($data);
            return redirect('admin/scheme-manage')->with('success', 'Scheme Created Succesfully');
        }
    }

    //Edit
    public function edit($id)
    {
        $scheme = Scheme::where('uuid', '=', $id)->first();
        return view('admin/scheme.edit', compact('scheme'));
    }

    //Update
    public function update(Request $request, $id)
    {

        $scheme = Scheme::where('uuid', '=', $id)->first();

        $rules = array(
            'name' => 'required',
            'scheme_code' => 'nullable|unique:schemes,scheme_code, ' . $scheme->id,
            'amount' => 'required|numeric',
            'months' => 'required|numeric',
        );
        $messages = array(
            'name.required' => 'Scheme name is required',
            'scheme_code.unique' => 'Code already registered.',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Please enter valid amount',
            'months.required' => 'Months is required',
            'months.numeric' => 'Please enter valid months count',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            $update_data['name'] = $request->name;
            $update_data['scheme_code'] = $request->scheme_code;
            $update_data['amount'] = $request->amount;
            $update_data['months'] = $request->months;
            $update_data['updated_at'] = date('Y-m-d H:i:s');

            DB::table('schemes')
                ->where('uuid', $id)
                ->update($update_data);

            return redirect('admin/scheme-manage')->with('success', 'Scheme Updated Succesfully');
        }
    }

    //Change Status
    public function changeStatus($id)
    {
        if ($id != '') {

            $scheme = Scheme::orderBy('id', 'DESC')->where('uuid',  $id)->first();

            if ($scheme->status == 1) {
                $update_data['status'] = 0;
            } else {
                $update_data['status'] = 1;
            }
            $update_data['updated_at'] = date('Y-m-d H:i:s');

            DB::table('schemes')
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

            DB::table('schemes')
                ->where('uuid', $id)
                ->update($update_data);
        }
    }

    //Create list
    public function createList(Request $request, $id)
    {
        $uuid = $id;

        $scheme = Scheme::where('uuid', '=', $id)->first();

        $max_month = SchemeList::where('scheme_id', $scheme->id)->where('status', 1)->max('month');

        return view('admin/scheme.listCreate', compact('uuid', 'max_month'));
    }

    //List save
    public function listSave(Request $request, $id)
    {
        $scheme = Scheme::where('uuid', '=', $id)->first();

        if ($scheme->id != '') {


            $rules = array(
                'month' => 'required|numeric',
                'subs' => 'required|numeric',
                'cum' => 'required|numeric',
            );
            $messages = array(
                'month.required' => 'Month is required',
                'month.numeric' => 'Please enter valid month count',
                'subs.required' => 'Amount is required',
                'subs.numeric' => 'Please enter valid amount',
                'cum.required' => 'Months is required',
                'cum.numeric' => 'Please enter valid cum count',
            );

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            } else {

                $data['uuid'] = Str::uuid();
                $data['scheme_id'] = $scheme->id;
                $data['month'] = $request->month;
                $data['subs'] = $request->subs;
                $data['cum'] = $request->cum;
                $inserted_data = SchemeList::create($data);
                return redirect('admin/scheme-manage')->with('success', 'Scheme Created Succesfully');
            }
        }
    }

    //List Edit
    public function listEdit($id)
    {
        $schemelist = SchemeList::where('uuid', '=', $id)->first();
        return view('admin/scheme.listEdit', compact('schemelist'));
    }

    //List Update
    public function listUpdate(Request $request, $id)
    {

        $schemelist = SchemeList::where('uuid', '=', $id)->first();


        $rules = array(
            'month' => 'required|numeric',
            'subs' => 'required|numeric',
            'cum' => 'required|numeric',
        );
        $messages = array(
            'month.required' => 'Month is required',
            'month.numeric' => 'Please enter valid month count',
            'subs.required' => 'Amount is required',
            'subs.numeric' => 'Please enter valid amount',
            'cum.required' => 'Months is required',
            'cum.numeric' => 'Please enter valid cum count',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            $update_data['scheme_id'] = $request->scheme_id;
            $update_data['month'] = $request->month;
            $update_data['subs'] = $request->subs;
            $update_data['cum'] = $request->cum;
            $update_data['updated_at'] = date('Y-m-d H:i:s');

            DB::table('scheme_list')
                ->where('uuid', $id)
                ->update($update_data);

            return redirect('admin/scheme-manage')->with('success', 'Scheme List Updated Succesfully');

        }
    }

    //List View
    public function listView($id)
    {
        
        $scheme = Scheme::where('uuid', '=', $id)->first();

        $schemeList = SchemeList::orderBy('id', 'ASC')->where('scheme_id', $scheme->id)->where('status', '!=', 2)->get();

        return view('admin/scheme.listView', compact('scheme', 'schemeList'));
    }

    //Change List Status
    public function listChangeStatus($id)
    {
        if ($id != '') {

            $schemelist = SchemeList::orderBy('id', 'DESC')->where('uuid',  $id)->first();

            if ($schemelist->status == 1) {
                $update_data['status'] = 0;
            } else {
                $update_data['status'] = 1;
            }
            $update_data['updated_at'] = date('Y-m-d H:i:s');

            DB::table('scheme_list')
                ->where('uuid', $id)
                ->update($update_data);
        }
    }

    //List Delete
    public function listDelete($id)
    {
        if ($id != '') {

            $update_data['status'] = 2;
            $update_data['updated_at'] = date('Y-m-d H:i:s');

            DB::table('scheme_list')
                ->where('uuid', $id)
                ->update($update_data);
        }
    }
}