<?
$test = 'ad-ad   -- da';
echo $test;?>
<p>e</p>
<?= strpos("  ",$test);?>
<?echo "aa".preg_match('/^([A-Za-z]+)((-| ){1}([A-Za-z]+))*/',$test);
?>