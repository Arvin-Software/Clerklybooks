<?php
class newsagencyapi{
public static function insertEntrySo($dt, $custnm, $sono, $invno, $valid, $stat){
    khatral::khquery('INSERT INTO entryso VALUES(NULL, :dt, :custnm, :sono, :invno, :valid, :stat, :inst)', array(
        ':dt'=>$dt,
        ':custnm'=>$custnm,
        ':sono'=>$sono,
        ':invno'=>$invno,
        ':valid'=>$valid,
        ':stat'=>$stat,
        ':inst'=>$_SESSION['instnm']
    ));
}
public static function insertItemsSo($itemn, $hsn, $quant, $rte, $cgst, $sgst, $tot, $entrypo){
    khatral::khquery('INSERT INTO itemsso VALUES(NULL, :nm, :hsn, :quant, :rte, :cgst, :sgst, :tot, :entrypo)', array(
        ':nm'=>$itemn,
        ':hsn'=>$hsn,
        ':quant'=>$quant,
        ':rte'=>$rte,
        ':cgst'=>$cgst,
        ':sgst'=>$sgst,
        ':tot'=>$tot,
        ':entrypo'=>$entrypo
    ));
}
public static function insertSotxTot($freight, $dis, $terms, $poid){
    khatral::khquery('INSERT INTO totandtaxso VALUES(NULL, :fright, :discounts, :terms, :poid)', array(
        ':fright'=>$freight,
        ':discounts'=>$dis,
        ':terms'=>$terms,
        ':poid'=>$poid
    ));
}
}
?>