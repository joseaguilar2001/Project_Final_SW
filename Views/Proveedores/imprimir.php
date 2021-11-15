<?php
    ob_start();
?>
<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdArea">Area</abbr></th>
          <th><abbr title="IdProducto">Producto</abbr></th>
          <th><abbr title="IdUser">Usuario</abbr></th>
          <th><abbr title="Fecha">Fecha</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
          <?php if( $idU == '01' OR $idU == '03' ): ?>
            <th><abbr title="Confirmar">Confirmar | Rechazar</abbr></th>
          <?php endif?>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th><abbr title="IdArea">Area</abbr></th>
          <th><abbr title="IdProducto">Producto</abbr></th>
          <th><abbr title="IdUser">Usuarios</abbr></th>
          <th><abbr title="Fecha">Fecha</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
      </tr> 
  </tfoot>
  <tbody> 
    <?php foreach($solicitudes as $a) { ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4){ ?>
      <tr>
        <td><?php echo $a->Area; ?></td>
        <td><?php echo $a->Producto; ?></td>
        <td><?php echo $a->Usuario; ?></td>
        <td><?php echo $a->Fecha; ?></td>
        <td><?php echo $a->Cantidad; ?></td>
      </tr>
      <?php } ?>
    <?php } ?>
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
    $filename = 'reporte_Proveedores.pdf';
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