<?php

namespace ScriptingThoughts\Services;

use Uploadcare\Api;
use Uploadcare\File;
use Uploadcare\Configuration;
use Uploadcare\Uploader;

class Uploadcare
{
   public function uploadPdf($pdfFilePath, $id) {

      // Initialize Uploadcare configuration
      $configuration = Configuration::create($_ENV["UPLOADCARE_API_PUBLIC"], $_ENV["UPLOADCARE_API_SECRET"]);
      $api = new Api($configuration);

      $uploader = new Uploader\Uploader($configuration);

      // Upload the PDF file using Uploadcare PHP SDK
      $fileInfo = $uploader->fromPath($pdfFilePath, 'pdf', 'contract_'.$id, 'auto' , ['ID' => $id]);

      // Check if file upload was successful
      if ($fileInfo instanceof File) {
         // Retrieve the uploaded file UUID
         $fileUuid = $fileInfo->getUuid();

         // Return the uploaded file information
         return [
            "uploaded" => true,
            "uuid" => $fileUuid
         ];

      } else {
         // File upload failed
         return [
            "uploaded" => false
         ];
      }
   }
}
