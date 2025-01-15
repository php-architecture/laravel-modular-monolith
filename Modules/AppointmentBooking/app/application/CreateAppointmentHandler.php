<?php

namespace Modules\AppointmentBooking\application;

use Exception;
use Illuminate\Support\Facades\DB;
use Modules\DoctorAvailability\Services\interfaces\ReserveSlotInterface;
use Modules\AppointmentBooking\domain\contracts\AppointmentRepoInterface;

class CreateAppointmentHandler
{
    private $appointmentRepo;
    private $reserveSlotService;
    public function __construct(AppointmentRepoInterface $appointmentRepo, ReserveSlotInterface $reserveSlot)
    {
        $this->appointmentRepo    = $appointmentRepo;
        $this->reserveSlotService = $reserveSlotInterface;
    }

    public function handle(array $data)
    {
        DB::beginTransaction();
        try {
            $this->reserveSlotService->reserveSlot($data['slot_id']);
            $this->appointmentRepo->bookAppointment($data);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
