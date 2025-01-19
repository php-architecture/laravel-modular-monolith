<?php

namespace Modules\AppointmentBooking\application;

use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\AppointmentBooking\domain\contracts\AppointmentRepoInterface;
use Modules\DoctorAvailability\Models\AvailabilityHour;
use Modules\DoctorAvailability\Services\interfaces\ReserveSlotInterface;

class CreateAppointmentHandler
{
    private $appointmentRepo;

    private $reserveSlotService;

    public function __construct(AppointmentRepoInterface $appointmentRepo, ReserveSlotInterface $reserveSlotService)
    {
        $this->appointmentRepo = $appointmentRepo;
        $this->reserveSlotService = $reserveSlotService;
    }

    public function handle(array $data)
    {
        DB::beginTransaction();
        try {
            /** @var AvailabilityHour $availabilityHour */
            $availabilityHour = $this->reserveSlotService->reserveSlot($data['slot_id']);

            $date = Carbon::parse(
                $availabilityHour->day->format('Y-m-d').' '.$availabilityHour->start_time->format('H:i:s')
            );

            $data['date'] = $date;

            $this->appointmentRepo->bookAppointment($data);
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
