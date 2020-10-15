<?php

namespace App\Http\Controllers\Api;

use App\Notifications\NotifyToCustomer;
use App\User;
use App\EstateAgent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HouseProperty;
use App\HousePropertyImage;
use App\AdminInquiry;
use App\Inquiry;
use App\Bookmark;
use App\Relationship;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Notifications\VerifyEmail;

class ApiController extends Controller
{
    public function getUser(Request $req)
    {
        return $req->user('sanctum');
    }

    public function getCorp(Request $req)
    {
        return $req->user('sanctum_corp');
    }

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
        $house_property = HouseProperty::select('name', 'corp_id')->where('id', $id)->get();
        return response()->json($house_property);
    }

    public function getCorpIdByHouse($id)
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

    public function getTotalInquiry()
    {
        $corp_id = auth()->guard('sanctum_corp')->user()->id;
        $inquiry_cnt = Inquiry::where('corp_id', $corp_id)->count();
        return response()->json($inquiry_cnt);
    }

    public function getPropertiesByCorp()
    {
        $corp_id = auth()->guard('sanctum_corp')->user()->id;
        $properties = HouseProperty::where('corp_id', $corp_id)->withCount('inquiries')->get();
        return response()->json($properties);
    }

    public function getInquiriesByCorp()
    {
        $corp_id = auth()->guard('sanctum_corp')->user()->id;
        $inquiries = Inquiry::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as time"),
            DB::raw("COUNT(1) as count")
        )
            ->where('corp_id', $corp_id)
            ->groupBy('time')
            ->orderByRaw('time DESC')
            ->get();
        return response()->json($inquiries);
    }

    public function modifyCorpEmail(Request $req)
    {
        $corp = auth()->guard('sanctum_corp')->user();
        $corp_id = $corp->id;

        EstateAgent::find($corp_id)
            ->update(
                [
                    'email' => $req->email,
                    'email_verified_at' => null,
                ]
            );

        $corp->notify(new VerifyEmail());

        return response()->json('success');
    }

    public function modifyCorpPassword(Request $req)
    {
        $corp_id = auth()->guard('sanctum_corp')->user()->id;
        $password = auth()->guard('sanctum_corp')->user()->password;

        if (!Hash::check($req->current_password, $password)) {
            return response()->json([
                "status" => "current_pass_validate_error"
            ]);
        }

        EstateAgent::find($corp_id)
            ->update(['password' => Hash::make($req->new_password)]);

        return response()->json([
            "status" => "success"
        ]);
    }

    public function updateProperty(Request $req)
    {

    }

    public function deleteProperty(Request $req)
    {
        DB::table('house_properties')
            ->where('id', $req->id)->delete();
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
            $properties_query->where(function ($q) use ($search_word) {
                $q->
                orWhere('name', 'LIKE', '%' . $search_word . '%')->
                orWhere('good', 'LIKE', '%' . $search_word . '%')->
                orWhere('bad', 'LIKE', '%' . $search_word . '%')->
                orWhere('nearest_station', 'LIKE', '%' . $search_word . '%')->
                orWhere('address', 'LIKE', '%' . $search_word . '%')->
                orWhere('area', 'LIKE', '%' . $search_word . '%')->
                orWhere('floor_plan', 'LIKE', '%' . $search_word . '%')->
                orWhere('floor', 'LIKE', '%' . $search_word . '%')->
                orWhere('structure', 'LIKE', '%' . $search_word . '%')->
                orWhere('facility', 'LIKE', '%' . $search_word . '%')->
                orWhere('corp', 'LIKE', '%' . $search_word . '%');
            });
        }

        if ($s_pets) {
            $properties_query->
            orWhere('pet_types', '犬と猫');
            if (in_array('猫', $s_pets, true)) {
                $properties_query->
                orWhere('pet_types', '猫');
            }
            if (
                in_array('小型犬', $s_pets, true) ||
                in_array('中型犬', $s_pets, true) ||
                in_array('大型犬', $s_pets, true)
            ) {
                $properties_query->
                orWhere('pet_types', '犬');
            }
        }

        if ($s_stations) {
            $properties_query->
            whereIn('nearest_station', $s_stations);
        }

        if ($s_areas) {
            $properties_query->
            where(function ($q) use ($s_areas) {
                foreach ($s_areas as $area) {
                    $q->
                    orWhere('address', '%' . $area . '%');
                }
            });
        }

        if ($s_under_cost) {
            $properties_query->
            where('cost', '>=', $s_under_cost);
        }

        if ($s_limit_cost) {
            $properties_query->
            where('cost', '<=', $s_limit_cost);
        }

        $properties = $properties_query->get();

        return response()->json($properties);
    }

    public function getLatestProperties(Request $req)
    {
        $properties_query = HouseProperty::query();


        //workaround
        $s_pet_type = $req->pet_types;


        if ($s_pet_type) {
            $properties_query->
            orWhere('pet_types', '=', '犬と猫');
            if ($s_pet_type === "cat") {
                $properties_query->
                orWhere('pet_types', '=', '猫');
            } else if ($s_pet_type === "dog") {
                $properties_query->
                orWhere('pet_types', '=', '犬');
            }
        }

        $properties_query->
        orderBy('created_at', 'desc')->
        limit(10);

        $properties = $properties_query->get();

        return response()->json($properties);
    }

    public function getBookmarkedProperties(Request $req)
    {
        $user = auth()->guard('sanctum')->user();
        $user_id = $user->id;

        $bookmarks_query = Bookmark::query();
        $bookmarks_query->where('user_id', $user_id);
        $bookmarks = $bookmarks_query->get();

        $properties_query = HouseProperty::query();
        $properties_query->whereIn('id', $bookmarks);
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
        $start_date = $req->input('start_date');
        $end_date = date('Y-m-d', strtotime("+1 months", strtotime($start_date)));
        if ($req->has('id')) {
            $houseProperty = HouseProperty::updateOrCreate(
                [
                    'id' => $req->id,
                ],
                [
                    'type' => $req->input('type'),
                    'is_pet' => $req->input('is_pet'),
                    'property_type' => $req->input('property_type'),
                    'name' => $req->input('name'),
                    'hitokoto' => $req->input('hitokoto'),
                    'good' => $req->input('good'),
                    'bad' => $req->input('bad'),
                    'pet_types' => $req->input('pet_types'),
                    'pet_cnt' => $req->input('pet_cnt'),
                    'nearest_station' => $req->input('nearest_station'),
                    'minutes_on' => $req->input('minutes_on'),
                    'address' => $req->input('address'),
                    'cost' => $req->input('cost'),
                    'manage_cost' => $req->input('manage_cost'),
                    'deposit' => $req->input('deposit'),
                    'deposit_for_pet' => $req->input('deposit_for_pet'),
                    'key_money' => $req->input('key_money'),
                    'deposit_ex' => $req->input('deposit_ex'),
                    'update_cost' => $req->input('update_cost'),
                    'insurance' => $req->input('insurance'),
                    'insurance_corp' => $req->input('insurance_corp'),
                    'cost_memo' => $req->input('cost_memo'),
                    'deal_form' => $req->input('deal_form'),
                    'area' => $req->input('area'),
                    'floor_plan' => $req->input('floor_plan'),
                    'floor' => $req->input('floor'),
                    'age' => $req->input('age'),
                    'structure' => $req->input('structure'),
                    'park' => $req->input('park'),
                    'other_condition' => $req->input('other_condition'),
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'corp_id' => auth()->guard('sanctum_corp')->user()->id,
                ]);
        } else {
            $houseProperty = HouseProperty::Create(
                [
                    'type' => $req->input('type'),
                    'is_pet' => $req->input('is_pet'),
                    'property_type' => $req->input('property_type'),
                    'name' => $req->input('name'),
                    'hitokoto' => $req->input('hitokoto'),
                    'good' => $req->input('good'),
                    'bad' => $req->input('bad'),
                    'pet_types' => $req->input('pet_types'),
                    'pet_cnt' => $req->input('pet_cnt'),
                    'nearest_station' => $req->input('nearest_station'),
                    'minutes_on' => $req->input('minutes_on'),
                    'address' => $req->input('address'),
                    'cost' => $req->input('cost'),
                    'manage_cost' => $req->input('manage_cost'),
                    'deposit' => $req->input('deposit'),
                    'deposit_for_pet' => $req->input('deposit_for_pet'),
                    'key_money' => $req->input('key_money'),
                    'deposit_ex' => $req->input('deposit_ex'),
                    'update_cost' => $req->input('update_cost'),
                    'insurance' => $req->input('insurance'),
                    'insurance_corp' => $req->input('insurance_corp'),
                    'cost_memo' => $req->input('cost_memo'),
                    'deal_form' => $req->input('deal_form'),
                    'area' => $req->input('area'),
                    'floor_plan' => $req->input('floor_plan'),
                    'floor' => $req->input('floor'),
                    'age' => $req->input('age'),
                    'structure' => $req->input('structure'),
                    'park' => $req->input('park'),
                    'other_condition' => $req->input('other_condition'),
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'corp_id' => auth()->guard('sanctum_corp')->user()->id,
                ]);
        }

        if ($req->has('images') && isset($req->images)) {
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
        }

        return response()->json('success addProperty');
    }

    public function addProperties(Request $req)
    {
        $properties = $req->all();
        foreach ($properties as $property) {
            $start_date = $property['start_date'];
            $end_date = date('Y-m-d', strtotime("+1 months", strtotime($start_date)));
            $houseProperty = new HouseProperty([
                'type' => $property['type'],
                'is_pet' => $property['is_pet'],
                'property_type' => $property['property_type'],
                'name' => $property['name'],
                'hitokoto' => $property['hitokoto'],
                'good' => $property['good'],
                'bad' => $property['bad'],
                'pet_types' => $property['pet_types'],
                'pet_cnt' => $property['pet_cnt'],
                'nearest_station' => $property['nearest_station'],
                'minutes_on' => $property['minutes_on'],
                'address' => $property['address'],
                'cost' => $property['cost'],
                'manage_cost' => $property['manage_cost'],
                'deposit' => $property['deposit'],
                'deposit_for_pet' => $property['deposit_for_pet'],
                'key_money' => $property['key_money'],
                'deposit_ex' => $property['deposit_ex'],
                'update_cost' => $property['update_cost'],
                'insurance' => $property['insurance'],
                'insurance_corp' => $property['insurance_corp'],
                'cost_memo' => $property['cost_memo'],
                'deal_form' => $property['deal_form'],
                'area' => $property['area'],
                'floor_plan' => $property['floor_plan'],
                'floor' => $property['floor'],
                'age' => $property['age'],
                'structure' => $property['structure'],
                'park' => $property['park'],
                'other_condition' => $property['other_condition'],
                'start_date' => $start_date,
                'end_date' => $end_date,
                'corp_id' => auth()->guard('sanctum_corp')->user()->id,
            ]);
            $houseProperty->save();
        }
    }

    public function addInquiry(Request $req)
    {
        $user = auth()->guard('sanctum')->user();
        $user_id = $user->id;
        $corp_id = $req->input('corp_id');
        $options = collect($req->input('options'))->implode(',');
        $inquiry = new Inquiry([
            'property_id' => $req->input('property_id'),
            'user_id' => $user_id,
            'options' => $options,
            'corp_id' => $corp_id,
            'contact_text' => $req->input('contact_text'),
        ]);
        EstateAgent::find($corp_id)->notify(new NotifyToCustomer());
        $inquiry->save();
    }

    public function addBookmark(Request $req)
    {
        $user_id = auth()->guard('sanctum')->user()->id;
        $house_id = $req->house_id;

        $bookmark = new Bookmark([
            'user_id' => $user_id,
            'house_id' => $house_id,
        ]);
        $bookmark->save();

        return response()->json('success addBookmark');
    }


    public function submitRelation(Request $req)
    {
        $adminInquiry = new AdminInquiry([

        ]);
        $adminInquiry->save();

        return response()->json('success submitRelation');
    }

    public function closeProperty(Request $req)
    {
        HouseProperty::find($req->id)
            ->update(
                [
                    'is_published' => 0,
                ]);

        return response()->json('success closeProperty');
    }

    public function updateUser(Request $req)
    {
        $user = auth()->guard('sanctum')->user();
        $user_id = $user->id;

        User::find($user_id)
            ->update(
                array_filter(
                    $req->all()
                ));

//            ->update(
//                [
//                    'family_name' => $req->input('family_name'),
//                    'first_name' => $req->input('first_name'),
//                    'email' => $req->input('email'),
//                    'password' => Hash::make($req->input('email')),
//                    'gender' => $req->input('gender'),
//                    'is_pet_owner' => $req->input('is_pet_owner'),
//                    'num_cat' => $req->input('num_cat'),
//                    'num_large_dog' => $req->input('num_large_dog'),
//                    'num_middle_dog' => $req->input('num_middle_dog'),
//                    'num_small_dog' => $req->input('num_small_dog'),
//                    'num_other' => $req->input('num_other'),
//                    'cond_nearest_station' => $req->input('cond_nearest_station'),
//                    'cond_area' => $req->input('cond_area'),
//                    'cond_limit_cost' => $req->input('cond_limit_cost'),
//                ]);

        return response()->json('success updateUser');
    }

    public function submitRelationship(Request $req)
    {
        $relationship = new Relationship();
        $relationship->fill($req->all())->save();
        return response()->json('success submitRelationship');
    }

}
