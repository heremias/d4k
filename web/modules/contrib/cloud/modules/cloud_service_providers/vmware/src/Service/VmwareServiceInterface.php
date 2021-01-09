<?php

namespace Drupal\vmware\Service;

/**
 * Vmware service interface.
 */
interface VmwareServiceInterface {

  /**
   * Set the cloud context.
   *
   * @param string $cloud_context
   *   Cloud context string.
   */
  public function setCloudContext($cloud_context);

  /**
   * Set credentials.
   *
   * @param array $credentials
   *   Credentials.
   */
  public function setCredentials(array $credentials);

  /**
   * Login to an VMware server.
   *
   * @return array
   *   The result of the login.
   */
  public function login();

}
