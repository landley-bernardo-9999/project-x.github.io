<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Room;
use App\Resident;
use App\Owner;
use App\Repair;
use DB;

class RoomsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pm = DB::table('rooms')->where('enrolled', 'No')->get();
        $accepted = DB::table('rooms')->where('enrolled', 'No')->get();
        $unaccepted = DB::table('rooms')->where('enrolled', 'No')->get();
        $rooms = DB::table('rooms')->orderBy('created_at', 'desc')->get();
        $occupied = DB::table('rooms')->where('roomStatus','=', 'Occupied')->get();
        $vacant = DB::table('rooms')->where('roomStatus','=', 'Vacant')->get();
        $reserved = DB::table('rooms')->where('roomStatus','=', 'Reserved')->get();
        $nrfo = DB::table('rooms')->where('roomStatus','=', 'NRFO')->get();
        $totalRooms = count($rooms);
        $occupiedRooms = count($occupied);
        $occupancyRate = round($occupiedRooms/$totalRooms * 100); 
        return view('rooms.index')->with('pm', $pm)
                                  ->with('accepted', $accepted)
                                  ->with('unaccepted', $unaccepted)
                                  ->with('rooms', $rooms)
                                  ->with('occupied', $occupied)
                                  ->with('vacant', $vacant)
                                  ->with('reserved', $reserved)
                                  ->with('nrfo', $nrfo)
                                  ->with('occupancyRate', $occupancyRate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'roomNo' => 'required|unique:rooms',
            'building' => 'required',
            'enrolled' => 'required',
            'longTermRent' => 'required',
            'shortTermRent' => 'required',
            'roomStatus' => 'required',
            'size' => 'required',
            'capacity' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

         //Handle File Upload
         if($request->hasFile('cover_image')){
            //Get filename with the extension 
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.' '.time().' '.$extension; 
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Add Room
        $room = new Room;
        $room->roomNo = $request->input('roomNo'); 
        $room->building = $request->input('building');
        $room->enrolled = $request->input('enrolled');
        $room->longTermRent = $request->input('longTermRent');
        $room->shortTermRent = $request->input('shortTermRent');
        $room->roomStatus = $request->input('roomStatus');
        $room->size = $request->input('size');
        $room->capacity=$request->input('capacity');    
        $room->cover_image = $fileNameToStore; 

        $room->save();

        return redirect('/rooms/create')->with('success','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $roomNo
     * @return \Illuminate\Http\Response
     */
    public function show($roomNo)
    {
        $residentsRowNo = 1;
        $ownersRowNo = 1;
        $repairsRowNo = 1;
        $room = Room::find($roomNo);

        $resident_contract = DB::table('residents')
            ->join('contracts', 'residents.id', '=', 'contracts.residentName')
            ->select('residents.*','contracts.*')
            ->where('residentRoomNo', $roomNo)
            ->whereIn('residents.residentStatus',['Active', 'Moving-In', 'Moving-Out', 'Extended', 'Pending'])
            ->orderBy('contracts.moveOutDate', 'asc')
            ->get();

        $owner_transaction = DB::table('owners')
            ->join('transactions', 'owners.id', '=', 'transactions.ownerName')
            ->select('owners.*','transactions.*')
            ->where('roomNo', $roomNo)
            ->orderBy('transactions.created_at', 'asc')
            ->get();
        $repair = Repair::where('roomNo', '=', $roomNo)->get();

       return view('rooms.show')->with('residentsRowNo', $residentsRowNo)
                                ->with('ownersRowNo', $ownersRowNo)
                                ->with('repairsRowNo', $repairsRowNo)
                                ->with('room', $room)
                                ->with('resident_contract', $resident_contract)
                                ->with('owner', $owner_transaction)
                                ->with('repair', $repair);
                                   
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $roomNo
     * @return \Illuminate\Http\Response
     */
    public function edit($roomNo)
    {
        $room = Room::find ($roomNo);
        return view('rooms.edit')->with('room',$room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $roomNo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $roomNo)
    {
        $this->validate($request,[
            'roomNo' => 'required',
            'building' => 'required',
            'enrolled' => 'required',
            'longTermRent' => 'required',
            'shortTermRent' => 'required',
            'roomStatus' => 'required',
            'size' => 'required',
            'capacity' => 'required',
           
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension 
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.' '.time().' '.$extension; 
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
         
        //Add Room
        $room = Room::find($roomNo);
        $room->roomNo = $request->input('roomNo'); 
        $room->building = $request->input('building');
        $room->enrolled = $request->input('enrolled');
        $room->longTermRent = $request->input('longTermRent');
        $room->shortTermRent = $request->input('shortTermRent');
        $room->roomStatus = $request->input('roomStatus');
        $room->size = $request->input('size');
        $room->capacity = $request->input('capacity');  
        if($request->hasFile('cover_image')){
            $room->cover_image = $fileNameToStore;
        }  
      
    
        $room->save();

        return redirect('/rooms/'.$room->roomNo)->with('success','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $roomNo
     * @return \Illuminate\Http\Response
     */
    public function destroy($roomNo)
    {
        $room = Room::find($roomNo);

        if($room->cover_image != 'noimage.jpg'){
            //Delete the image
            Storage::delete('public/cover_images/'.$room->cover_image);
        }

        $room->delete();
        return redirect('/rooms')->with('success','Deleted successfully!');
    }
}



