<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;



class LectureController extends Controller
{

    private function sendWhatsappNotification($phoneNumber, $message)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = 'whatsapp:' . env('TWILIO_WHATSAPP_FROM');

        $client = new Client($sid, $token); // Create an instance of Twilio's Client class

        try {
            $client->messages->create(
                'whatsapp:' . $phoneNumber, // The phone number you're sending the message to
                [
                    'from' => $from, // Your Twilio WhatsApp number
                    'body' => $message, // The message you're sending
                ]
            );
        } catch (\Exception $e) {
            Log::error("WhatsApp Notification Failed: " . $e->getMessage());
        }
    }

    /**
     * Display a listing of the lecture schedules.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.lectures')->with('lectures', Lecture::all());
    }

    /**
     * Store a newly created lecture schedule in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'lecture_name' => 'required|string|max:255',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'lecture_week' => 'required|string|max:50',
            'additional_notes' => 'nullable|string',
        ]);

        $lecture = new Lecture();
        $lecture->lecture_name = $request->lecture_name;
        $lecture->start_time = $request->start_time;
        $lecture->end_time = $request->end_time;
        $lecture->lecture_week = $request->lecture_week;
        $lecture->notes = $request->additional_notes;
        $lecture->save();

        // Notify students about the new lecture
        $students = Student::all();
        foreach ($students as $student) {
            $message = "A new lecture '{$lecture->lecture_name}' has been scheduled. 📅\n" .
            "🕒 Start Time: {$lecture->start_time}\n" .
            "🕒 End Time: {$lecture->end_time}\n" .
            "🗓 Week day: {$lecture->lecture_week}\n" .
            (!empty($lecture->notes) ? "📝 Notes: {$lecture->notes}" : "") .
                "\nPlease mark your calendar!";
            $this->sendWhatsappNotification($student->phone, $message);
        }

        flash()->success('Success', 'Lecture Record has been created successfully!');
        return redirect()->route('lectures.index');
    }


    /**
     * Update the specified lecture schedule in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Lecture $lecture)
    {
        $request->validate([
            'lecture_name' => 'required|string|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
            'lecture_week' => 'required|string',
            'additional_notes' => 'nullable|string|max:1000',
        ]);

        // Update the lecture details
        $lecture->lecture_name = $request->lecture_name;
        $lecture->start_time = $request->start_time;
        $lecture->end_time = $request->end_time;
        $lecture->lecture_week = $request->lecture_week;
        $lecture->notes = $request->additional_notes;

        // Save the updated lecture
        $lecture->save();

        $students = Student::all(); // Get all students

        // Define the template message and placeholders
        foreach ($students as $student) {
            $message = "📢 *Update: Your Lecture Schedule*\n" .
            "📝 *Lecture Name*: {$lecture->lecture_name}\n" .
            "🕒 *Start Time*: {$lecture->start_time}\n" .
            "🕒 *End Time*: {$lecture->end_time}\n" .
            "🗓 *Week*: {$lecture->lecture_week}\n\n" .
            "🔔 *Note*: The schedule has been updated. Please check and prepare accordingly.";


            // Use the pre-approved template format
            $this->sendWhatsappNotification($student->phone, $message);
        }

        // Flash success message
        flash()->success('Success', 'Lecture details have been updated successfully!');

        // Redirect to the lectures index page
        return redirect()->route('lectures.index');
    }


    /**
     * Remove the specified lecture schedule from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Lecture $lecture)
    {
        $lectureName = $lecture->lecture_name;
        $lecture->delete();

        // Notify all students about the cancellation
        $students = Student::all();
        foreach ($students as $student) {
            $message = "The lecture '{$lectureName}' has been canceled. ❌\n" .
                "Please check your schedule for updates.";
            $this->sendWhatsappNotification($student->phone, $message);
        }

        flash()->success('Success', 'Lecture has been deleted, and students have been notified!');
        return redirect()->route('lectures.index');
    }


}
