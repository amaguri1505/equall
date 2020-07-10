<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HouseProperty;
use App\HousePropertyImage;
use App\AdminInquiry;
use App\Inquiry;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function getDetail($id)
    {
        $house_property = HouseProperty::find($id);
        return response()->json($house_property);
    }

    public function getPropertyImage($id)
    {
        $house_property_image = HousePropertyImage::where('property_id', $id)->get();
        return response()->json($house_property_image);
    }

    public function getTitle($id)
    {
        $house_property = HouseProperty::select('name')->where('id', $id)->get();
        return response()->json($house_property);
    }

    public function getProperties()
    {
        $properties = HouseProperty::get();
        return response()->json($properties);
    }

    public function getSearchResult(Request $req)
    {
        $properties = [];
        return response()->json($properties);
    }

    public function getPropertyImages()
    {
        $propertyImages = HousePropertyImage::get();
        return response()->json($propertyImages);

    }

    public function getInquiries()
    {
        $inquiries = Inquiry::get();
        return response()->json($inquiries);
    }

    public function getTotalInquiry($corp_id)
    {
        $inquiry_cnt = Inquiry::where('corp_id', $corp_id)->count();
        return response()->json($inquiry_cnt);
    }

    public function searchProperties(Request $req)
    {
        $properties_query = HouseProperty::query();
        $search_word = $req->s_search_word;
        $s_pets = $req->s_pets;
        $s_stations = $req->s_stations;
        $s_areas = $req->s_areas;
        $s_under_cost = $req->s_under_cost;
        $s_limit_cost = $req->s_limit_cost;

        if ($search_word) {
            $properties_query->
            orWhere('name', 'LIKE', '%' . $search_word . '%')->
            orWhere('good', 'LIKE', '%' . $search_word . '%')->
            orwhere('bad', 'LIKE', '%' . $search_word . '%')->
            orwhere('nearest_station', 'LIKE', '%' . $search_word . '%')->
            orWhere('address', 'LIKE', '%' . $search_word . '%')->
            orWhere('area', 'LIKE', '%' . $search_word . '%')->
            orWhere('floor_plan', 'LIKE', '%' . $search_word . '%')->
            orWhere('floor', 'LIKE', '%' . $search_word . '%')->
            orWhere('structure', 'LIKE', '%' . $search_word . '%')->
            orWhere('facility', 'LIKE', '%' . $search_word . '%')->
            orWhere('corp', 'LIKE', '%' . $search_word . '%');
        }

        $properties = $properties_query->get();

        return response()->json($properties);
    }

    public function addImages(Request $req)
    {
        if ($req->file) {
            $req->file->storeAs('public', 'test_name.jpg');
        }
        return response()->json('success');
    }

    public function addProperty(Request $req)
    {
        $cnt = 0;
        $houseProperty = new HouseProperty([
            'type' => $req->input('type'),
            'name' => $req->input('name'),
            'good' => $req->input('good'),
            'bad' => $req->input('bad'),
            'pet_type' => $req->input('pet_type'),
            'pet_cnt' => $req->input('pet_cnt'),
            'nearest_station' => $req->input('nearest_station'),
            'address' => $req->input('address'),
            'is_pet' => $req->input('is_pet'),
            'cost' => $req->input('cost'),
            'manage_cost' => $req->input('manage_cost'),
            'deposit' => $req->input('deposit'),
            'key_money' => $req->input('key_money'),
            'area' => $req->input('area'),
            'floor_plan' => $req->input('floor_plan'),
            'floor' => $req->input('floor'),
            'age' => $req->input('age'),
            'structure' => $req->input('structure'),
            'park' => $req->input('park'),
            'facility' => $req->input('facility'),
            'start_date' => $req->input('start_date'),
            'corp' => $req->input('corp'),
        ]);
        $houseProperty->save();

        $housePropertyImages = $req->images;

        foreach ($housePropertyImages as $image_obj) {
            $cnt++;
            $image_str = substr($image_obj['path'], strpos($image_obj['path'], ",") + 1);
            $image = base64_decode($image_str);
            $imagePath = Storage::disk('uploads')->put('/' . $houseProperty->id . '/' . $cnt . '.jpg', $image);
            HousePropertyImage::create([
                'image_caption' => $cnt,
                'image_path' => '/uploads/' . $houseProperty->id . '/' . $cnt . '.jpg',
                'property_id' => $houseProperty->id,
            ]);
        }

        return response()->json('success addProperty');
    }

    public function addInquiry(Request $req)
    {
        $inquiry = new Inquiry([
            'property_id' => $req->input('property_id'),
//            'user_id' => $req->input('user_id'),
            'user_id' => 1,
//            'corp_id' => $req->input('corp_id'),
            'corp_id' => 1,
            'contact_text' => $req->input('contact_text'),
        ]);
        $inquiry->save();
    }

    public function submitRelation(Request $req)
    {
        $adminInquiry = new AdminInquiry([

        ]);
        $adminInquiry->save();

        return response()->json('success submitRelation');
    }
}
