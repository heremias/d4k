<?php

namespace Drupal\aws_cloudwatchlogs;

/**
 * Provides an interface for using/defining Cloudwatch client.
 */
interface GetClientInterface {

  /**
   * Method to get the cloudwatch client.
   */
  public function getClient();

}
