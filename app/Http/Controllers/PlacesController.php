<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlaceCategoriesTowns;
use App\Towns;
use App\Places;
use App\Categories;
use App\Photos;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use DB;
class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $statusCode  = 200;
    public $result      = false;
    public $message     = 'Error al procesar solicitud';
    public $records     =  array();

    public function index()
    {
        //
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
     *------
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try     
        {   

            $idcategorias = array();
            $idcategorias = json_decode($request->input('idcategory'));
            $data         = json_decode($request->input('data'));
            $photo        = $request->file('photo');

            $image = $photo;
            $imageName= time().'.'.$image->getClientOriginalExtension();
            $path= env('APP_URL').'fotosPortada/'.$imageName;

            Storage::disk('fotosPortada')->put($imageName,File::get($image));

            $nuevoRegistro  =   DB::transaction(function() use ($request, $path,$idcategorias,$data)
                                {
                                    $nuevoRegistro = Places::create(
                                        [
                                            'name'        =>  $data->name,
                                            'password'    =>  $data->password,
                                            'address'     =>  $data->address,
                                            'website'     =>  $data->website,
                                            'description' =>  $data->description,
                                            'idtown'      =>  $data->idtown,
                                            'cel1'        =>  $data->cel1,
                                            'cel2'        =>  $data->cel2,
                                            'email'       =>  $data->email,                                            
                                            'lat'         =>  $data->lat,
                                            'lon'         =>  $data->lon,
                                            'photo'       =>  $path,
                                            'status'      =>  0
                                        ]);


                                    foreach($idcategorias as $idcategoria){

                                        $pct = new PlaceCategoriesTowns;
                                        $pct->idplace = $nuevoRegistro->id;
                                        $pct->idtown  = $nuevoRegistro->idtown;
                                        $pct->idcategory = $idcategoria;
                                        $pct->save();
                                                                          
                                    }
 
                                    if( !$nuevoRegistro )
                                    {
                                        throw new \Exception('Algo ha fallado en el proceso');
                                    }
                                    else{
                                        return $nuevoRegistro;
                                    }
                                });

            $this->statusCode       =   200;
            $this->message          =   "Registro creado exitosamente";
            $this->result           =   true;
            $this->records          =   $idcategorias;
            
        }
        catch (\Exception $e)
        {
            $this->statusCode =     200;
            $this->message  =   env('APP_DEBUG')?$e->getMessage():'¡Algo ha salido mal!';
            $this->result   =   false;
            //$this->records  =   $data->file('photo');
        }
        finally
        {  
            $response = 
            [
                'message'   =>  $this->message,
                'result'    =>  $this->result,
                'records'   =>  $this->records
            ];
            
            return response()->json($response, $this->statusCode);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function datosCombo(){
        $towns=Towns::pluck('description', 'id');
        $categories=Categories::pluck('description', 'id');
    return \View::make('datos',compact('towns','categories'));
    }


    public function seePlaces(Request $request)
    {
    try{
        $finally_records = Array();
        //$clients = Solicitud::find($id);
        $lugares = PlaceCategoriesTowns::where('idcategory',$request->input('idcategory'))->where('idtown',$request->input('idtown'))->with('places')->get();

        foreach ($lugares as $lugar) {
            if($lugar->places->status=='1'){
                $object = [
                    'id' => $lugar->places->id,
                    'name' => $lugar->places->name,
                    'address' => $lugar->places->address,
                    'category' => $lugar->categories->description,
                    'cel1' => $lugar->places->cel1,
                    'cel2' => $lugar->places->cel2,
                    'email' => $lugar->places->email,
                    'photo'   => $lugar->places->photo,
                    'lat' => $lugar->places->lat,
                    'lon' => $lugar->places->lon,
                    'idcategory' =>$lugar->idcategory,
                    'website' =>$lugar->places->website,
                    'idtown' => $lugar->places->idtown,
                    'description' =>$lugar->places->description,
                    'status'    => $lugar->places->status
                ];
                array_push($finally_records,$object);
            }
        }

        if($lugares){
            $this->statusCode = 200;
            $this->result     = true;
            $this->message    = 'Datos devueltos correctamente';
            $this->records    = $finally_records;
        }else{
            throw new \Exception('No se pudieron devolver correctamente los datos');
        }
    }catch(\Exception $e){
            $this->statusCode     = 200;
            $this->result         = false;
            $this->message        = env('APP_DEBUG') ? $e->getMessage() :  $this->message;
        }
        finally{
            $response=[
                'message'       =>  $this->message,
                'result'        =>  $this->result,
                'records'       =>  $this->records
            ];
            return response()->json($response, $this->statusCode);
        }
    }


    public function photos(Request $request)
    {
    try{
        $finally_records = Array();
        //$clients = Solicitud::find($id);
        $fotos = Photos::where('idplace',$request->input('idplace'))->with('places')->get();

        foreach ($fotos as $foto) {
            $object = [
                'photo' => $foto->photo,
            ];
            array_push($finally_records,$object);

        }

        if($lugares){
            $this->statusCode = 200;
            $this->result     = true;
            $this->message    = 'Datos devueltos correctamente';
            $this->records    = $finally_records;
        }else{
            throw new \Exception('No se pudieron devolver correctamente los datos');
        }
    }catch(\Exception $e){
            $this->statusCode     = 200;
            $this->result         = false;
            $this->message        = env('APP_DEBUG') ? $e->getMessage() :  $this->message;
        }
        finally{
            $response=[
                'message'       =>  $this->message,
                'result'        =>  $this->result,
                'records'       =>  $this->records
            ];
            return response()->json($response, $this->statusCode);
        }
    }



    public function placeData(Request $request)
    {
    try{
        $finally_records = Array();
        //$clients = Solicitud::find($id);
        $lugares = PlaceCategoriesTowns::where('idplace',$request->input('idplace'))->where('idcategory',$request->input('idcategory'))->with('places')->with('categories')->get();
        
        foreach ($lugares as $lugar) {
            $object = [
            'id' => $lugar->places->id,
            'name' => $lugar->places->name,
            'category' => $lugar->categories->description,
            'cel1' => $lugar->places->cel1,
            'cel2' => $lugar->places->cel2,
            'email' => $lugar->places->email,
            'photo'   => $lugar->places->photo,
            'lat' => $lugar->places->lat,
            'lon' => $lugar->places->lon
            ];
            array_push($finally_records,$object);
        }


        if($lugares){
            $this->statusCode = 200;
            $this->result     = true;
            $this->message    = 'Datos devueltos correctamente';
            $this->records    = $finally_records;
        }else{
            throw new \Exception('No se pudieron devolver correctamente los datos');
        }
    }catch(\Exception $e){
            $this->statusCode     = 200;
            $this->result         = false;
            $this->message        = env('APP_DEBUG') ? $e->getMessage() :  $this->message;
        }
    finally{
            $response=[
                'message'       =>  $this->message,
                'result'        =>  $this->result,
                'records'       =>  $this->records
            ];
            return response()->json($response, $this->statusCode);
        }

    }
}



