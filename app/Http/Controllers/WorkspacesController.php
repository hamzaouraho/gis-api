<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workspace;

class WorkspacesController extends Controller
{

    public function index(Request $req){
        // $shpfilpath = 'C:\Users\win10\Desktop\project\ProjetStage\shptopostgis\backend\gis-api\public\ShapeFiles\Derogation_central_13_avril.shp';
        // $tblname = '';
        // $command = 'shp2pgsql -s 4326 -d ShapeFiles/Derogation_central_13_avril.shp | psql -h localhost -p 5432 -d RestApi -U postgres';
        // $command = '"C:\Program Files\PostgreSQL\13\bin\shp2pgsql.exe" -s 4326 C:\Users\win10\Desktop\project\ProjetStage\shptopostgis\backend\gis-api\public\ShapeFiles\Derogation_central_13_avril.shp Derogation_central_13_avril| psql -h localhost -p 5432 -d RestApi -U postgres';
        // $output = shell_exec($command)e;
        // exec($command,$out,$ret);
        //system("calc");
        //exec("shp2pgsql -s 4326 -I -W latin1 C:\Users\win10\Desktop\project\ProjetStage\shptopostgis\backend\gis-api\public\ShapeFiles\Derogation_central_13_avril.shp Derogation_central_13_avril | psql -U postgres -h localhost -d RestApi");
        //+++exec("shp2pgsql -s 4326 -d C:\Users\win10\Desktop\project\ProjetStage\shptopostgis\backend\gis-api\public\ShapeFiles\Derogation_central_13_avril.shp Derogation_central_13_avril | psql -h localhost -p 5432 -d RestApi -U postgres");
        //exec("cd \"C:\Users\win10\Desktop\project\Glass\" && mkdir said");
        // "C:\Program Files\PostgreSQL\13\bin\shp2pgsql.exe" -s 4326 -I -W latin1 C:\Users\win10\Desktop\project\ProjetStage\shptopostgis\backend\gis-api\public\ShapeFiles\Derogation_central_13_avril.shp Derogation_central_13_avril | "C:\Program Files\PostgreSQL\13\bin\psql.exe" -U postgres -h localhost -d RestApi");
        // print_r($output);

        //exec("shp2pgsql -s 4326 -d ../storage/app/public/said/GH3nCX1AI7oZHrYCtT4olwSrntWpJYlSnQZKGQYn.bin GH3nCX1AI7oZHrYCtT4olwSrntWpJYlSnQZKGQYn | psql -h localhost -p 5432 -d RestApi -U postgres");


        //exec("cd ../storage/app/public/said && mkdir hamzaa");
        //GH3nCX1AI7oZHrYCtT4olwSrntWpJYlSnQZKGQYn.bin
        

        return Workspace::all();
    }

    public function uploadFile(Request $request){
        //$name = $request->file->move('public/said');

        //exec("shp2pgsql -s 4326 -d shp-package/Derogation_central_13_avril.shp Derogation_central_13_avril | psql -h localhost -p 5432 -d RestApi -U postgres");

        //$file->move(base_path('\modo\images'),$file->getClientOriginalName());

        $shp = $request->file('shp')->getClientOriginalName();
        $dbf = $request->file('dbf')->getClientOriginalName();
        $prj = $request->file('prj')->getClientOriginalName();
        $sbn = $request->file('sbn')->getClientOriginalName();
        $sbx = $request->file('sbx')->getClientOriginalName();
        $xml = $request->file('xml')->getClientOriginalName();
        $shx = $request->file('shx')->getClientOriginalName();

        //$filename = "Derogation_central_13_avril.shp";
        $path1 = $request->file('shp')->move(public_path("/shp-package"),$shp);
        $path2 = $request->file('dbf')->move(public_path("/shp-package"),$dbf);
        $path3 = $request->file('prj')->move(public_path("/shp-package"),$prj);
        $path4 = $request->file('sbn')->move(public_path("/shp-package"),$sbn);
        $path5 = $request->file('sbx')->move(public_path("/shp-package"),$sbx);
        $path6 = $request->file('xml')->move(public_path("/shp-package"),$xml);
        $path7 = $request->file('shx')->move(public_path("/shp-package"),$shx);
        $urlAddr = url('/shp-package/'.$shp);

        $name = substr($shp, 0, -4);

        exec("shp2pgsql -s 4326 -d shp-package/$shp $name | psql -h localhost -p 5432 -d RestApi -U postgres");


        return  response()->json(['url'=> $urlAddr],200);
    }
    

    public function store(Request $request){
        return Workspace::create($request->all());
    }

    public function show($id){
        return Workspace::find($id); 
    }

    public function destroy($id){
        return Workspace::destroy($id); 
    }

    public function update(Request $request,$id){
        $workspace = Workspace::find($id);
        $workspace->update($request->all());
        return $workspace;
    }

    public function storee(){
        return Workspace::create([
            
            // 'name' => '2 First workspace',
            // 'gs_workspace_name' => '2 workspace name',
            // 'gs_workspace_isolated' => false,
            // 'description' => '2 description of workspace',
            // 'basemap_id' => 11121,
            // 'user_id' => 13134

        ]);
    }

    

}
