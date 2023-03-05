<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyStoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $image = $request->file('image');
        $image_name = $image->hashName();
        $image->storeAs('public', $image_name);

        $company = Company::create([
            'company_name' => $request->company_name,
            'BIN/IIN' => $request['BIN/IIN'],
            'contact_person' => $request->contact_person,
            'specialty' => $request->specialty,
            'created_company' => $request->created_company,
        ]);

        $image = new Image;
        $image->url = $image_name;
        $company->image()->save($image);

        $user = new User;
        $user->number = $request->number;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $company->user()->save($user);

        return response()->json([
            'status' => '201',
            'message' => 'User created successfully',
        ], 201);
    }
}
