CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Troubleshooting
 * Example
 * FAQ
 * Maintainers


INTRODUCTION
---------------------

This module integrates Drupal applications with AWS Cloudwatch service.

* It provides forms to search for specific/all logs in the AWS cloudwatch.
* Provides services/forms to create/delete log groups and log streams from
  Drupal application itself.
* Provide feature to download logs in CSV file.
* Also, it provides service to log custom messages in the desired log group
  of AWS Cloudwatch logs.


REQUIREMENTS
---------------------

The Project needs Key module for storage of AWS API key/secret.
It also uses AWS SDK for PHP v3. If the module is installed via Composer it
gets automatically installed.

In addition, you need the PHP's curl extension installed for the SDK to
be able to communicate with AWS Cloudwatch.


INSTALLATION
---------------------

Install as you would normally install a Drupal contributed module.


CONFIGURATION
---------------------

Configure module settings in Administration Â» Reports Â» AWS Cloudwatch Logs:

Under the Settings tab:

  * Click on Basic Settings:
    - Fill out the Region where your application is hosted in AWS.
    - Version: If left empty, the latest version will be used.
  * Authentication:
    - Select the access key and secret of the IAM user with apt
      roles/permissions assign for the AWS Cloudwatch connection.


EXAMPLE
---------------------
PutLogEvents service can be used to log custom messages in aws cloudwatch log.

  * Construct AWS Cloudwatch client.
      $putLogsHandler = \Drupal::service('aws_cloudwatchlogs.put_log_events');
      $awsClient = $putLogsHandler->getClient();
      $putLogsHandler->putLog(
        $awsClient,
        'message to log',
        'logGroupName,
        'logStreamName'
      );

  * Service putLog needs 4 parameter.
    - AWS Cloudwatch client.
    - The message to log.
    - The log group for the log. If specified log group does not exist.
      This service will create a new one.
    - The log stream name for the log. If specified log stream does not exist.
      This service will create a new one under respective log group.


MAINTAINERS
---------------------

Current maintainers:
  * Akansha Saxena : (https://www.drupal.org/u/saxenaakansha30gmailcom)
