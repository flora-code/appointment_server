<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    //variable declaration
    protected $appointmentModel;


    //constructor
    public function __construct()
    {
        $this->appointmentModel = new Appointment();
    }

    //get appointments
    public function getAppointments()
    {
        return $this->appointmentModel->getAppointments();
    }


    //get a single appointment by Id
    public function getAppointment($appointmentId)
    {
        return $this->appointmentModel->getAppointment($appointmentId);
    }


    //post appointment to db
    public function postAppointment(Request $request)
    {
        return $this->appointmentModel->postAppointment($request);
    }



    //Edit an appointment
    public function putAppointment(Request $request, $appointmentId)
    {
        return $this->appointmentModel->putAppointment($request, $appointmentId);
    }


    //delete an appointment
    public function deleteAppointment($appointmentId)
    {
        return $this->appointmentModel->deleteAppointment(
            $appointmentId
        );
    }
}
