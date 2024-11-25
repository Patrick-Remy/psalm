<?php // phpcs:ignoreFile

/**
 * This contains the information needed to convert the function signatures for php 8.3 to php 8.2 (and vice versa)
 *
 * This file has three sections.
 * The 'added' section contains function/method names from FunctionSignatureMap (And alternates, if applicable) that do not exist in php 8.2
 * The 'removed' section contains the signatures that were removed in php 8.3
 * The 'changed' section contains functions for which the signature has changed for php 8.3.
 *     Each function in the 'changed' section has an 'old' and a 'new' section,
 *     representing the function as it was in PHP 8.2 and in PHP 8.3, respectively
 *
 * @see CallMap.php
 * @see https://php.watch/versions/8.3
 *
 * @phan-file-suppress PhanPluginMixedKeyNoKey (read by Phan when analyzing this file)
 */
return [
  'changed' => [
    'old' => [
      'locale_set_default' => ['bool', 'locale'=>'string']
    ],
    'new' => [
      'locale_set_default' => ['true', 'locale'=>'string']
    ]
  ]
];
