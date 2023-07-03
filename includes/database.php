<?php

// $db = mysqli_connect('localhost', 'root', '', '');


// if (!$db) {
//     echo "Error: No se pudo conectar a MySQL.";
//     echo "errno de depuración: " . mysqli_connect_errno();
//     echo "error de depuración: " . mysqli_connect_error();
//     exit;
// }


// conexion a base de datos de Oracle
$conn = oci_connect('pflores','pruebas','192.168.90.31:1521/test:DEDICATED','AL32UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}else{
    echo "Conexion exitosa";
}
/*
$stid = oci_parse($conn, 'SELECT * FROM employees');
oci_execute($stid);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }

    echo "</tr>\n";
}
echo "</table>\n";

oci_free_statement($stid);

oci_close($conn);
*/
?>
