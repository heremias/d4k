<?php

namespace Drupal\n1ed\Flmngr\FileUploaderServer;

use Drupal\n1ed\Flmngr\FileUploaderServer\servlet\UploaderServlet;
use Exception;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * File Uploader server.
 * Handles all requests to upload features: processes and
 * returnes response JSON to HTTP request.
 * FlmngrServer delegates all upload requests to this module.
 */
class FileUploaderServer {

  /**
   * Processes file upload request.
   */
  public static function fileUploadRequest($config, RequestStack $request_stack) {

    try {
      $servlet = new UploaderServlet();
      $servlet->init($config);
      $servlet->doPost($request_stack, $_FILES);
    }
    catch (Exception $e) {
      error_log($e);
      throw $e;
    }

  }

}
