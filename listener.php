<?php
require_once "vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

header("Content-Type: application/json");

date_default_timezone_set("Asia/Jakarta");

$content = file_get_contents("php://input");
$json    = json_decode($content, true);
$DIR     = preg_match("/\/$/", DIR) ? DIR : DIR . "/";

// create a log channel
$log = new Logger('listener');
$log->pushHandler(new StreamHandler(LOGFILE));

$log->debug($json);

echo json_encode($_SERVER, JSON_PRETTY_PRINT);
//
//// check if pushed branch matches branch specified in config
//if ($json["ref"] === BRANCH) {
//
//  // ensure directory is a repository
//  if (file_exists($DIR . ".git") && is_dir($DIR)) {
//    // change directory to the repository
//    chdir($DIR);
//
//    // write to the log
//    fputs($file, "*** AUTO PULL INITIATED ***" . "\n");
//
//    /**
//     * Attempt to reset specific hash if specified
//     */
//    if (!empty($_GET["reset"]) && $_GET["reset"] === "true") {
//      // write to the log
//      fputs($file, "*** RESET TO HEAD INITIATED ***" . "\n");
//
//      exec(GIT . " reset --hard HEAD 2>&1", $output, $exit);
//
//      // reformat the output as a string
//      $output = (!empty($output) ? implode("\n", $output) : "[no output]") . "\n";
//
//      // if an error occurred, return 500 and log the error
//      if ($exit !== 0) {
//        http_response_code(500);
//        $output = "=== ERROR: Reset to head failed using GIT `" . GIT . "` ===\n" . $output;
//      }
//
//      // write the output to the log and the body
//      fputs($file, $output);
//      echo $output;
//    }
//
//    /**
//     * Attempt to execute BEFORE_PULL if specified
//     */
//    if (!empty(BEFORE_PULL)) {
//      // write to the log
//      fputs($file, "*** BEFORE_PULL INITIATED ***" . "\n");
//
//      // execute the command, returning the output and exit code
//      exec(BEFORE_PULL . " 2>&1", $output, $exit);
//
//      // reformat the output as a string
//      $output = (!empty($output) ? implode("\n", $output) : "[no output]") . "\n";
//
//      // if an error occurred, return 500 and log the error
//      if ($exit !== 0) {
//        http_response_code(500);
//        $output = "=== ERROR: BEFORE_PULL `" . BEFORE_PULL . "` failed ===\n" . $output;
//      }
//
//      // write the output to the log and the body
//      fputs($file, $output);
//      echo $output;
//    }
//
//    /**
//     * Attempt to pull, returing the output and exit code
//     */
//    exec(GIT . " pull 2>&1", $output, $exit);
//
//    // reformat the output as a string
//    $output = (!empty($output) ? implode("\n", $output) : "[no output]") . "\n";
//
//    // if an error occurred, return 500 and log the error
//    if ($exit !== 0) {
//      http_response_code(500);
//      $output = "=== ERROR: Pull failed using GIT `" . GIT . "` and DIR `" . DIR . "` ===\n" . $output;
//    }
//
//    // write the output to the log and the body
//    fputs($file, $output);
//    echo $output;
//
//    /**
//     * Attempt to checkout specific hash if specified
//     */
//    if (!empty($sha)) {
//      // write to the log
//      fputs($file, "*** RESET TO HASH INITIATED ***" . "\n");
//
//      exec(GIT . " reset --hard {$sha} 2>&1", $output, $exit);
//
//      // reformat the output as a string
//      $output = (!empty($output) ? implode("\n", $output) : "[no output]") . "\n";
//
//      // if an error occurred, return 500 and log the error
//      if ($exit !== 0) {
//        http_response_code(500);
//        $output = "=== ERROR: Reset failed using GIT `" . GIT . "` and \$sha `" . $sha . "` ===\n" . $output;
//      }
//
//      // write the output to the log and the body
//      fputs($file, $output);
//      echo $output;
//    }
//
//    /**
//     * Attempt to execute AFTER_PULL if specified
//     */
//    if (!empty(AFTER_PULL)) {
//      // write to the log
//      fputs($file, "*** AFTER_PULL INITIATED ***" . "\n");
//
//      // execute the command, returning the output and exit code
//      exec(AFTER_PULL . " 2>&1", $output, $exit);
//
//      // reformat the output as a string
//      $output = (!empty($output) ? implode("\n", $output) : "[no output]") . "\n";
//
//      // if an error occurred, return 500 and log the error
//      if ($exit !== 0) {
//        http_response_code(500);
//        $output = "=== ERROR: AFTER_PULL `" . AFTER_PULL . "` failed ===\n" . $output;
//      }
//
//      // write the output to the log and the body
//      fputs($file, $output);
//      echo $output;
//    }
//
//    // write to the log
//    fputs($file, "*** AUTO PULL COMPLETE ***" . "\n");
//  } else {
//    // prepare the generic error
//    $error = "=== ERROR: DIR `" . DIR . "` is not a repository ===\n";
//
//    // try to detemrine the real error
//    if (!file_exists(DIR)) {
//      $error = "=== ERROR: DIR `" . DIR . "` does not exist ===\n";
//    } elseif (!is_dir(DIR)) {
//      $error = "=== ERROR: DIR `" . DIR . "` is not a directory ===\n";
//    }
//
//    // bad request
//    http_response_code(400);
//
//    // write the error to the log and the body
//    fputs($file, $error);
//    echo $error;
//  }
//} else{
//  $error = "=== ERROR: Pushed branch `" . $json["ref"] . "` does not match BRANCH `" . BRANCH . "` ===\n";
//
//  // bad request
//  http_response_code(400);
//
//  // write the error to the log and the body
//  fputs($file, $error);
//  echo $error;
//}
//
//// close the log
//fputs($file, "\n\n" . PHP_EOL);
//fclose($file);
