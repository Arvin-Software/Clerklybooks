<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$query = 'CREATE DATABASE IF NOT EXISTS tickacc1';
if($conn->query($query) == TRUE){
  echo '<br />Database icarus created successfully';
}
else{
  echo 'error creating database' . $conn->error;
}
$conn = new mysqli($servername, $username, $password, "tickacc1");
$query = 'CREATE TABLE IF NOT EXISTS inst(
            instid          INTEGER             NOT NULL            AUTO_INCREMENT,
            instnm          VARCHAR(255)        NOT NULL,
            firstrun        VARCHAR(10)         NOT NULL,
            PRIMARY KEY(instid))';
if($conn->query($query) == TRUE){
echo '<br />Table inst created successfully';
}else{
echo '<br />Error creating table inst' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS authen(
            authenid            INTEGER             NOT NULL        AUTO_INCREMENT,
            unme                VARCHAR(255)        NOT NULL,
            pass                VARCHAR(255)        NOT NULL,
            inst                VARCHAR(255)        NOT NULL,
            act                 VARCHAR(255)        NOT NULL,
            PRIMARY KEY(authenid))';
if($conn->query($query) == TRUE){
echo '<br />Table authen created successfully';
}else{
echo '<br />Error creating table authen ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS comp_info(
            id              INTEGER             NOT NULL        AUTO_INCREMENT,
            ref_id          INTEGER             NOT NULL,
            mail_nm         VARCHAR(255)        NOT NULL,
            finyearfrom     DATE                NOT NULL,
            finyearto       DATE                NOT NULL,
            gstno           VARCHAR(255)        NOT NULL,
            addr            VARCHAR(255)        NOT NULL,
            country         VARCHAR(255)        NOT NULL,
            stat            VARCHAR(255)        NOT NULL,
            city            VARCHAR(255)        NOT NULL,
            pin             VARCHAR(255)        NOT NULL,
            curr            VARCHAR(255)        NOT NULL,
            email           VARCHAR(255)        NOT NULL,
            phno            VARCHAR(255)        NOT NULL,
            web             VARCHAR(255)        NOT NULL,
            typofb          VARCHAR(255)        NOT NULL,
            logo            VARCHAR(255)        NOT NULL,
            PRIMARY KEY(id),
            FOREIGN KEY(ref_id) REFERENCES inst(instid)
            )';
if($conn->query($query) == TRUE){
    echo '<br />Table comp_info created successfully';
}else{
    echo '<br />Error creating table comp_info ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS master_rec(
            id          INTEGER         NOT NULL        AUTO_INCREMENT,
            master_nm   VARCHAR(255)    NOT NULL,
            master_des  VARCHAR(255)    NOT NULL,
            PRIMARY KEY(id))';
if($conn->query($query)  == TRUE){
    echo '<br />Table master_rec created successfully';
}else{
    echo '<br />Error creating table master_rec' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS ledger_groups(
            grp_id          INTEGER             NOT NULL        AUTO_INCREMENT,
            grp_nm          VARCHAR(255)        NOT NULL,
            grp_nm_alias    VARCHAR(255)        NOT NULL,
            grp_under       VARCHAR(255)        NOT NULL,
            grp_typ         VARCHAR(255)        NOT NULL,
            grp_prof_aff    VARCHAR(255)        NOT NULL,
            grp_unm         VARCHAR(255)        NOT NULL,
            PRIMARY KEY(grp_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table ledger_groups created successfully';
}else{
    echo '<br />Error creating table ledger_groups' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS cap(
    cap_id			INTEGER			NOT NULL		AUTO_INCREMENT,
    cap_name		VARCHAR(255)	NOT NULL,
    usr				VARCHAR(255)	NOT NULL,
    PRIMARY KEY(cap_id))';
if($conn->query($query) == TRUE){
echo '<br />Table cap created successfully';
}else{
echo '<br />Error creating table cap' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS capmat(
    cap_id			INTEGER			NOT NULL		AUTO_INCREMENT,
    capmat			VARCHAR(255)	NOT NULL,
    matquan			VARCHAR(255)	NOT NULL,
    capid			VARCHAR(255)	NOT NULL,
    usr				VARCHAR(255)	NOT NULL,
    PRIMARY KEY(cap_id))';
if($conn->query($query) == TRUE){
echo '<br />Table capmat created successfully';
}else{
echo '<br />Error creating capmat ' . $conn->error;
}
/*
Mtrl
*/
$query = 'CREATE TABLE IF NOT EXISTS mtrl(
    mtrl_id			INTEGER			NOT NULL			AUTO_INCREMENT,
    mtrl_nm			VARCHAR(255)	NOT NULL,
    unit            VARCHAR(255)    NOT NULL,
    open_bal        VARCHAR(255)    NOT NULL,
    loc             VARCHAR(255)    NOT NULL,
    usr				VARCHAR(255)	NOT NULL,
    PRIMARY KEY(mtrl_id))';
if($conn->query($query) == TRUE){
echo '<br />Table mtrl created successfully';
}else{
echo '<br />Error creating table mtrl'. $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS mtrlsales(
    mtrl_id			INTEGER			NOT NULL			AUTO_INCREMENT,
    code            VARCHAR(255)    NOT NULL,
    mtrl_nm			VARCHAR(255)	NOT NULL,
    hsncode         VARCHAR(255)    NOT NULL,
    rate            VARCHAR(255)    NOT NULL,
    cgst            VARCHAR(255)    NOT NULL,
    sgst            VARCHAR(255)    NOT NULL,
    open_bal        VARCHAR(255)    NOT NULL,
    loc             VARCHAR(255)    NOT NULL,
    usr				VARCHAR(255)	NOT NULL,
    PRIMARY KEY(mtrl_id))';
if($conn->query($query) == TRUE){
echo '<br />Table mtrlsales created successfully';
}else{
echo '<br />Error creating table mtrlsales'. $conn->error;
}

$query = 'CREATE TABLE IF NOT EXISTS items(
    itemid              INTEGER             NOT NULL        AUTO_INCREMENT,
    itemnm              VARCHAR(255)        NOT NULL,
    quant               VARCHAR(255)        NOT NULL,
    rte                 VARCHAR(255)        NOT NULL,
    cgst                VARCHAR(255)        NOT NULL,
    sgst                VARCHAR(255)        NOT NULL,
    tot                 VARCHAR(255)        NOT NULL,
    entrymo             VARCHAR(255)        NOT NULL,
    PRIMARY KEY(itemid))';
if($conn->query($query) == TRUE){
echo '<br />Table items created successfully';
}else{
echo '<br /> Error creating table items'.$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS itemsdc(
            itemid          INTEGER         NOT NULL        AUTO_INCREMENT,
            itemnm          VARCHAR(255)    NOT NULL,
            quant           VARCHAR(255)    NOT NULL,
            entrydc         VARCHAR(255)    NOT NULL,
            PRIMARY KEY(itemid))';
if($conn->query($query) == TRUE){
    echo '<br />Table itemsdc created successfully';
}else{
    echo '<br />Error creating table itemsdc' . $conn->error;
}
// $query = 'CREATE TABLE IF NOT EXISTS srb(
//     srb_id			INTEGER			NOT NULL		AUTO_INCREMENT,
//     matnm			VARCHAR(255)	NOT NULL,
//     dcno			VARCHAR(255)	NOT NULL,
//     dt				DATE            NOT NULL,
//     sup				VARCHAR(255)	NOT NULL,
//     invno			VARCHAR(255)	NOT NULL,
//     invdt			DATE        	NOT NULL,
//     qty				VARCHAR(255)	NOT NULL,
//     rte				VARCHAR(255)	NOT NULL,
//     tot				VARCHAR(255)	NOT NULL,
//     daybk			VARCHAR(255)	NOT NULL,
//     rem				VARCHAR(255)	NOT NULL,
//     usr				VARCHAR(255)	NOT NULL,
//     PRIMARY KEY(srb_id))';
// if($conn->query($query) == TRUE){
// echo '<br />Table srb created successfully';
// }else{
// echo '<br />Error creating table srb'. $conn->error;
// }
$query = 'CREATE TABLE IF NOT EXISTS srb(
        srb_id			INTEGER			NOT NULL		AUTO_INCREMENT,
        matnm			VARCHAR(255)	NOT NULL,
        qty				VARCHAR(255)	NOT NULL,
        rem				VARCHAR(255)	NOT NULL,
        usr				VARCHAR(255)	NOT NULL,
        PRIMARY KEY(srb_id))';
    if($conn->query($query) == TRUE){
    echo '<br />Table srb created successfully';
    }else{
    echo '<br />Error creating table srb'. $conn->error;
    }
    $query = 'CREATE TABLE IF NOT EXISTS srbsales(
        srb_id			INTEGER			NOT NULL		AUTO_INCREMENT,
        matnm			VARCHAR(255)	NOT NULL,
        qty				VARCHAR(255)	NOT NULL,
        rem				VARCHAR(255)	NOT NULL,
        usr				VARCHAR(255)	NOT NULL,
        PRIMARY KEY(srb_id))';
    if($conn->query($query) == TRUE){
    echo '<br />Table srb created successfully';
    }else{
    echo '<br />Error creating table srb'. $conn->error;
    }
$query = 'CREATE TABLE IF NOT EXISTS entrymo(
    entryid             INTEGER         NOT NULL            AUTO_INCREMENT,
    dt                  DATE            NOT NULL,
    suppnm              VARCHAR(255)    NOT NULL,
    invdt               VARCHAR(255)    NOT NULL,
    dcno                VARCHAR(255)    NOT NULL,
    vehno               VARCHAR(255)    NOT NULL,
    inst                VARCHAR(255)    NOT NULL,
    PRIMARY KEY(entryid))
    ';
if($conn->query($query) == TRUE){
echo '<br />Table entrymo created successfully';
}else{
echo '<br />Error creating table entrymo' . $conn->error;
}

$query = 'CREATE TABLE IF NOT EXISTS entrypo(
    entryid             INTEGER         NOT NULL            AUTO_INCREMENT,
    dt                  DATE            NOT NULL,
    suppnm              VARCHAR(255)    NOT NULL,
    pono                VARCHAR(255)    NOT NULL,
    inst                VARCHAR(255)    NOT NULL,
    PRIMARY KEY(entryid))
    ';
if($conn->query($query) == TRUE){
echo '<br />Table entrypo created successfully';
}else{
echo '<br />Error creating table entrypo' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS itemspo(
    itemid              INTEGER             NOT NULL        AUTO_INCREMENT,
    itemnm              VARCHAR(255)        NOT NULL,
    hsn                 VARCHAR(255)        NOT NULL,
    quant               VARCHAR(255)        NOT NULL,
    rte                 VARCHAR(255)        NOT NULL,
    cgst                VARCHAR(255)        NOT NULL,
    sgst                VARCHAR(255)        NOT NULL,
    tot                 VARCHAR(255)        NOT NULL,
    entrypo             VARCHAR(255)        NOT NULL,
    PRIMARY KEY(itemid))';
if($conn->query($query) == TRUE){
echo '<br />Table itemspo created successfully';
}else{
echo '<br /> Error creating table itemspo'.$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS entryso(
    entryid             INTEGER         NOT NULL            AUTO_INCREMENT,
    dt                  DATE            NOT NULL,
    custnm              VARCHAR(255)    NOT NULL,
    sono                VARCHAR(255)    NOT NULL,
    invno               VARCHAR(255)    NOT NULL,
    validity            VARCHAR(255)    NOT NULL,
    stat                VARCHAR(255)    NOT NULL,
    inst                VARCHAR(255)    NOT NULL,
    PRIMARY KEY(entryid))
    ';
if($conn->query($query) == TRUE){
echo '<br />Table entryso created successfully';
}else{
echo '<br />Error creating table entryso' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS itemsso(
    itemid              INTEGER             NOT NULL        AUTO_INCREMENT,
    itemnm              VARCHAR(255)        NOT NULL,
    hsn                 VARCHAR(255)        NOT NULL,
    quant               VARCHAR(255)        NOT NULL,
    rte                 VARCHAR(255)        NOT NULL,
    cgst                VARCHAR(255)        NOT NULL,
    sgst                VARCHAR(255)        NOT NULL,
    tot                 VARCHAR(255)        NOT NULL,
    entrypo             VARCHAR(255)        NOT NULL,
    PRIMARY KEY(itemid))';
if($conn->query($query) == TRUE){
echo '<br />Table itemsso created successfully';
}else{
echo '<br /> Error creating table itemsso'.$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS totandtaxpo(
            totid           INTEGER         NOT NULL        AUTO_INCREMENT,
            fright          VARCHAR(255)    NOT NULL,
            discounts       VARCHAR(255)    NOT NULL,
            terms           VARCHAR(255)    NOT NULL,
            poid            VARCHAR(255)    NOT NULL,
            PRIMARY KEY(totid))';
if($conn->query($query) == TRUE){
    echo '<br />Table totandtaxpo created successfully';
}else{
    echo '<br />Error creating table totandtaxpo' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS totandtaxso(
    totid           INTEGER         NOT NULL        AUTO_INCREMENT,
    fright          VARCHAR(255)    NOT NULL,
    discounts       VARCHAR(255)    NOT NULL,
    terms           VARCHAR(255)    NOT NULL,
    poid            VARCHAR(255)    NOT NULL,
    PRIMARY KEY(totid))';
if($conn->query($query) == TRUE){
echo '<br />Table totandtaxpo created successfully';
}else{
echo '<br />Error creating table totandtaxpo' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS entrydc(
            dc_id           INTEGER         NOT NULL        AUTO_INCREMENT,
            dt              DATE            NOT NULL,
            suppnm          VARCHAR(255)    NOT NULL,
            dcno            VARCHAR(255)    NOT NULL,
            inst            VARCHAR(255)    NOT NULL,
            PRIMARY KEY(dc_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table entrydc created successfully';
}else{
    echo '<br />Error creating tablee entrydc' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS dech(
            dech_id         INTEGER         NOT NULL        AUTO_INCREMENT,
            dech_no         VARCHAR(255)    NOT NULL,
            dech_inv        VARCHAR(255)    NOT NULL,
            dech_dt         DATE            NOT NULL,
            inst            VARCHAR(255)    NOT NULL,
            PRIMARY KEY(dech_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table dech created successfully';
}else{
    echo '<br />Error creating table dech' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS grn(
                grn_id          INTEGER         NOT NULL        AUTO_INCREMENT,
                grn_no          VARCHAR(255)    NOT NULL,
                dt              DATE            NOT NULL,
                dcno            VARCHAR(255)    NOT NULL,
                suppnm          VARCHAR(255)    NOT NULL,
                unm             VARCHAR(255)    NOT NULL,
                inst            VARCHAR(255)    NOT NULL,
                PRIMARY KEY(grn_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table grn created successfully';
}else{
    echo '<br />Error creating table grn' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS grnitems(
            items_id            INTEGER         NOT NULL        AUTO_INCREMENT,
            itemnm              VARCHAR(255)    NOT NULL,
            invquant            VARCHAR(255)    NOT NULL,
            actquant            VARCHAR(255)    NOT NULL,
            rejquant            VARCHAR(255)    NOT NULL,
            accquant            VARCHAR(255)    NOT NULL,
            grnid               VARCHAR(255)    NOT NULL,
            usr                 VARCHAR(255)    NOT NULL,
            PRIMARY KEY(items_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table grnitems created successfully';
}else{
    echo '<br />Error creating table grnitems'.$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS grnsales(
    grn_id          INTEGER         NOT NULL        AUTO_INCREMENT,
    grn_no          VARCHAR(255)    NOT NULL,
    dt              DATE            NOT NULL,
    dcno            VARCHAR(255)    NOT NULL,
    suppnm          VARCHAR(255)    NOT NULL,
    unm             VARCHAR(255)    NOT NULL,
    inst            VARCHAR(255)    NOT NULL,
    PRIMARY KEY(grn_id))';
if($conn->query($query) == TRUE){
echo '<br />Table grnsales created successfully';
}else{
echo '<br />Error creating table grnsales' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS grnsalesitems(
items_id            INTEGER         NOT NULL        AUTO_INCREMENT,
itemnm              VARCHAR(255)    NOT NULL,
invquant            VARCHAR(255)    NOT NULL,
actquant            VARCHAR(255)    NOT NULL,
rejquant            VARCHAR(255)    NOT NULL,
accquant            VARCHAR(255)    NOT NULL,
grnid               VARCHAR(255)    NOT NULL,
usr                 VARCHAR(255)    NOT NULL,
PRIMARY KEY(items_id))';
if($conn->query($query) == TRUE){
echo '<br />Table grnsalesitems created successfully';
}else{
echo '<br />Error creating table grnsalesitems'.$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS gin(
            gin_id              INTEGER         NOT NULL        AUTO_INCREMENT,
            gin_no              VARCHAR(255)    NOT NULL,
            dt                  DATE            NOT NULL,
            grs_no              VARCHAR(255)    NOT NULL,
            dept                VARCHAR(255)    NOT NULL,
            unm                 VARCHAR(255)    NOT NULL,
            inst                VARCHAR(255)    NOT NULL,
            PRIMARY KEY(gin_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table gin created successfully';
}else{
    echo '<br />Error creating table gin ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS ginitems(
            items_id            INTEGER         NOT NULL        AUTO_INCREMENT,
            itemnm              VARCHAR(255)    NOT NULL,
            reqquant            VARCHAR(255)    NOT NULL,
            issquant            VARCHAR(255)    NOT NULL,
            ginid               VARCHAR(255)    NOT NULL,
            PRIMARY KEY(items_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table ginitems created successfully';
}else{
    echo '<br />Error creating table ginitems ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS instdept(
            dept_id             INTEGER         NOT NULL        AUTO_INCREMENT,
            deptnm              VARCHAR(255)    NOT NULL,
            deptreq             VARCHAR(255)    NOT NULL,
            deptunm             VARCHAR(255)    NOT NULL,
            deptpass            VARCHAR(255)    NOT NULL,
            dt                  DATE            NOT NULL,
            deptinst            VARCHAR(255)    NOT NULL,
            PRIMARY KEY(dept_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table instdept created successfully';
}else{
    echo '<br />Error creating table instdept ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS deptstock(
            stock_id            INTEGER         NOT NULL        AUTO_INCREMENT,
            stocknm             VARCHAR(255)    NOT NULL,
            dt                  DATE            NOT NULL,
            ginno               VARCHAR(255)    NOT NULL,
            grsno               VARCHAR(255)    NOT NULL,
            reqquant            VARCHAR(255)    NOT NULL,
            issquant            VARCHAR(255)    NOT NULL,
            inst                VARCHAR(255)    NOT NULL,
            dept                VARCHAR(255)    NOT NULL,
            PRIMARY KEY(stock_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table deptstock created successfully';
}else{
    echo '<br />Error creating table deptstock ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS cont_list(
	listid          INTEGER         NOT NULL    AUTO_INCREMENT,
	cont_nm         VARCHAR(255)    NOT NULL,
	cont_email      VARCHAR(255)    NOT NULL,
	cont_phone      VARCHAR(255)    NOT NULL,
	cont_addr       VARCHAR(255)    NOT NULL,
    cont_gst        VARCHAR(255)    NOT NULL,
    stcd			VARCHAR(255)	NOT NULL,
	cons_nm         VARCHAR(255)    NOT NULL,
	cons_email      VARCHAR(255)    NOT NULL,
	cons_phone      VARCHAR(255)    NOT NULL,
	cons_addr       VARCHAR(255)    NOT NULL,
    cons_gst        VARCHAR(255)    NOT NULL,
    conscd			VARCHAR(255)	NOT NULL,
    bankdet         VARCHAR(255)    NOT NULL,
    bankifsc        VARCHAR(255)    NOT NULL,
    otherbankdet    LONGTEXT        NOT NULL,
	acc             VARCHAR(255)    NOT NULL,
	typ             VARCHAR(255)    NOT NULL,
	PRIMARY KEY(listid))';
if($conn->query($query) == TRUE){
    echo '<br />Table cont_list created successfully';
}else{
    echo '<br />Error creating table cont_list ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS dc_entry(
            entry_id        INTEGER         NOT NULL        AUTO_INCREMENT,
            dc_no           VARCHAR(255)    NOT NULL,
            entrypo         VARCHAR(255)    NOT NULL,
            inst            VARCHAR(255)    NOT NULL,
            PRIMARY KEY(entry_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table dc_entry created successfully';
}else{
    echo '<br />Error creating table dc_entry' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS modules(
            mod_id          INTEGER             NOT NULL        AUTO_INCREMENT,
            mod_nm          VARCHAR(255)        NOT NULL,
            instnm          VARCHAR(255)        NOT NULL,
            PRIMARY KEY(mod_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table modules created successfully';
}else{
    echo '<br />Error creating table modules' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS acc_year(
            year_id         INTEGER         NOT NULL        AUTO_INCREMENT,
            st_dt           DATE            NOT NULL,
            end_dt          DATE            NOT NULL,
            usrnm           VARCHAR(255)    NOT NULL,
            PRIMARY KEY(year_id))';
if($conn->query($query) == TRUE){
    echo '<br />Table acc_year created successfully';
}else{
    echo '<br />Error creating table acc_year' . $conn->error;
}
?>