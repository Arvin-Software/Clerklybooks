<?php
$servername = "localhost";
$username = "aravindh";
$password = "Asinsurya1";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$query = 'CREATE DATABASE IF NOT EXISTS tickentr';
if($conn->query($query) == TRUE){
  echo '<br />Database clerklymodules created successfully';
}
else{
  echo 'error creating database' . $conn->error;
}
$conn = new mysqli($servername, $username, $password, "tickentr");
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
?>