<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class SegmentController extends Controller
{
    public function index()
    {
        return Inertia::render('Segment/Index');
    }

    public function getSegment(Request $request)
    {
        try {
            $segments = Segment::where('status', 1)->get();
            return $this->responseWithData($segments);
        } catch (\Exception $ex) {
            return $this->responseInternalError($ex->getMessage());
        }
    }


    public function create()
    {
        return Inertia::render('Segment/Create');
    }

    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'rule' => 'required'
            ]);;

            if ($validator->fails()) {
                return $this->responseInvalidRequest($validator->errors());
            }

            $segment = new Segment();
            $segment->name = $request->name;
            $segment->rule = json_encode($request->rule);
            $segment->created_by = Auth::user()->id;
            $segment->save();

            return $this->responseCreated('Segment created successfully!');
        } catch (\Exception $ex) {
            return $this->responseInternalError($ex->getMessage());
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request)
    {
    }

    public function segmentWiseSubscriber(Request $request)
    {
        try {

            $segment =  Segment::findOrFail($request->segment_id);

            $rules = json_decode($segment->rule, true);

            $query = Subscriber::query()->when(!empty($rules), function ($query) use ($rules) {
                foreach ($rules as $rule) {
                    $query->where(function ($query) use ($rule) {

                        foreach ($rule as $key => $item) {

                            if ($item['column'] && $item['condition'] && $item['value']) {

                                if ($key == 0) {
                                    if ($item['condition'] != 'between') {
                                        $query->where($item['column'], getSqlCondition($item['condition']), getSqlConditionalValue($item['condition'], $item['value']));
                                    } else {
                                        $query->whereBetween($item['column'], getSqlConditionalValue($item['condition'], $item['value']));
                                    }
                                } else {
                                    if ($item['condition'] != 'between') {
                                        $query->orWhere($item['column'], getSqlCondition($item['condition']), getSqlConditionalValue($item['condition'], $item['value']));
                                    } else {
                                        $query->orWhereBetween($item['column'], getSqlConditionalValue($item['condition'], $item['value']));
                                    }
                                }
                            }
                        }
                    });
                }
            });

            $subscriberCount = (clone $query)->count();
            $subscribers = $query->get();

            $response = ['total_record' => $subscriberCount, 'subscribers' => $subscribers];

            return $this->responseWithData($response);
        } catch (\Exception $ex) {
            return $this->responseInternalError($ex->getMessage());
        }
    }
}
