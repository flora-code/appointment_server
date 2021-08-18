<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillables = ['booking_status', 'price',  'date', 'time',   'midwife_id'];
    protected $dates = ['deleted_at', 'created_at'];


    //relations

    public function midwife()
    {
        return $this->belongsTo(Midwife::class);
    }

    //function

    public function getAppointments()
    {
        $appointments = Appointment::all();

        return response()->json(['appointments' => $appointments], 200);
    }


    public function getAppointment($appointmentId)
    {
        $appointment = Appointment::find($appointmentId);

        //if appointment is not found
        if (!$appointment) return response()->json(['error' => 'Appointment not found'], 404);

        //if appoint is found
        return response()->json(['appointment' => $appointment]);
    }


    public function postAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booking_status' => 'required',
            'price' => 'required',
            'date' => 'required',
            'time' => 'required',
            'midwife_id' => 'required'
        ]);
        //check if our request passses the validation we created

        if ($validator->fails()) return response()->json(['errors' => $validator->errors()]);


        //check if the midwife is available

        $midwife = Midwife::find($request->midwife_id);

        if (!$midwife) return response()->json(['errors' => 'midwife not found']);


        //create an appointment

        $appointment = new Appointment();

        $appointment->booking_status = $request->booking_status;
        $appointment->price = $request->price;
        $appointment->date = $request->date;
        $appointment->time = $request->time;

        //save this appointment using a midwife-appointment relationship

        $midwife->appointments()->save($appointment);

        return response()->json(['appointment' => $appointment]);
    }



    public function putAppointment(Request $request, $appointmentId)
    {
        $appointment = Appointment::find($appointmentId);

        //if appointment is not found
        if (!$appointment) return response()->json(['error' => 'Appointment not found'], 404);

        $appointment->update([
            'booking_status' => $request->booking_status,
            'price' => $request->price,
            'date' => $request->date,
            'time' => $request->time,
        ]);
        
        return response()->json(['appointment' => $appointment]);

    }


    public function deleteAppointment($appointmentId)
    {
        $appointment = Appointment::find($appointmentId);

        //if appointment is not found
        if (!$appointment) return response()->json(['error' => 'Appointment not found'], 404);


        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}
