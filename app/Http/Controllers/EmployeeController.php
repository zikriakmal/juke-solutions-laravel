<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\City;
use App\Models\Employee;
use App\Models\Provience;
use App\Models\StaffPosition;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{

    private $employeeModel, $provienceModel, $cityModel, $staffPositionModel, $bankModel;
    public function  __construct(Employee $employee, City $city, Bank $bank, Provience $provience, StaffPosition $staffPosition)
    {
        $this->employeeModel = $employee;
        $this->provienceModel = $provience;
        $this->cityModel = $city;
        $this->bankModel = $bank;
        $this->staffPositionModel = $staffPosition;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'employeeData' => $this->employeeModel->all(),
            'banks' => $this->bankModel->all(),
            'cities' => $this->cityModel->all(),
            'proviences' => $this->provienceModel->all(),
            'staffPositions' => $this->staffPositionModel->all()
        ];
        return view('main-page.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'dob' => 'required',
            'provience' => 'required',
            'city' => 'required',
            'street' => 'required',
            'ktp_number' => 'required',
            'ktp_file' => 'required',
            'zip_code' => 'required',
            'bank' => 'required',
            'position' => 'required',
        ]);

        $image      = $request->file('ktp_file');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->resize(120, 120, function ($constraint) {
            $constraint->aspectRatio();
        });

        try {

            $img->stream(); // <-- Key point
            Storage::disk('local')->put('images/' . $fileName, $img, 'public');
            $file = $request->file('ktp_file')->move('user-data/', 'ori-' . $fileName);
            $validate['image_uri'] = "$fileName";

            $this->employeeModel->addNewEmployee($validate);
            return redirect('/')->with('status', 'Success Create Data!');
        } catch (Exception $e) {
            return redirect('/')->with('status', 'Failed to Create Data!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'dob' => 'required',
            'provience' => 'required',
            'city' => 'required',
            'street' => 'required',
            'ktp_number' => 'required',
            'zip_code' => 'required',
            'bank' => 'required',
            'position' => 'required',
        ]);


        if ($request->file('ktp_file') != null) {
            $image      = $request->file('ktp_file');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $validate['image_uri'] = $fileName;
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream(); // <-- Key point
            Storage::disk('local')->put('images/' . $fileName, $img, 'public');
            $file = $request->file('ktp_file')->move('user-data/', 'ori-' . $fileName);
        } else {
            $validate['image_uri'] = null;
        }

        try {
            $this->employeeModel->updateNewEmployee($validate,$request->id);
            return redirect('/')->with('status', 'Success Update Data!');
        } catch (Exception $e) {
            return redirect('/')->with('status', 'Failed to Update Data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        try {
            $delete = $this->employeeModel->find($request->all()['id']);
            $delete->delete();
            return redirect('/')->with('status', 'Success delete Data!');
        } catch (Exception $e) {
            return redirect('/')->with('status', 'Failed to delete Data!');
        }
    }
}
