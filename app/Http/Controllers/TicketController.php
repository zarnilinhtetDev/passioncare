<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Patient;
use App\Models\Referal;
use App\Models\MoRemark;
use App\Models\Diagnosis;
use App\Models\TicketStage;
use App\Models\FollowUpPlan;
use App\Models\MedicalVisit;
use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\PatientAddress;
use App\Models\HospitalBooking;
use App\Models\HospitalOngoing;
use App\Models\PatientInsurance;
use App\Models\PatientInitialTest;
use App\Models\PatientHealthRecord;
use App\Models\PhysicalExamination;
use App\Models\PatientEmergencyInfo;
use App\Models\TreatmentPlanProcedure;
use App\Models\TreatmentPlanMedication;
use App\Models\PhysicalExaminationFinding;
use App\Models\PhysicalExaminationFinding2;

class TicketController extends Controller
{
    public function index()
    {
        return view('patient.ticket.ticket');
    }
    public function ticket_info()
    {
        return view('patient.ticket.ticket_info');
    }

    public function view_ticket(Ticket $ticket)
    {
        $patient = $ticket->patient;
        $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
        $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
        $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
        $p_address = PatientAddress::where('patient_id', $patient->id)->first();
        $booking = HospitalBooking::where('patient_id', $patient->id)->first();
        $health_record = PatientHealthRecord::where('patient_id', $patient->id)->first();
        $medical_history = $ticket->medicalHistory;
        $mo_remark = $ticket->mo_remark;
        $physical_examination = $ticket->physicalExamination;
        $physical_exam_finding = $ticket->physicalExaminationFinding;
        $physical_exam_finding2 = $ticket->physicalExaminationFinding2;
        $ticket_stage = $ticket->ticketStage;
        $diagnosis = $ticket->diagnosis;
        $medications = $ticket->treatment_medications;
        $procedures = $ticket->treatment_procedures;
        $referal = $ticket->referal;
        $follow_up = $ticket->followup_plan;
        $medical_visits = $ticket->medical_visits;

        // dd($medications);
        return view('patient.ticket.view_ticket', compact('patient', 'ticket', 'emergency', 'insurance', 'initial', 'p_address', 'booking', 'health_record', 'medical_history', 'ticket_stage', 'physical_examination', 'physical_exam_finding', 'physical_exam_finding2', 'diagnosis', 'medications', 'procedures', 'referal', 'follow_up', 'medical_visits', 'mo_remark'));
    }

    public function createTicket(PatientHealthRecord $health_record)
    {
        $patient = Patient::where('id', $health_record->patient_id)->first();
        $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
        $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
        $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
        $p_address = PatientAddress::where('patient_id', $patient->id)->first();
        $booking = HospitalBooking::where('patient_id', $patient->id)->first();
        // $health_record = PatientHealthRecord::where('patient_id', $patient->id)->first();
        $ticket_no = count(Ticket::withTrashed()->get());
        return view('patient.ticket.create_ticket', compact('patient', 'emergency', 'insurance', 'initial', 'p_address', 'booking', 'health_record', 'ticket_no'));
    }

    public function savePatient(Request $request, PatientHealthRecord  $patientHealthRecord)
    {

        $patientHealthRecord->ticket_created = "yes";
        $patientHealthRecord->update();

        $patient = $patientHealthRecord->patient;
        // dd($patient);
        $ticket = new Ticket();
        $ticket->mo_id = $request->mo_id;
        $ticket->conservation_id = $patientHealthRecord->id;
        $ticket->patient_name = $patient->name;
        $ticket->patient_phno = $patient->phno;
        $ticket->patient_id = $patient->id;
        $ticket->patient_complaint = $request->patient_complaint;
        $ticket->save();
        // dd($patient->id);

        //create medicalhistory
        $medical_history = new MedicalHistory();
        $medical_history->ticket_id = $ticket->id;
        $medical_history->patient_id = $patient->id;
        $medical_history->save();

        //create ticketstage
        $ticket_stage = new TicketStage();
        $ticket_stage->ticket_id = $ticket->id;
        $ticket_stage->patient_id = $patient->id;
        $ticket_stage->save();

        //create PhysicalExamination
        $physical_exam = new PhysicalExamination();
        $physical_exam->ticket_id = $ticket->id;
        $physical_exam->patient_id = $patient->id;
        $physical_exam->save();

        //create PhysicalExamination Finding
        $physical_exam_find = new PhysicalExaminationFinding();
        $physical_exam_find->ticket_id = $ticket->id;
        $physical_exam_find->patient_id = $patient->id;
        $physical_exam_find->save();

        //create PhysicalExamination Finding 2
        $physical_exam_find2 = new PhysicalExaminationFinding2();
        $physical_exam_find2->ticket_id = $ticket->id;
        $physical_exam_find2->patient_id = $patient->id;
        $physical_exam_find2->save();

        //create Diagnosis
        $diagnosis = new Diagnosis();
        $diagnosis->ticket_id = $ticket->id;
        $diagnosis->patient_id = $patient->id;
        $diagnosis->save();

        //create moremark
        $mo_remark = new MoRemark();
        $mo_remark->ticket_id = $ticket->id;
        $mo_remark->patient_id = $patient->id;
        $mo_remark->save();

        //create medical visit
        $medical_visit = new MedicalVisit();
        $medical_visit->ticket_id = $ticket->id;
        $medical_visit->patient_id = $patient->id;
        $medical_visit->save();

        //create followup plan
        $follow_up_plan = new FollowUpPlan();
        $follow_up_plan->ticket_id = $ticket->id;
        $follow_up_plan->patient_id = $patient->id;
        $follow_up_plan->save();

        //create referal
        $referal = new Referal();
        $referal->ticket_id = $ticket->id;
        $referal->patient_id = $patient->id;
        $referal->save();

        //create treatment plan procedure
        $treament = new TreatmentPlanProcedure();
        $treament->ticket_id = $ticket->id;
        $treament->patient_id = $patient->id;
        $treament->save();

        //create treatment plan medication
        $treament_medication = new TreatmentPlanMedication();
        $treament_medication->ticket_id = $ticket->id;
        $treament_medication->patient_id = $patient->id;
        $treament_medication->save();

        return redirect('mo_home')->with('success', 'Ticket Created Successfully!');
    }

    public function saveMedicalHistory(Request $request, Patient $patient)
    {
        // dd($request);
        $medical_history = new MedicalHistory();
        $medical_history->ticket_id = $request->ticket_id;
        $medical_history->patient_id = $patient->id;
        $medical_history->hospital_name = $request->hospital_name;
        $medical_history->treatment_date = $request->treatment_date;
        $medical_history->hospitalization_length = $request->hospitalization_length;
        $medical_history->hospitalization_reason = $request->hospitalization_reason;
        $medical_history->other = $request->other;
        $medical_history->past_medical_history = $request->past_medical_history;
        $medical_history->tobacco_consumption = $request->tobacco_consumption;
        $medical_history->alcohol_consumption = $request->alcohol_consumption;
        $medical_history->betel_consumption = $request->betel_consumption;
        $medical_history->drug = $request->drug;
        $medical_history->current_medication = $request->current_medication;
        $medical_history->history_hospital_name = $request->history_hospital_name;
        $medical_history->history_treatment_date = $request->history_treatment_date;

        $files = $request->file('document');
        if ($files) {
            $imagename = time() . '.' . $files->getClientOriginalExtension();
            $files->move('MedicalHistory', $imagename);
            $medical_history->document =  $imagename;
        }
        $medical_history->save();
        return redirect()->back()->with('success', 'Medical History Created Successfully!');
    }

    public function saveTicketStage(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $ticket->ticket_stage = $request->ticket_stage;
        $ticket->update();
        TicketStage::create($request->all());
        return redirect()->back()->with('success', 'Ticket Stage Created Successfully!');
    }

    public function savePhysicalExamination(Request $request)
    {
        PhysicalExamination::create($request->all());
        return redirect()->back()->with('success', 'Physical Examination Created Successfully!');
    }

    public function savePhysicalExaminationFinding(Request $request)
    {
        PhysicalExaminationFinding::create($request->all());
        return redirect()->back()->with('success', 'Physical Examination Finding Created Successfully!');
    }

    public function savePhysicalExaminationFinding2(Request $request)
    {
        PhysicalExaminationFinding2::create($request->all());
        return redirect()->back()->with('success', 'Physical Examination Finding 2 Created Successfully!');
    }

    public function saveDiagnosis(Request $request)
    {
        $diagnosis = new Diagnosis();
        $laboratory = $request->file('laboratory_tests');
        $image_study = $request->file('imaging_studies');
        $other_results = $request->file('other_results');

        if ($laboratory) {
            $imagename = time() . '.' . $laboratory->getClientOriginalExtension();
            $laboratory->move('Diagnosis', $imagename);
            $diagnosis->labortary_tests =  $imagename;
        }

        if ($image_study) {
            $imagename = time() . '.' . $image_study->getClientOriginalExtension();
            $image_study->move('Diagnosis', $imagename);
            $diagnosis->imaging_studies =  $imagename;
        }

        if ($other_results) {
            $imagename = time() . '.' . $image_study->getClientOriginalExtension();
            $other_results->move('Diagnosis', $imagename);
            $diagnosis->other_diagnosis =  $imagename;
        }

        $diagnosis->patient_id = $request->patient_id;
        $diagnosis->ticket_id = $request->ticket_id;
        $diagnosis->primary_diagnosis = $request->primary_diagnosis;
        $diagnosis->secondary_diagnosis = $request->secondary_diagnosis;
        $diagnosis->save();
        return redirect()->back()->with('success', 'Diagnosis Created Successfully!');
    }

    public function mo_remark(Request $request, Patient $patient)
    {
        $ticket_no = count(Ticket::withTrashed()->get());
        $mo_remark = new MoRemark();
        $mo_remark->ticket_id = $ticket_no;
        $mo_remark->patient_id = $patient->id;
        $mo_remark->remark = $request->mo_remark2;
        $mo_remark->save();
        return redirect()->back()->with('success', 'Remark Added Successfully!');
    }

    public function medical_visit(Request $request, Patient $patient)
    {
        // $ticket_no = count(Ticket::withTrashed()->get());
        $count = count($request->date);
        for ($i = 0; $i < $count; $i++) {
            $medical_visit = new MedicalVisit();
            $medical_visit->visited_date = $request->input('date')[$i];
            $medical_visit->progress = $request->input('progress')[$i];
            $medical_visit->ticket_id = $request->ticket_no;
            $medical_visit->patient_id = $patient->id;
            $medical_visit->save();
        }
        return redirect()->back()->with('success', 'Medical Visit Added Successfully!');
    }

    public function follow_up_plan(Request $request, Patient $patient)
    {
        $follow_up_plan = new FollowUpPlan();
        $follow_up_plan->ticket_id = $request->ticket_no;
        $follow_up_plan->patient_id = $patient->id;
        $follow_up_plan->plan = $request->follow_up_plan;
        $follow_up_plan->save();
        return redirect()->back()->with('success', 'Follow Up Plan Added Successfully!');
    }

    public function Referral_to_specialist(Request $request, Patient $patient)
    {
        $follow_up_plan = new Referal();
        $follow_up_plan->ticket_id = $request->ticket_no;
        $follow_up_plan->patient_id = $patient->id;
        $follow_up_plan->referals = $request->referals;
        $follow_up_plan->save();
        return redirect()->back()->with('success', 'Referral Added Successfully!');
    }

    public function treatment_plan_procedure(Request $request, Patient $patient)
    {
        $count = count($request->procedure);
        for ($i = 0; $i < $count; $i++) {
            $treament = new TreatmentPlanProcedure();
            $treament->procedure = $request->input('procedure')[$i];
            $treament->physician = $request->input('physician')[$i];
            $treament->strength = $request->input('strength')[$i];
            $treament->date = $request->input('date')[$i];
            $treament->start_time = $request->input('start_time')[$i];
            $treament->end_time = $request->input('end_time')[$i];
            $treament->remark = $request->input('remark')[$i];
            $treament->ticket_id = $request->ticket_no;
            $treament->patient_id = $patient->id;
            $treament->save();
        }
        return redirect()->back()->with('success', 'Treatment Plan Procedure Added Successfully!');
    }

    public function treatment_plan_medical(Request $request, Patient $patient)
    {
        // dd($request->all());
        $count = count($request->route);
        for ($i = 0; $i < $count; $i++) {
            $treament = new TreatmentPlanMedication();
            $treament->route = $request->input('route')[$i];
            $treament->brand_name = $request->input('brand_name')[$i];
            $treament->strength = $request->input('strength')[$i];
            $treament->qty = $request->input('qty')[$i];
            $treament->frequency = $request->input('frequency')[$i];
            $treament->start_date = $request->input('start_date')[$i];
            $treament->end_date = $request->input('end_date')[$i];
            $treament->remark = $request->input('remark')[$i];
            $treament->ticket_id = $request->ticket_no;
            $treament->patient_id = $patient->id;
            $treament->save();
        }
        return redirect()->back()->with('success', 'Treatment Plan medical Added Successfully!');
    }

    public function editTicket(Ticket $ticket)
    {
        $patient = $ticket->patient;
        $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
        $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
        $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
        $p_address = PatientAddress::where('patient_id', $patient->id)->first();
        $booking = HospitalBooking::where('patient_id', $patient->id)->first();
        $health_record = PatientHealthRecord::where('patient_id', $patient->id)->first();
        $medical_history = $ticket->medicalHistory;
        $mo_remark = $ticket->mo_remark;
        $physical_examination = $ticket->physicalExamination;
        $physical_exam_finding = $ticket->physicalExaminationFinding;
        $physical_exam_finding2 = $ticket->physicalExaminationFinding2;
        $ticket_stage = $ticket->ticketStage;
        $diagnosis = $ticket->diagnosis;
        $medications = $ticket->treatment_medications;
        $procedures = $ticket->treatment_procedures;
        $referal = $ticket->referal;
        $follow_up = $ticket->followup_plan;
        $medical_visits = $ticket->medical_visits;

        // dd($medications);
        return view('patient.ticket.edit_ticket', compact('patient', 'ticket', 'emergency', 'insurance', 'initial', 'p_address', 'booking', 'health_record', 'medical_history', 'ticket_stage', 'physical_examination', 'physical_exam_finding', 'physical_exam_finding2', 'diagnosis', 'medications', 'procedures', 'referal', 'follow_up', 'medical_visits', 'mo_remark'));
    }


    public function updateMedicalHistory(Request $request, Ticket $ticket)
    {
        // dd($request->hospital_name);
        $medical_history = $ticket->medicalHistory;
        $medical_history->hospital_name = $request->hospital_name;
        $medical_history->treatment_date = $request->treatment_date;
        $medical_history->hospitalization_length = $request->hospitalization_length;
        $medical_history->hospitalization_reason = $request->hospitalization_reason;
        $medical_history->other = $request->other;
        $medical_history->past_medical_history = $request->past_medical_history;
        $medical_history->tobacco_consumption = $request->tobacco_consumption;
        $medical_history->alcohol_consumption = $request->alcohol_consumption;
        $medical_history->betel_consumption = $request->betel_consumption;
        $medical_history->drug = $request->drug;
        $medical_history->current_medication = $request->current_medication;
        $medical_history->history_hospital_name = $request->history_hospital_name;
        $medical_history->history_treatment_date = $request->history_treatment_date;

        $files = $request->file('new_document');
        if ($files) {

            $old_file_path = public_path('MedicalHistory/' . $request->old_document);

            if (file_exists($old_file_path)) {
                if (is_file($old_file_path)) {
                    unlink($old_file_path);
                }
            }

            $imagename = time() . '.' . $files->getClientOriginalExtension();
            $files->move('MedicalHistory', $imagename);
            $medical_history->document =  $imagename;
        } else {
            $medical_history->document = $request->old_document;
        }
        $medical_history->update();
        return redirect()->back()->with('success', 'Medical History Updated Successfully!');
    }

    public function updateTicketStage(Request $request, Ticket $ticket)
    {

        $ticket = Ticket::find($ticket->id);
        // dd($ticket);
        //update ticket
        $ticket->ticket_stage = $request->ticket_stage;
        $ticket->update();

        $h_ongoing = HospitalOngoing::where("ticket_id", "like", $ticket->id)->get()->first();
        if ($h_ongoing) {
            $h_ongoing->ticket_stage = $request->ticket_stage;
            $h_ongoing->mo_remark = $request->mo_remark;
            $h_ongoing->update();
        }

        $ticket_stage = TicketStage::where("ticket_id", $ticket->id)->get()->first();
        if ($ticket_stage) {
            $ticket_stage->update($request->all());
        } else {
            $stage = new TicketStage();
            $stage->patient_id = $ticket->patient->id;
            $stage->ticket_id = $ticket->id;
            $stage->ticket_stage = $request->ticket_stage;
            $stage->mo_remark = $request->mo_remark;
            $stage->save();
        }
        // dd($ticket_stage);
        // $stage = $ticket->ticketStage;
        // $stage->save($request->all());
        return redirect()->back()->with('success', 'Ticket Stage Updated Successfully!');
    }

    public function updatePhysicalExamination(Request $request, Ticket $ticket)
    {
        $pe = $ticket->physicalExamination;
        $pe->update($request->all());
        return redirect()->back()->with('success', 'Physical Examination Stage Updated Successfully!');
    }

    public function updatePhysicalExaminationFinding(Request $request, Ticket $ticket)
    {
        $pe = $ticket->physicalExaminationFinding;
        $pe->update($request->all());
        return redirect()->back()->with('success', 'Physical Examination Finding Updated Successfully!');
    }

    public function updatePhysicalExaminationFinding2(Request $request, Ticket $ticket)
    {
        $pe = $ticket->physicalExaminationFinding2;
        $pe->update($request->all());
        return redirect()->back()->with('success', 'Physical Examination Finding 2 Updated Successfully!');
    }

    public function updateDiagnosis(Request $request, Ticket $ticket)
    {

        $dgs = $ticket->diagnosis;
        // dd($dgs);
        $laboratory = $request->file('new_laboratory_tests');
        $image_study = $request->file('new_imaging_studies');
        $other_results = $request->file('new_other_results');

        if ($laboratory) {

            $old_file_path = public_path('Diagnosis/' . $request->old_laboratory_tests);

            if (file_exists($old_file_path)) {
                if (is_file($old_file_path)) {
                    unlink($old_file_path);
                }
            }

            $imagename = time() . 'l.' . $laboratory->getClientOriginalExtension();
            $laboratory->move('Diagnosis', $imagename);
            $dgs->labortary_tests =  $imagename;
        } else {
            $dgs->labortary_tests = $request->old_laboratory_tests;
        }

        if ($image_study) {

            $old_file_path = public_path('Diagnosis/' . $request->old_imaging_studies);

            if (file_exists($old_file_path)) {
                if (is_file($old_file_path)) {
                    unlink($old_file_path);
                }
            }

            $imagename = time() . 'i.' . $image_study->getClientOriginalExtension();
            $image_study->move('Diagnosis', $imagename);
            $dgs->imaging_studies =  $imagename;
        } else {
            $dgs->imaging_studies = $request->old_imaging_studies;
        }

        if ($other_results) {

            $old_file_path = public_path('Diagnosis/' . $request->old_other_results);

            if (file_exists($old_file_path)) {
                if (is_file($old_file_path)) {
                    unlink($old_file_path);
                }
            }

            $imagename = time() . 'r.' . $image_study->getClientOriginalExtension();
            $other_results->move('Diagnosis', $imagename);
            $dgs->other_diagnosis =  $imagename;
        } else {
            $dgs->other_diagnosis = $request->old_other_results;
        }

        $dgs->primary_diagnosis = $request->primary_diagnosis;
        $dgs->secondary_diagnosis = $request->secondary_diagnosis;
        $dgs->update();
        return redirect()->back()->with('success', 'Diagnosis Updated Successfully!');
    }

    public function updateReferal(Request $request, Ticket $ticket)
    {
        $referal = $ticket->referal;
        $referal->update($request->all());
        return redirect()->back()->with('success', 'Referal Updated Successfully!');
    }

    public function updateFollowup(Request $request, Ticket $ticket)
    {
        $follow = $ticket->followup_plan;
        // dd($follow);
        $follow->plan = $request->follow_up_plan;
        $follow->update();
        return redirect()->back()->with('success', 'Followup Plan Updated Successfully!');
    }

    public function updateTreatmentMedical(Request $request, Ticket $ticket)
    {
        $medical_plans = $ticket->treatment_medications;
        // // dd($follow);
        foreach ($medical_plans as $medical_plan) {
            $medical_plan->delete();
        }

        $count = count($request->route);
        for ($i = 0; $i < $count; $i++) {
            $treament = new TreatmentPlanMedication();
            $treament->ticket_id = $ticket->id;
            $treament->patient_id = $request->patient_id;
            $treament->route = $request->input('route')[$i];
            $treament->brand_name = $request->input('brand_name')[$i];
            $treament->strength = $request->input('strength')[$i];
            $treament->qty = $request->input('qty')[$i];
            $treament->frequency = $request->input('frequency')[$i];
            $treament->start_date = $request->input('start_date')[$i];
            $treament->end_date = $request->input('end_date')[$i];
            $treament->remark = $request->input('remark')[$i];
            $treament->save();
        }
        return redirect()->back()->with('success', "Treatment Plan Medication Updated Successfully!");
    }

    public function updateTreatmentProcedure(Request $request, Ticket $ticket)
    {
        $medical_plans = $ticket->treatment_procedures;
        // // dd($follow);
        foreach ($medical_plans as $medical_plan) {
            $medical_plan->delete();
        }

        $count = count($request->procedure);
        for ($i = 0; $i < $count; $i++) {
            $treament = new TreatmentPlanProcedure();
            $treament->procedure = $request->input('procedure')[$i];
            $treament->physician = $request->input('physician')[$i];
            $treament->strength = $request->input('strength')[$i];
            $treament->date = $request->input('date')[$i];
            $treament->start_time = $request->input('start_time')[$i];
            $treament->end_time = $request->input('end_time')[$i];
            $treament->remark = $request->input('remark')[$i];
            $treament->ticket_id = $ticket->id;
            $treament->patient_id = $request->patient_id;
            $treament->save();
        }

        return redirect()->back()->with('success', "Treatment Plan Procedures Updated Successfully!");
    }

    public function updateMedicalVisit(Request $request, Ticket $ticket)
    {
        $medical_plans = $ticket->medical_visits;
        // // dd($follow);
        foreach ($medical_plans as $medical_plan) {
            $medical_plan->delete();
        }

        $count = count($request->date);
        for ($i = 0; $i < $count; $i++) {
            $medical_visit = new MedicalVisit();
            $medical_visit->visited_date = $request->input('date')[$i];
            $medical_visit->progress = $request->input('progress')[$i];
            $medical_visit->ticket_id = $ticket->id;
            $medical_visit->patient_id = $request->patient_id;
            $medical_visit->save();
        }

        return redirect()->back()->with('success', "Medical Visit Updated Successfully!");
    }

    public function updateMoremark(Request $request, Ticket $ticket)
    {
        $mo_remark = $ticket->mo_remark;
        $mo_remark->remark = $request->mo_remark2;
        $mo_remark->update();
        return redirect()->back()->with('success', 'Mo Remark updated Successfully!');
    }

    public function ticketDelete(Ticket $ticket)
    {
        // $booking_delete = Ticket::find($id);
        $ticket->medicalHistory ? $ticket->medicalHistory->delete() : "";
        $ticket->ticketStage ? $ticket->ticketStage->delete() : "";
        $ticket->physicalExamination ? $ticket->physicalExamination->delete() : "";
        $ticket->physicalExaminationFinding ? $ticket->physicalExaminationFinding->delete() : "";
        $ticket->physicalExaminationFinding2 ? $ticket->physicalExaminationFinding2->delete() : "";
        $ticket->ticketStage ? $ticket->ticketStage->delete() : "";
        $ticket->diagnosis ? $ticket->diagnosis->delete() : "";
        $medications = $ticket->treatment_medications;
        if ($medications) {
            foreach ($medications as $medication) {
                $medication->delete();
            }
        }

        $procedures = $ticket->treatment_procedures;
        if ($procedures) {
            foreach ($procedures as $procedure) {
                $procedure->delete();
            }
        }
        $ticket->referal ? $ticket->referal->delete() : "";
        $ticket->followup_plan ? $ticket->followup_plan->delete() : "";

        $medical_visits = $ticket->medical_visits;
        if ($medical_visits) {
            foreach ($medical_visits as $medical_visit) {
                $medical_visit->delete();
            }
        }

        $ticket->mo_remark ? $ticket->mo_remark->delete() : "";
        $ticket->delete();
        return redirect("/mo_home")->with('delete', 'Ticket Successfully Deleted!');
    }

    public function viewAllTicket()
    {
        $patients = Patient::latest()->get();
        $tickets = Ticket::latest()->get();
        return view('patient.hospital_booking.view_all_booking', compact('patients', 'tickets'));
    }
}
