<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Util;
use App\Branch;
use App\Image;
use File;
use Storage;

class DatabaseController extends Controller{
    
    // Crud

    function add(Request $req){
        $branch = new Branch();

        $branch->branchName = $req->name;
        $branch->branchDesc = $req->desc;
        $branch->branchNumber = $req->number;
        $branch->branchStreet = $req->street;
        $branch->branchDistrict = $req->district;
        $branch->branchCity = $req->city;
        $branch->branchCep = $req->cep;
        $branch->branchStatus = true;
        $branch->branchProfitMargin = $req->profit;
        $branch->branchMinimumInvestment = $req->minimum;

        $branch->save();

        for($i = 0; $i < count($req->allFiles()['images']); $i++){
            // $file->move(public_path('images/branches/' . $branch->id), 
            //     $file->getClientOriginalName() . strptime('now') . $file->getExtension());
            $file = $req->allFiles()['images'][$i];

            $image = new Image();
            $image->pathImage = $file->store('branches/' . $branch->id);
            $image->branch_id = $branch->id;
            $image->save();
            unset($image);
        }

        (new Util())->flashSuccess('Filial cadastrada com sucesso!');
        return redirect()->back();

    }

    function update(Request $req, $id){
        $branch = Branch::findOrFail($id);
        $branch->branchName = $req->name;
        $branch->branchDesc = $req->desc;
        $branch->branchNumber = $req->number;
        $branch->branchStreet = $req->street;
        $branch->branchDistrict = $req->district;
        $branch->branchCity = $req->city;
        $branch->branchCep = $req->cep;
        $branch->branchStatus = true;
        $branch->branchProfitMargin = $req->profit;
        $branch->branchMinimumInvestment = $req->minimum;
        $branch->update();
        return redirect()->back();
    }

    function deleteBranch($id){
        $branch = Branch::find($id);
        $images[] = Image::where('branch_id', $id)->get();

        for($i = 0; $i < sizeof($images[0]); $i++) 
            Storage::delete($images[0][$i]->pathImage);
    
        $branch->images()->delete();
        $branch->delete();
        return redirect()->route('dashboard');
    }

    function addImage(Request $req, $id){
        for($i = 0; $i < count($req->allFiles()['images']); $i++){
            $file = $req->allFiles()['images'][$i];
            $image = new Image();
            $image->pathImage = $file->store('branches/' . $id);
            $image->branch_id = $id;
            $image->save();
            unset($image);
        }

        (new Util())->flashSuccess('Imagem salva com sucesso!');
        return redirect()->back();
    }

    function deleteImage($id){
        $image = Image::findOrFail($id);
        $branch = Branch::where('id', $image->branch_id)->first();
        $count = Image::where('branch_id', $image->branch_id)->count();

        if($count < 2){
            (new Util())->flashError('Adicione outra foto antes!');
            return redirect()->back();
        } else {
            Storage::delete($image->pathImage);
            $image->delete();
        }
        return redirect()->back();
    }

}
