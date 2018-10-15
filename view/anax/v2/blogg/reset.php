<?php
namespace sapt17\Blogg ;

require "header.php";
$resultset = $app->session->get("resultset") ?? null;
// Restore the database to its original settings
$file   = "sql/setup.sql";
$mysql  = "/usr/bin/mysql";
$output = null;

// Extract hostname and databasename from dsn
$dsnDetail = [];
preg_match("/mysql:host=(.+);dbname=([^;.]+)/", $app->db->dsn, $dsnDetail);
$host = $dsnDetail[1];
$database = $dsnDetail[2];
$login = $app->db["login"];
$password = $app->db["password"];

if (isset($_POST["reset"]) || isset($_GET["reset"])) {
    $command = "$mysql -h{$host} -u{$login} -p{$password} $database < $file 2>&1";
    $output = [];
    $status = null;
    $res = exec($command, $output, $status);
    $output = "<p>The command was: <code>$command</code>.<br>The command exit status was $status."
        . "<br>The output from the command was:</p><pre>"
        . print_r($output, 1);
}

?>
<form method="post">
    <input type="submit" name="reset" value="Reset database">
    <?= $output ?>
</form>
