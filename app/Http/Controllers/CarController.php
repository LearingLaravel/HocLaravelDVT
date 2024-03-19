<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\Car;
use App\Models\Mf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $cars = Car::select('cars.id', 'cars.image', 'cars.description', 'cars.brand', 'cars.model', 'cars.produced_on', 'cars.mf_id', 'mfs.mf_name')
        ->join('mfs', 'cars.mf_id', '=', 'mfs.id')
        ->get();

    // return response()->json($cars);
    //     $cars = Car::all();
        return view('car-list', compact('cars'));
    }


    /**
     * Show the form for creating a new resource.  --> return view them moi
     */
    public function create()
    {
        return view('car-create');
    }


    /**
     * Store a newly created resource in storage. luu doi tuong them moi vao database
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'model' => 'required|max:255|string',
    //         'description' => 'required|max:255|string',
    //         'brand' => 'require|mimes:png,jpg,jpeg,webp,gif',
    //         'produced_on' => 'required|date',
    //         'image' => 'required|max:255|string'
    //     ]);
    //     if ($request -> has('brand')) {
    //         $file = $request -> file('brand');
    //         $extension = $file -> getClientOriginalExtension();
    //         $path = 'uploads/image/';
    //         $filename = time(). '.'. $extension;
    //         $file -> move($path, $filename);
    //     }
    //     Car::create([
    //         'model' =>$request->model,
    //         'description' => $request->description,
    //         'brand' =>  $path.$filename,
    //         'produced_on' => $request->produced_on,
    //         'image' => $request->image
    //     ]);
    //     return redirect('cars/create')->with('status', 'Car created successfully');
    // }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'model' => 'required|unique:cars,model', //duy nhat trong bang cars, và cột model
    //         'description' => 'required|max:255|string',
    //         'brand' => 'required|mimes:png,jpg,jpeg,webp,gif',
    //         'produced_on' => 'required|date',
    //         'image' => 'required|max:255|string'
    //     ], [
    //         'description.required' => 'Tiêu đề được yêu cầu'
    //     ]);
        

    //     if ($request->hasFile('brand')) {
    //         $file = $request->file('brand');
    //         $extension = $file->getClientOriginalExtension();
    //         $path = 'uploads/image/';
    //         $filename = time() . '.' . $extension;
    //         $file->move($path, $filename);
    //     } else {
    //         // Handle the case when 'brand' file is not present
    //         return redirect('cars/create')->withErrors(['brand' => 'The brand field is required.']);
    //     }

    //     Car::create([
    //         'model' => $request->model,
    //         'description' => $request->description,
    //         'brand' => $path . $filename,
    //         'produced_on' => $request->produced_on,
    //         'image' => $request->image
    //     ]);

    //     return redirect('cars/create')->with('status', 'Car created successfully');
    // }


public function store(Request $request): RedirectResponse
{
    $validator = Validator::make($request->all(), [
        'model' => 'required|unique:cars,model',
        'description' => 'required|max:255|string',
        'brand' => 'required|mimes:png,jpg,jpeg,webp,gif',
        'produced_on' => 'required|date',
        'image' => 'required|max:255|string',
    ], [
        'description.required' => 'Tiêu đề được yêu cầu.',
        'brand.required' => 'Trường thương hiệu là bắt buộc.',
    ]);

    if ($validator->fails()) {
        return redirect('cars/create')
            ->withErrors($validator)
            ->withInput();
    }

    if ($request->hasFile('brand')) {
        $file = $request->file('brand');
        $extension = $file->getClientOriginalExtension();
        $path = 'uploads/image/';
        $filename = time() . '.' . $extension;
        $file->move($path, $filename);
    } else {
        // Xử lý khi không có file 'brand'
        return redirect('cars/create')->withErrors(['brand' => 'Trường thương hiệu là bắt buộc.']);
    }

    Car::create([
        'model' => $request->model,
        'description' => $request->description,
        'brand' => $path . $filename,
        'produced_on' => $request->produced_on,
        'image' => $request->image,
    ]);

    return redirect('cars/create')->with('status', 'Tạo xe thành công.');
}

    /**
     * Display the specified resource.   --> return trang chi tiet 1 doi tuong
     */
    public function show(string $id)
    {
        $car = Car::find($id);
        // dd($car);
        return view('car-detail', compact('car'));
    }


    /**
     * Show the form for editing the specified resource. 1 doi tuong
     */
    public function edit(int $id)
    {
        $car = Car::findOrFail($id);
        // return $car;
        return view('car-edit', compact('car'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'model' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'brand' => 'nullable|mimes:png,jpg,jpeg,webp,gif',
            'produced_on' => 'required|date',
            'image' => 'required|max:255|string'
        ]);

        $car = Car::findOrFail($id);

        if ($request->has('brand')) {
            $file = $request->file('brand');
            $extension = $file->getClientOriginalExtension();
            $path = 'uploads/image/';
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);

            if (File::exists($car->brand)) {
                File::delete($car->brand);
            }
        }
        $car->update([
            'model' => $request->model,
            'description' => $request->description,
            'brand' => $path.$filename,
            'produced_on' => $request->produced_on,
            'image' => $request->image
        ]);

        return redirect()->back()->with('status', 'Car updated successfully');
    }


    /**
     * Remove the specified resource from storage. xoa 1 dtuong ra khoi database                
     */
    public function destroy(int $id)
    {
        $car = Car::findOrFail($id);

        if (File::exists($car->brand)) {
            File::delete($car->brand);
        }

        $car->delete();
        return redirect()->back()->with('status', 'Car deleted successfully');
    }
}