<?php
class inventor{
    public static function insertcap($capnm, $usr){
        khatral::khquery('INSERT INTO cap VALUES(NULL, :mtrlnm, :usr)', array(':mtrlnm'=>$capnm, ':usr'=>$_SESSION['instnm']));
    }
    public static function insertmtrl($mtrlnm, $unit, $quant, $loc, $usr){
        khatral::khquery('INSERT INTO mtrl VALUES(\'\', :mtrlnm, :unit, :quant, :loc, :usr)', array(':mtrlnm'=>$mtrlnm, ':unit'=>$unit, ':quant'=>$quant, ':loc'=>$loc, ':usr'=>$_SESSION['instnm']));
        inventor::insertsrb($mtrlnm, $quant, '', $_SESSION['instnm']);    
    }
    public static function insertmtrlsales($code, $mtrlnm, $hsn, $rate, $cgst, $sgst, $openbal, $loc){
        khatral::khquery('INSERT INTO mtrlsales VALUES(NULL, :code, :mtrl_nm, :hsncode, :rate, :cgst, :sgst, :open_bal, :loc, :usr)', array(
            ':code'=>$code,
            ':mtrl_nm'=>$mtrlnm,
            ':hsncode'=>$hsn,
            ':rate'=>$rate,
            ':cgst'=>$cgst,
            ':sgst'=>$sgst,
            ':open_bal'=>$openbal,
            ':loc'=>$loc,
            ':usr'=>$_SESSION['instnm']
        ));
        inventor::insertsrbSales($mtrlnm, $openbal, '', $_SESSION['instnm']);    
    }
    public static function deletemtrlsales($mat_id){
        khatral::khquery('DELETE FROM mtrlsales WHERE mtrl_id=:id', array(
            ':id'=>$mat_id
        ));
    }
    public static function deletemtrl($matid, $usr){
        khatral::khquery('DELETE FROM mtrl WHERE mtrl_id=:id AND usr=:usr', array(':id'=>$matid, ':usr'=>$_SESSION['instnm']));
    }
    public static function insertmtrlforproduct($capmat, $matquan, $capid, $usr){
        khatral::khquery('INSERT INTO capmat VALUES(\'\', :capmat, :matquan, :capid, :usr)', array(
            ':capmat'=>$capmat,
            ':matquan'=>$matquan,
            ':capid'=>$capid, 
            ':usr'=>$_SESSION['instnm']
        ));
    }
    public static function deletemtrlforproduct($matid, $usr){
        khatral::khquery('DELETE FROM capmat WHERE cap_id=:capid AND usr=:usr', array(
            ':capid'=>$matid,
            ':usr'=>$_SESSION['instnm']
        ));
    }
    // $query = 'CREATE TABLE IF NOT EXISTS entrydc(
    //     dc_id           INTEGER         NOT NULL,
    //     dt              DATE            NOT NULL,
    //     suppnm          VARCHAR(255)    NOT NULL,
    //     dcno            VARCHAR(255)    NOT NULL,
    //     inst            VARCHAR(255)    NOT NULL,
    //     PRIMARY KEY(dc_id))';
    public static function insertdet($dt, $supnm, $invno, $dcno, $vehno, $instnm){
        khatral::khquery('INSERT INTO entrymo VALUES(\'\', :dt, :supnm, :invno, :dcno, :vehno, :instnm)', array(':dt'=>$dt, ':supnm'=>$supnm, ':invno'=>$invno, ':dcno'=>$dcno, ':vehno'=>$vehno, ':instnm'=>$instnm));
        khatral::khquery('INSERT INTO entrydc VALUES(\'\', :dt, :suppnm, :dcno, :inst)', array(':dt'=>$dt, ':suppnm'=>$supnm, ':dcno'=>$dcno, ':inst'=>$instnm));
    }
    public static function insertitem($itemnm, $quant, $rte, $cgst, $sgst, $tot, $entrymo){
        khatral::khquery('INSERT INTO items VALUES(\'\', :itemnm, :quant, :rte, :cgst, :sgst, :tot, :entrymo)', array(
            ':itemnm'=>$itemnm,
            ':quant'=>$quant,
            ':rte'=>$rte,
            ':cgst'=>$cgst,
            ':sgst'=>$sgst,
            ':tot'=>$tot,
            ':entrymo'=>$entrymo
        ));
    }
    public static function insertitemdc($itemnm, $quant, $entrydc){
        khatral::khquery('INSERT INTO itemsdc VALUES(NULL, :itemnm, :quant, :entrydc)', array(
            ':itemnm'=>$itemnm,
            ':quant'=>$quant,
            ':entrydc'=>$entrydc
        ));
    }
    
    public static function insertsrb($matnm, $qty, $rem, $usr){
        khatral::khquery('INSERT INTO srb VALUES(\'\', :matnm, :qty, :rem, :usr)', array(
            ':matnm'=>$matnm,
            ':qty'=>$qty,
            ':rem'=>$rem,
            ':usr'=>$usr
        ));
    }
    public static function insertsrbSales($matnm, $qty, $rem, $usr){
        khatral::khquery('INSERT INTO srbsales VALUES(\'\', :matnm, :qty, :rem, :usr)', array(
            ':matnm'=>$matnm,
            ':qty'=>$qty,
            ':rem'=>$rem,
            ':usr'=>$usr
        ));
    }
    public static function insertGRN($grnno, $dt, $dcno, $suppnm, $unm, $inst){
        khatral::khquery('INSERT INTO grn VALUES(NULL, :grnno, :dt, :dcno, :suppnm, :unm, :instnm)', array(
            ':grnno'=>$grnno,
            ':dt'=>$dt,
            ':dcno'=>$dcno,
            ':suppnm'=>$suppnm,
            ':unm'=>$_SESSION['unme'],
            ':instnm'=>$_SESSION['instnm']
        ));
    }
    public static function insertGRNSales($grnno, $dt, $dcno, $suppnm, $unm, $inst){
        khatral::khquery('INSERT INTO grnsales VALUES(NULL, :grnno, :dt, :dcno, :suppnm, :unm, :instnm)', array(
            ':grnno'=>$grnno,
            ':dt'=>$dt,
            ':dcno'=>$dcno,
            ':suppnm'=>$suppnm,
            ':unm'=>$_SESSION['unme'],
            ':instnm'=>$_SESSION['instnm']
        ));
    }
    public static function insertitemsGRN($itemnm, $invquant, $actquant, $rejquant, $accquant, $grnid){
        khatral::khquery('INSERT INTO grnitems VALUES(NULL, :itemn, :invquant, :actquant, :rejquant, :accquant, :grnid, :usr)', array(
            ':itemn'=>$itemnm,
            ':invquant'=>$invquant,
            ':actquant'=>$actquant,
            ':rejquant'=>$rejquant,
            ':accquant'=>$accquant,
            ':grnid'=>$grnid,
            ':usr'=>$_SESSION['instnm']
        ));
        echo 'hello' . $itemnm . $invquant . $actquant . $rejquant . $accquant . $grnid;
    }
    public static function insertitemsGRNSales($itemnm, $invquant, $actquant, $rejquant, $accquant, $grnid){
        khatral::khquery('INSERT INTO grnsalesitems VALUES(NULL, :itemn, :invquant, :actquant, :rejquant, :accquant, :grnid, :usr)', array(
            ':itemn'=>$itemnm,
            ':invquant'=>$invquant,
            ':actquant'=>$actquant,
            ':rejquant'=>$rejquant,
            ':accquant'=>$accquant,
            ':grnid'=>$grnid,
            ':usr'=>$_SESSION['instnm']
        ));
        echo 'hello' . $itemnm . $invquant . $actquant . $rejquant . $accquant . $grnid;
    }
    public static function updateSRB($itemnm, $quant){
        khatral::khquery('UPDATE srb SET qty=qty + :val WHERE matnm=:mat AND usr=:instnm', array(
            ':val'=>$quant,
            ':mat'=>$itemnm,
            ':instnm'=>$_SESSION['instnm']
        ));
    }
    public static function updateSRBMinus($itemnm, $quant, $sub){
        if($sub == 1){
            khatral::khquery('UPDATE srb SET qty=qty - :val WHERE matnm=:mat AND usr=:instnm', array(
                ':val'=>$quant,
                ':mat'=>$itemnm,
                ':instnm'=>$_SESSION['instnm']
            ));
        }
    }
    public static function updateSalesSRB($itemnm, $quant){
        khatral::khquery('UPDATE srbsales SET qty=qty + :val WHERE matnm=:mat AND usr=:instnm', array(
            ':val'=>$quant,
            ':mat'=>$itemnm,
            ':instnm'=>$_SESSION['instnm']
        ));
    }
    public static function updateSalesSRBMinus($itemnm, $quant, $sub){
        if($sub == 1){
            khatral::khquery('UPDATE srbsales SET qty=qty - :val WHERE matnm=:mat AND usr=:instnm', array(
                ':val'=>$quant,
                ':mat'=>$itemnm,
                ':instnm'=>$_SESSION['instnm']
            ));
        }
    }
    public static function insertusers($deptnm, $deptunm, $deptpass, $dt){
        khatral::khquery('INSERT INTO instdept VALUES(NULL, :nm, :req, :unm, :pass, :dt, :inst)', array(
            ':nm'=>$deptnm,
            ':req'=>"",
            ':unm'=>$deptunm,
            ':pass'=>$deptpass,
            ':dt'=>$dt,
            ':inst'=>$_SESSION['instnm']
        ));
    }
    public static function deleteusers($id){
        khatral::khquery('DELETE FROM instdept WHERE dept_id=:id AND deptinst=:inst', array(
            ':id'=>$id,
            ':inst'=>$_SESSION['instnm']
        ));
    }
    public static function insertGIN($ginno, $dt, $grsno, $dept){
        khatral::khquery('INSERT INTO gin VALUES(NULL, :ginno, :dt, :grsno, :dept, :unm, :inst)', array(
            ':ginno'=>$ginno,
            ':dt'=>$dt,
            ':grsno'=>$grsno,
            ':dept'=>$dept,
            ':unm'=>$_SESSION['unme'],
            ':inst'=>$_SESSION['instnm']
        ));
    }
    public static function insertGINItems($itemnm, $reqquant, $issquant, $id){
        khatral::khquery('INSERT INTO ginitems VALUES(NULL, :itemnm, :reqquant, :issquant, :ginid)', array(
            ':itemnm'=>$itemnm,
            ':reqquant'=>$reqquant,
            ':issquant'=>$issquant,
            ':ginid'=>$id
        ));
    }
    public static function insertDeptStock($itemnm, $dt, $ginno, $grsno, $reqquant, $issquant, $dept){
        khatral::khquery('INSERT INTO deptstock VALUES(NULL, :stocknm, :dt, :ginno, :grsno, :reqquant, :issquant, :inst, :dept)', array(
            ':stocknm'=>$itemnm,
            ':dt'=>$dt,
            ':ginno'=>$ginno,
            ':grsno'=>$grsno,
            ':reqquant'=>$reqquant,
            ':issquant'=>$issquant,
            ':inst'=>$_SESSION['instnm'],
            ':dept'=>$dept
        ));
    }
    public static function insertEntryPo($dt, $supnm, $pono){
        khatral::khquery('INSERT INTO entrypo VALUES(NULL, :dt, :suppnm, :pono, :inst)', array(
            ':dt'=>$dt,
            ':suppnm'=>$supnm,
            ':pono'=>$pono,
            ':inst'=>$_SESSION['instnm']
        ));
    }
    public static function insertItemsPo($itemn, $hsn, $quant, $rte, $cgst, $sgst, $tot, $entrypo){
        khatral::khquery('INSERT INTO itemspo VALUES(NULL, :nm, :hsn, :quant, :rte, :cgst, :sgst, :tot, :entrypo)', array(
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
    public static function insertPotxTot($freight, $dis, $terms, $poid){
        khatral::khquery('INSERT INTO totandtaxpo VALUES(NULL, :fright, :discounts, :terms, :poid)', array(
            ':fright'=>$freight,
            ':discounts'=>$dis,
            ':terms'=>$terms,
            ':poid'=>$poid
        ));
    }
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