<?php  
        $a = 99409633  ;
        $a1 = 41059081;
        $a2 = 58350552;
        $b = ($a * 7.5) / 100;
        $c = (int)$b;
        $d = ($b * 20)/100;
        $e = (int)$d;
        $f = ($b * 2)/100;
        $g = (int)$f;
        $h = $d + $f;
        $i = (int)$h;
        $j = $c - $i;
        $k = (int)$j;
        $l = ($a1 / $a)*100;
        $m = (int)$l;
        $n = ($a2 / $a)*100;
        $o = (int)$n;
        $p = ($k * 77) / 100;
        $q = (int)$p;
        $r = ($q * 50)/100;
        $s = (int)$r;
        $t = ($s * $m)/100;
        $u = (int)$t;
        
?>
<?= "A. Pembagian" ?><br>
<?php echo "Jumlah Incentive $c"?><br>
<?php echo "BP Manager 20% $e"?><br>
<?php echo "Dana Taktis 2% $g"?><br>
<?php echo "Jumlah $i"?><br>
<?php echo "Total Lapangan $k"?>
<br>
<br>

<?php echo "$q"?><br>
<?php echo "frontliner $s"?><br>
<?= "B. Direct" ?><br>
<?php echo "SERVICE ADVISOR $m% $u"?><br>
<?php echo "SERVICE ADVISOR $o%"?><br>
