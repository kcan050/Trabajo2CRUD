<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContraladorFunciones extends Controller
{
    
    public function index(Request $request)
    {
          $resources = [];
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
        }
        $enterprise = 'JD';
        $data = [];
        $data['resources'] = $resources;
        $data['enterprise'] = $enterprise;
            if($request->session()->exists('message')) {
            $data['message'] = $request->session()->get('message');
            $type = 'success';
            if($request->session()->exists('type')) {
                $type = $request->session()->get('type');
            }
            $data['type'] = $type;
        }
        
        return view('resource.index', $data);
    }

    
    public function create()
    {
        $enterprise = 'JD';
        $data = [];
        $data['enterprise'] = $enterprise;
        return view('resource.create', $data);
    }

   
    public function store(Request $request)
    { 
        
        $resources = [];
        
         if($request->session()->exists('resources')) {
            
            $resources = $request->session()->get('resources');
           
            $array = end ($resources);
            $id = $array['id']+1;
            
        }else{
          
            $id = 1;
            
        }
        
        $name = $request->input('name') ;
        $precio = $request->input('precio') . '€';

        $resource = ['id' => $id, 'name' => $name, 'precio' => $precio];
        
        if(isset($resources[$id])) {
            return back()->withInput();
        } else {
            $resources[$id] = $resource;
        }
        $request->session()->put('resources', $resources);
        return redirect('resource')->with('message','Se ha insertado el elemento correctamente');
    }

    
    public function show(Request $request ,$id)
    {
        if($request->session()->exists('resources') && isset($request->session()->get('resources')[$id])) {
            $resource = $request->session()->get('resources')[$id];
            $data = [];
            $data['resource'] = $resource;
            $data['enterprise'] = 'JD';
            
            return view('resource.show', $data);    
            
        }
        
        return redirect('resource');
    }

    
    public function edit(Request $request ,$id)
    {
         if($request->session()->exists('resources') && isset($request->session()->get('resources')[$id])) {
            $resource = $request->session()->get('resources')[$id];
            $data = [];
            $data['resource'] = $resource;
            $data['enterprise'] = 'JD';
            return view('resource.edit', $data);
            //return view('resource.edit', ['resource' => $resource]);
        } else {
            return abort(404);
        }
    }

  
    public function update(Request $request, $id)
    {
       if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
            if(isset($resources[$id])) {
                $resource = $resources[$id];
                $idInput = $request->input('id');
                $nameInput = $request->input('name');
                $precioInput = $request-> input('precio');
                $resource['id'] = $idInput;
                $resource['name'] = $nameInput;
                $resource['precio'] = $precioInput;
                if(isset($resources[$idInput]) && $id != $idInput) {
                    return back()->withInput();
                } 
                unset($resources[$id]);
                $resources[$idInput] = $resource;
                
                $request->session()->put('resources', $resources);
                return redirect('resource');
            }
        }
        return back()->withInput();
    }

   
    public function destroy(Request $request ,$id)
    {
        $message = 'No se ha borrado el elemento correctamente';
        $type = 'danger';
        if($request->session()->exists('resources')) {
          $resources = $request->session()->get('resources');
          if(isset($resources[$id])) {
              unset($resources[$id]);
              $request->session()->put('resources', $resources);
              $message = 'Se ha borrado el elemento';
              $type = 'success';
          }
        }
        $data = [];
        $data['message'] = $message;
        $data['type'] = $type;
        return redirect('resource')->with($data);
    }
    
   function flush(Request $request) {
        $request->session()->flush();
        return redirect('resource')->with('message','Todos los elementos se han borrado');
    }   
  
    
}
