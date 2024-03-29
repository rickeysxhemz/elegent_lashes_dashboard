<?php

namespace App\Repository;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\ClientCheckIn;
use App\Models\LocationUser;
use App\Helper\Helper;
use Exception;
use Illuminate\Http\Request;
use TCPDF;
use App\Models\ClientWaiver;
use App\Jobs\SendNotification;
use App\Notifications\TechnicianNotifications;

class Repository{

    private $privateStoragePath = 'private/signaturedPdf/';

    public function createClient($request)
    {
        try{
        session()->forget('phone');
        $token=Str::random(60);
        
        DB::beginTransaction();
        $client = new Client();
        $client->phone = $request->phone;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->save();
        
        $manager = LocationUser::with('location','manager')->where('user_id', auth()->user()->id)->first();
        
        $check_in=new ClientCheckIn();
        $check_in->manager_id=$manager->manager->id;
        $check_in->location_id=$manager->location->id;
        $check_in->client_id=$client->id;
        $check_in->save();
        
        DB::commit();
        
        SendNotification::dispatch('Hello manager, You have a new Check In by '.$client->first_name.' '.$client->last_name, auth()->user()->id);
        auth()->user()->notify(new TechnicianNotifications('Hello manager, You have a new Check In by '.$client->first_name.' '.$client->last_name,auth()->user()->id));

        session(['remember_token' => $token, 'client_id' => $client->id,'client_name'=>$client->first_name.' '.$client->last_name,'client_phone'=>$client->phone,'client_location'=>$manager->location->location]);
        
        return true;

    }catch(Exception $e){
        DB::rollback();
        $error = "Error: Message: " . $e->getMessage() . " File: " . $e->getFile() . " Line #: " . $e->getLine();
        Helper::errorLogs("Repository->createClient()", $error);
        return false;
        
    }
    }
    public function generateSignedPDF(Request $request)
    {
         
        // Validate the request data
        $request->validate([
            'signature' => 'required|string',
        ]);

         // Retrieve client information from the session
            $clientName = session('client_name');
            $clientPhone = session('client_phone');
            $clientLocation = LocationUser::with('location')->where('user_id', auth()->user()->id)->first();
            $location=$clientLocation->location->name;

        // Generate PDF with terms and conditions
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'B', 14); // Set a bold font with larger size for headings
        
        // Heading
        $pdf->Cell(0, 10, 'Eyelash Extension Procedure Liability Waiver', 0, 1, 'C'); // Centered heading
        $pdf->SetFont('helvetica', '', 12); // Reset font
        
        // Content
        $content = "
        Client Name: $clientName
        Client Phone: $clientPhone
        Client Location: $location
        Procedure to be Performed: Eyelash Extension Application
        
        As a client of Elegant Lashes by Katie LLC, I acknowledge and fully understand the risks involved in receiving eyelash extension procedures. I hereby agree to the following terms and conditions:
        
        1. Procedure Description and Risks: I understand that the procedure involves the application of individual synthetic eyelashes to my natural eyelashes using a specialized adhesive. Risks associated with the procedure may include, but are not limited to, eye irritation, eye pain, discomfort, and, in rare cases, temporary or permanent eyelash loss or eye injury.
        
        2. Health Conditions: I confirm that I have disclosed any known allergies, skin sensitivities, eye conditions, or medical conditions that may affect my suitability for the eyelash extension procedure.
        
        3. Aftercare and Instructions: I agree to follow all aftercare instructions provided by Elegant Lashes by Katie LLC to minimize potential risks and complications.
        
        4. No Guarantees: I acknowledge that results vary per individual, and there are no guarantees regarding the outcome of the procedure.
        
        5. Consent to Procedure: I consent to the eyelash extension application procedure and accept responsibility for my decision to undergo this procedure.
        
        6. Release of Liability: I hereby release Elegant Lashes by Katie LLC, its employees, and agents from all liabilities, claims, damages, or demands arising from or related to the eyelash extension procedure, except for instances of gross negligence or willful misconduct.
        
        7. Acknowledgment of Understanding: I have read this waiver and fully understand its contents. I am aware that by signing this waiver, I am waiving certain legal rights, including the right to sue.
        
        ";
        
        $pdf->MultiCell(0, 10, $content);
        $pdf->Ln(10);

        // Add "Signed by:" text
        $pdf->Cell(0, 10, 'Signed by:', 0, 1, 'C');

        // Process and save the signature image
        $signatureData = $request->input('signature');
        $signatureImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));
    
        // Embed the signature image in the PDF
        $signatureX = ($pdf->GetPageWidth() - 50) / 2; // Centered
        $pdf->Image('@' . $signatureImage, $signatureX, $pdf->GetY() + 10, 50, 20, 'PNG');
    
        

        // Check if the directory exists
            if (!file_exists(storage_path($this->privateStoragePath))) {
                // Create the directory recursively
                mkdir(storage_path($this->privateStoragePath), 0755, true);
            }
        // Save the PDF to the public/signaturedPdf folder
        
        $pdfFileName = time() . '_signed_document.pdf';
        $pdfPath = storage_path($this->privateStoragePath . $pdfFileName);
        $pdf->Output($pdfPath, 'F');
        
        $pdf_path = 'private/signaturedPdf/';
        // Save the PDF path to the database
        $signedDocument = new ClientWaiver();
        $signedDocument->client_id = session('client_id');
        $signedDocument->location_id=$clientLocation->location->id;
        $signedDocument->waiver_storage_path = $pdf_path . $pdfFileName;
        $signedDocument->save();

        // Output PDF to the browser or save it to a file
        // $pdf->Output('signed_document.pdf', 'I');
        return true;
    }

}