<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DependentController extends Controller
{
    //select role dependent on office level
    public function dependentOnOfficeToRole(Request $request)
    {
        
        if ($request->off_id==1) {
            $dependentRole = DB::table('user_roles')
            ->where('level', '=', 1)
            ->get();
        } elseif ($request->off_id==2) {
            $dependentRole = DB::table('user_roles')
            ->where('level', '=', 2)
            ->get();
        }
        

        $html = '<option value=""> -- নির্বাচন করুন --</option>';
        if (!empty($dependentRole)) {
            foreach ($dependentRole as $values) {
                $html .= '<option value="' . $values->id . '">' . $values->name . '</option>';
            }
        }

        return response()->json([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    //select inspector dependent on role
    public function dependentOnRoleToInspector(Request $request)
    {

        if ($request->off_id==1) {
            $inspector_data= DB::table('users')
            ->where('role_id', $request->role_id)
            ->get();
        }
        if (!empty($request->div_id)) {
            if ($request->off_id==2) {
            
                $inspector_data= DB::table('users')
                ->where('role_id', $request->role_id)
                ->where('div_id', $request->div_id)
                ->get();
            }
            
        }
        

        $ins_html = '<option value=""> -- নির্বাচন করুন --</option>';
        if (!empty($inspector_data)) {
            foreach ($inspector_data as $values) {
                $ins_html .= '<option value="' . $values->id . '">' . $values->name . '</option>';
            }
        }
        return response()->json([
            'status' => 'success',
            'ins_html' => $ins_html,
        ]);
    }

    //select inspector dependent on division
    public function dependentOnDivToRole(Request $request)
    {
        if (!empty($request->div_id)) {
            $dependentRole = DB::table('user_roles')
            ->where('level', 2)
            ->get();
            $html = '<option value=""> -- নির্বাচন করুন --</option>';
            if (!empty($dependentRole)) {
                foreach ($dependentRole as $values) {
                    $html .= '<option value="' . $values->id . '">' . $values->name . '</option>';
                }
            }

            return response()->json([
                'status' => 'success',
                'html' => $html,
            ]);
        }
    }

    //select district and inspector dependent on division
    public function OfficedependentOnDivision(Request $request)
    {
        $dependentDistrict = DB::table('lmdt_districts')
            ->where('div_id', '=', $request->div_id)
            ->get();

        $dis_html = '<option value=""> -- নির্বাচন করুন --</option>';
        if (!empty($dependentDistrict)) {
            foreach ($dependentDistrict as $values) {
                $dis_html .= '<option value="' . $values->dis_id . '">' . $values->dis_name . '</option>';
            }
        }

        $dependentOff = DB::table('land_office')
        ->where('div_id', '=', $request->div_id)
        ->where('level', '=', 2)
        ->get();

        $Off_html = '<option value=""> -- নির্বাচন করুন --</option>';
        if (!empty($dependentOff)) {
            foreach ($dependentOff as $values) {
                $Off_html .= '<option value="' . $values->off_id . '">' . $values->off_name . '</option>';
            }
        }

        return response()->json([
            'status' => 'success',
            'dis_html' => $dis_html,
            'Off_html' => $Off_html,
        ]);
    }




}
