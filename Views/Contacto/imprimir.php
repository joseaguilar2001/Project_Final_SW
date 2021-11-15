<?php
    ob_start();
?>
<table class="table" width="100%" id="tabla">
    <thead>
        <tr>
            <th>Proveedor</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Celular</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($contactos as $cnt): ?>
        <tr>
            <td><?php echo $cnt -> Proveedor; ?></td>
            <td><?php echo $cnt -> Name; ?></td>
            <td><?php echo $cnt -> LastName; ?></td>
            <td><?php echo $cnt -> Celular; ?></td>
            <td><?php echo $cnt -> Email; ?></td>
        <?php endforeach ?>
        </tr>
    </tbody>
</table>
<?php
    $html = ob_get_clean();
    echo $html;
    $options = $dompdf -> getOptions();
    $options -> set(array('isRemoteEnabled' => true));
    $dompdf -> setOptions($options);
    $dompdf -> loadHtml($html);
    $dompdf -> setPaper('letter');
    $dompdf -> render();
    $output = $dompdf -> output();
    $filename = 'reporte_Contactos.pdf';
    $result = file_put_contents($filename, $output);
    error_reporting(E_ALL ^ E_NOTICE);
    if($result)
    {
        $dompdf -> stream($filename, array("Attachment" => false));
    }
    else 
    {
      
    }
    exit();
?>