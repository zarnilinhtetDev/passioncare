<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\MoDoctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function mo_doctor()
    {
        return $this->hasOne(MoDoctor::class, "ticket_id");
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function healthRecord()
    {
        return $this->belognsTo(PatientHealthRecord::class);
    }

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class, "ticket_id");
    }

    public function mo_remark()
    {
        return $this->hasOne(MoRemark::class, "ticket_id");
    }

    public function physicalExamination()
    {
        return $this->hasOne(PhysicalExamination::class, "ticket_id");
    }

    public function physicalExaminationFinding()
    {
        return $this->hasOne(PhysicalExaminationFinding::class, "ticket_id");
    }

    public function physicalExaminationFinding2()
    {
        return $this->hasOne(PhysicalExaminationFinding2::class, "ticket_id");
    }

    public function referal()
    {
        return $this->hasOne(Referal::class, "ticket_id");
    }

    public function ticketStage()
    {
        return $this->hasOne(TicketStage::class, "ticket_id");
    }

    public function treatment_medications()
    {
        return $this->hasMany(TreatmentPlanMedication::class, "ticket_id");
    }

    public function treatment_procedures()
    {
        return $this->hasMany(TreatmentPlanProcedure::class, "ticket_id");
    }

    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class, "ticket_id");
    }
    public function followup_plan()
    {
        return $this->hasOne(FollowUpPlan::class, "ticket_id");
    }

    public function medical_visits()
    {
        return $this->hasMany(MedicalVisit::class, "ticket_id");
    }

    public function hospital_ongoing()
    {
        return $this->hasOne(HospitalOngoing::class, "ticket_id");
    }
}
