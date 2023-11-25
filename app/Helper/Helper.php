<?php

namespace App\Helper;

use App\Models\ErrorLog;

class Helper
{
    public static function errorLogs($function_name, $error)
    {
        $error_log = new ErrorLog;
        $error_log->function_name = $function_name;
        $error_log->exception = $error;
        $error_log->save();
    }

    function storePdf($request)
    {
            if (!$request->hasFile('pdf_file')) {
                return false;
            }

            $pdfFile = $request->file('pdf_file');
            $pdfExtension = $pdfFile->getClientOriginalExtension();

            if ($pdfExtension !== 'pdf') {
                // File extension is not PDF
                return false;
            }

            $pdfFileName = $pdfFile->hashName();
            $destination = 'storage/pdfFiles/' . $pdfFileName;

            $request->pdf_file->move(public_path('storage/pdfFiles'), $pdfFileName);

            return $destination;
    }
}