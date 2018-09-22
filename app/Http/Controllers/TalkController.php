<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TalkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function addTalk(Request $request)
    {
        $newData = [
            'title' => $request->title,
            'abstract' => $request->abstract,
            'room' => $request->room,
            'speaker' => [
                'name' => $request->speaker_name,
                'company' => $request->speaker_company,
                'email' => $request->speaker_email,
                'bio' => $request->speaker_bio,
            ],
            'attendees' => [
            ]
        ];

        $jsonString = file_get_contents(base_path('data.json'));
        $data = json_decode($jsonString, true);

        $id = is_array($data) ? count($data) + 1 : 1;

        $newData = array_prepend($newData, $id, 'id');
//        $newData = array_add($newData, 'created_at', Carbon::now()->toDateTimeString());

        if (is_array($data)) {
            array_push($data, $newData);
        }else {
            $data = [$newData];
        }
        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

        if (file_put_contents(base_path('data.json'), stripslashes($newJsonString))) {
            $jsonString = file_get_contents(base_path('data.json'));
            $data = json_decode($jsonString, true);

            return response()->json($data);
        }
    }

    public function addAttendee()
    {
        
    }

    public function updateTalk(Request $request, $id)
    {
        $jsonString = file_get_contents(base_path('data.json'));
        $data = json_decode($jsonString, true);

        foreach ($data as $key => $entry) {
            if (array_get($entry, 'id') == $id) {
                $newAttendee = [
                    'name' => $request->name,
                    'company' => $request->company,
                    'email' => $request->email,
                    'registered' => $request->registered,
                ];
                array_push($entry['attendees'], $newAttendee);
                $data[$key] = $entry;

                $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

                if (file_put_contents(base_path('data.json'), stripslashes($newJsonString))) {
                    //
                }
            }
        }

        $jsonString = file_get_contents(base_path('data.json'));
        $data = json_decode($jsonString, true);

        return response()->json($data);
    }

    public function deleteTalk($id)
    {
        $jsonString = file_get_contents(base_path('data.json'));
        $data = json_decode($jsonString, true);

        foreach ($data as $key => $entry) {
            if (array_get($entry, 'id') == $id) {

                unset($data[$key]);
                $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

                if (file_put_contents(base_path('data.json'), stripslashes($newJsonString))) {
                    //
                }
            }
        }

        $jsonString = file_get_contents(base_path('data.json'));
        $data = json_decode($jsonString, true);

        return response()->json($data);
    }
}
