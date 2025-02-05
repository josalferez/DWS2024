<?php

namespace app\controllers;


use app\models\AppointmentModel;

class AppointmentController {
    private $appointmentModel;

    public function __construct() {
        $this->appointmentModel = new AppointmentModel();
    }

    public function createAppointment($user_id, $date, $time) {
        return $this->appointmentModel->createAppointment($user_id, $date, $time);
    }

    public function getAppointmentsByUser($user_id) {
        return $this->appointmentModel->getAppointmentsByUser($user_id);
    }
}