BEGIN:VCALENDAR
VERSION:2.0
METHOD:PUBLISH
X-WR-CALNAME: Woolman Public Calendar
PRODID:-//Drupal iCal API//EN
<?php
//echo $rows;
//$file = fopen('./rss', 'w');
//fwrite($file, $rows);
//fclose($file);
file_put_contents('/tmp/rss', $rows);
echo shell_exec('python ./rss2ical.py');
?>
END:VCALENDAR
