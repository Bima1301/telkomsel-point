<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use App\Http\Requests\StoreMerchandiseRequest;
use App\Http\Requests\UpdateMerchandiseRequest;
use App\Models\RealtimeStatus;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Storage;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'merchans' => Merchandise::latest()->get(),
            'page' => 'Merchandise |',
            'active' => 'merchandise'
        ];
        return view('pages.merchandise',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'page' => 'Merchandise |',
            'active' => 'merchandise'
        ];
        return view('pages.merchandise.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMerchandiseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchandiseRequest $request)
    {
        // $validatedData = $request->validate([
        //     'merch_name' => 'required|max:255',
        //     'keyword' => 'required|max:255',
        //     'verification_keyword' => 'max:255',
        //     'image' => 'required|image|file|max:1024',
        //     'minimal_point' => 'required'
        // ]);

        // if ($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('merch-image');
        // }
        $RealtimeStatus = RealtimeStatus::create([
            'stock_in' => 0,
            'stock_out' => 0,
            'remaining_stock' => 0
        ]);
        Merchandise::create([
            'realtime_status_id' => $RealtimeStatus->id,
            'merch_name' => $request->merch_name,
            'keyword' => $request->keyword,
            'verification_keyword' => $request->verification_keyword,
            'image' => $request->file('image')->store('merch-image'),
            'minimal_point' => $request->minimal_point
        ]);
        
        return redirect('/merchandise')->with('success', 'New merchandise has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function show(Merchandise $merchandise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchandise $merchandise)
    {
        $data = [
            'merch' => $merchandise,
            'page' => 'Merchandise |',
            'active' => 'merchandise'
        ];
        return view('pages.merchandise.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerchandiseRequest  $request
     * @param  \App\Models\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchandiseRequest $request, Merchandise $merchandise)
    {
        // dd($request);
        // $isImage = $request->file('image')->store('merch-image');
        // dd($request);
        // if ($request->oldImage) {
        //     $isImage = Storage::delete($request->oldImage);
        // }
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            Merchandise::where('id',$merchandise->id)->update([
                'merch_name' => $request->merch_name,
                'keyword' => $request->keyword,
                'verification_keyword' => $request->verification_keyword,
                'image' => $request->file('image')->store('merch-image'),
                'minimal_point' => $request->minimal_point
            ]);
        }
        return redirect('/merchandise')->with('success', 'Merchandise has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchandise $merchandise)
    {
        // dd($merchandise);
        if ($merchandise->image) {
            Storage::delete($merchandise->image);
        }
        Merchandise::destroy($merchandise->id);
        return redirect('/merchandise')->with('success', 'Merchandise has been deleted!');
    }
}
